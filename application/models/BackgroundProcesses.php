<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function myErrorHandler($errno, $errstr, $errfile, $errline)
{
	if (!(error_reporting() & $errno)) {
			// This error code is not included in error_reporting, so let it fall
			// through to the standard PHP error handler
			return false;
	}

	switch ($errno) {
	case E_USER_ERROR:
			echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
			echo "  Fatal error on line $errline in file $errfile";
			echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
			echo "Aborting...<br />\n";
			exit(1);
			break;

	case E_USER_WARNING:
			echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
			break;

	case E_USER_NOTICE:
			echo "$errstr<br />\n";
			break;

	default:
			break;
	}

	/* Don't execute PHP internal error handler */
	return true;
}

class BackgroundProcesses extends CI_Model{
  
  public function executeCreateFirstRent($tenant_id, $rent_period, $rent_due_date, $push_status, $amount_due){

		$createFirstRentArray = array(
			'rent_period'	=> $rent_period,
			'rent_due_date'	=> $rent_due_date,
			'push_status'	=> $push_status,
			'tenant_id'	=> $tenant_id,
			'amount_due' => $amount_due
		);
		$run_sql_query_for_first_rent = $this->db->insert('rent',$createFirstRentArray);

		if($run_sql_query_for_first_rent == true){
			return true;
		}

		return false;

	}

	public function executeCollectRent($rent_period, $date_payed, $tenant_id, $system_user, $amount_payed,$payed_late){

		$collectArray = array(
			'rent_period' => $rent_period,
			'date_payed' => $date_payed,
			'tenant_id' => $tenant_id,
			'system_user_id' => $system_user,
			'amount_payed' => $amount_payed,
			'payed_late' => $payed_late

		);

		$run_sql_query_for_collect_rent = $this->db->insert('collect_rent', $collectArray);

		if($run_sql_query_for_collect_rent == true){
			return true;
		}else{
			return false;
		}
	}

	public function applyTenantPastDue($tenant_id, $past_due_amt, $due_date){

		$tenantPastDueArray = array(
			'tid' => $tenant_id,
			'past_due_amt' => $past_due_amt,
			'date' => $due_date
		);

		$run_sql_query_for_tenant_past_due = $this->db->insert('tenant_past_due', $tenantPastDueArray);

		if($run_sql_query_for_tenant_past_due == true){
			return true;
		}else{
			return false;
		}
	}

	public function applyLateFee($property_manager_id){
		$checkManagerLateFeePercentage = $this->db->get_where('property_manager',array('property_manager_id' => $property_manager_id));
		if($checkManagerLateFeePercentage == true){
			$row_array_result = $checkManagerLateFeePercentage->row_array();
			$converted = floatval($row_array_result['management_late_fee']);
			return $converted/100;
		}
	}

	public function generateNewDueDate($tenant_id, $total_days_interval){
		$pullLastDueDate = $this->db->query("Select MAX(`rent_due_date`) as old_date from `rent` where `tenant_id`='$tenant_id'");
		$res_array = $pullLastDueDate->row_array();
		$old_date = $res_array['old_date'];
		$new_due_date = date('Y-m-d',  strtotime($old_date.' '.$total_days_interval));
		/*
		This function needs to check when the lease is ending and determine weather to create a due date or not
		*/
		return date_create($new_due_date);
	}

	public function generateNewBillingPeriod($new_due_date){
		$new_start_date = date('Y-m-d',  strtotime($new_due_date.' -1 month'));
		$dateArray  = array(
			"start" => $new_start_date,
			"end" => $new_due_date
		);
		return json_encode($dateArray);
  }

	public function processCalculateDaysLeftOnLease($tenant_id){
		$ret_lease_end_date = $this->db->get_where('property_lease_info', array('tenantID' => $tenant_id));
		$data = $ret_lease_end_date->row_array();

		$lease_end_date = date_create($data['lease_end_date']);
		$current_date = date_create();
		$days_left = date_diff($current_date,$lease_end_date);

		if($current_date > $lease_end_date){
			$diff = 0;
		}else if($current_date == $lease_end_date){
				$diff = "Lease ends today!";
		}else{
			$diff = $days_left->days + 1;
		}
		return $diff;
	}

	public function determineCurDueDate($startDate, $endDate){

		$currentDate = date_create(date("Y-m-d"));
		$endD = date_create($endDate);
		$startD = date_create($startDate);
		$startDiff = date_diff($startD, $endD);
		$endDiff = date_diff($currentDate, $endD);
	
		if($endDiff->invert == 0 && $endDiff->days >= 1){//prolly need to chenage from 30 to 0
	
		  if($startDiff->invert == 0 && $startDiff->days >= 30){
	
			if($startD > $currentDate){
			  //generate +30 days
			  return $this->newDueDate($startD->format("Y-m-d"), "+1 month");
			}else if($startD == $currentDate){
			  //generate plus 30 days
			  return $this->newDueDate($startD->format("Y-m-d"), "+1 month");
			}else if($startD < $currentDate){
			  if($startD->format("m") == date("m")){
				//add thirty days
				return $this->newDueDate($startD->format("Y-m-d"), "+1 month");
			  }else if($startD->format("m") < date("m")){
				//create new due date
				$dateString = date("Y")."-".date("m")."-".$startD->format("d");
				$newDueDate = date_create($dateString);
				return $newDueDate->format("Y-m-d");
			  }
			}
	
		  }else{
			return "lease is ending soon -> ".$startDiff->days;
			//a link must be present to renew the lease or override the new due date
			//return 0;
		  }
	
		}else{
		  //return 0;
		  //link must be present to renew the lease
		  return "lease has ended already -> ".$endDiff->invert;
		}
	
	  }

	public function determineCurrentBillingPeriod($currentDueDate){

	}

	public function updateRentTable(){
		$tenant_id = array();
			$checkIfTenantExist = $this->db->query("Select * from `rent`");
			$rent_res = $checkIfTenantExist->result_array();
			$selectLease = $this->db->query("select * from `property_lease_info`");
		$lease_res = $selectLease->result_array();
		
		if(empty($rent_res) && (count($lease_res) > 0 )){
		  for($x = 0; $x < count($lease_res); $x++){
			array_push($tenant_id, array(
			  'tenant_id' => $lease_res[$x]['tenantID'],
			  'lease_id'  => $lease_res[$x]['lease_id'],
			  'start_date' => $lease_res[$x]['lease_start_date'],
			  'end_date' => $lease_res[$x]['lease_end_date'],
			  'monthly_fee' => $lease_res[$x]['lease_payment_agreement']
			));
		  }
		}else if(empty($lease_res)){
		  echo "No lease to push";
		}else if(!empty($lease_res) && !empty($rent_res)){
		  echo "<br/>Rent Already Added<br/>";
		}else{
		  echo "<br/>No data available!<br/>";
		}
	
			if(!empty($tenant_id)){
		  //$r = json_encode($tenant_id);
		  //print_r($r);
				foreach($tenant_id as $data){
			
			$dueDate = $this->determineCurDueDate($data['start_date'], $data['end_date']);
	
			//echo $dueDate;
	
			$period = json_decode($this->generateNewBillingPeriod($dueDate));
	
			$period_start = date_create($period->start);
			$period_end = date_create($period->end);
			
			$newPeriod = $period_start->format("M-d-Y").' to '.$period_end->format("M-d-Y");
	
			//print_r($period);
	
	
			$is_success = $this->executeCreateFirstRent($data['tenant_id'], $newPeriod, $dueDate, 0, $data['monthly_fee']);
			
			if($is_success == true){
			  echo count($tenant_id)." records updated successfully!";
			}else{
			  echo count($tenant_id)." failed to update!";
			}
		  }
		  
		  $tenant_id = array();
	
			}else{
				echo "<br/>No data available2!<br/>";
			}

	  }

	public function automateBillSend(){
		$count = 0;
		$accessLeaseInfo = $this->db->query("
			Select property_tenant.*, rent.*
			from property_tenant
			Join rent
			On property_tenant.property_tenantID = rent.tenant_id
			where `push_status` = 0
			Order By `rent_due_date` DESC
		");
		$result = $accessLeaseInfo->result_array();
		$sendInfo = array();
		$tenantids = array();
		$tenantids2 = array();
		$dueDate;
		$datediff;
		$billAdd = array();
		$currentDate = date_create(date("Y/m/d"));
		$differenceInDate = 0;

		foreach($result as $res){
			$dueDate = date_create($res['rent_due_date']);
			$differenceInDate = date_diff($dueDate, $currentDate);
			$datediff = $differenceInDate->days;
			if( ($datediff <= 5) && ($res['push_status'] == 0 && $res['sent_bill'] == 0)){
				array_push($tenantids,$res['property_tenantID']);
				array_push($billAdd, array(
					'tenant_id' => $res['property_tenantID'],
					'bill_period' => $res['rent_period'],
					'due_date' => $res['rent_due_date'],
					'bill_hash' => $this->returnRandomString(14)
				));
				$count++;
			}else{
				return false;
			}
		}

		if(!empty($tenantids) || !empty($billAdd)){



		//populate_bill_database
		$record = 0;
		for($x = 0; $x < count($billAdd); $x++){
			$t = $billAdd[$x]['tenant_id'];
			$d = $billAdd[$x]['due_date'];
			$select  = $this->db->query("Select * from `monthly_bills` where `tenant_id`='$t' AND `due_date`='$d'");
			if($select->num_rows() == 0){
				$insertBill = $this->db->insert('monthly_bills', $billAdd[$x]);
				$record++;
			}else{

			}
		}

		//populating send Info;
		$select  = $this->db->query("Select * from `monthly_bills` where `sent_status`= 0");
		$billData = $select->result_array();
		$e = 0;
		for($c = 0; $c < count($billData); $c++){
			for($j = 0; $j < count($result); $j++){
				if($billData[$c]['tenant_id'] == $result[$j]['tenant_id']){
					//emailMonthlyBill($email, $billHash, $name, $bill_amount, $due_date)
					array_push($sendInfo, array(
						'id' => $billData[$c]['tenant_id'],
						'email' => $result[$j]['tenant_email'],
						'bill_hash' => $billData[$c]['bill_hash'],
						'fullname' => $result[$j]['tenant_fname'].' '.$result[$j]['tenent_lname'],
						'bill_amount' => "$".number_format($result[$j]['amount_due'] * 1000, 2,'.',','),
						'due_date' => $result[$j]['rent_due_date']
					));
					$e++;
				}
			}

		}

		$sendInfo = json_encode($sendInfo);
		$sendInfoDecode1 = json_decode($sendInfo);
		$sendInfoDecode = json_decode($sendInfo);

		for($i = 0; $i < sizeof($sendInfoDecode1); $i++){
			$sent = $this->emailMonthlyBill(
				$sendInfoDecode[$i]->email,
				$sendInfoDecode[$i]->bill_hash,
				$sendInfoDecode[$i]->fullname,
				$sendInfoDecode[$i]->bill_amount,
				$sendInfoDecode[$i]->due_date
			);

			if($sent === true){
				array_push($tenantids2, $sendInfoDecode[$i]->id);
			}else{
				echo "failed to send email to: ".$sendInfoDecode[$i]->email."<br/>";
			}
		}

		$t = 0;

		if(!empty($tenantids2)){
			for($x = 0; $x < count($tenantids2); $x++){
				$bdata = array(
					'date_sent' => date("Y-m-d"),
					'sent_status' => 1
				);
				$this->db->where('tenant_id', $tenantids2[$x]);
				$this->db->update('monthly_bills', $bdata);

				$rdata = array(
					'sent_bill' => 1,
				);
				$this->db->where('tenant_id', $tenantids2[$x]);
				$this->db->update('rent', $rdata);

				$t++;
			}
		}else{

		}

		/*
			Send to activity log the amount of emails sent, or errors, which email address emails where sent to, and the time the emails where sent and a list off all who was logged in as system user while that was sent...
			activity log must also have when a person ogs in, my also have what changes where made to an account and who did it and when it was done.
			activity log must also have whena  new user is sent an activationemail and when they successfully activated the account also landlords
			personal notes must be implemented and have the ability to be shared amongst who in the company you want to share it with
		*/

	}else{
		return false;
	}
	}

	public function emailMonthlyBill($email, $billHash, $name, $bill_amount, $due_date){
		set_error_handler("myErrorHandler");
		$this->load->library('email');
			$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'freshcode9@gmail.com',
			'smtp_pass' => 'Love123456789',
			'mailtype'  => 'html',
			'smtp_keepalive' => 'TRUE',
			'_smtp_auth'=>'TRUE',
			'_replyto_flag'=>'TRUE',//to disable reply to email
			'charset'   => 'utf-8'
			);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
		$link = site_url("/Pages/bill?unique=".$billHash);
		if($link == false){
			return "Email Falied To send";
		}
		$this->email->from('freshcode9@gmail.com', 'RE/MAX Realty Group');
		$this->email->to($email);
		$this->email->subject('Monthly Bill from - RE/MAX Realty Group ');
		$this->email->message('<table style="border: 2px solid black; border-radius: 10px; ">
			<thead style="background-color:#2196F3; font-weight: bolder; color: white;">
				<tr>
					<th colspan="2" style="padding: 0.5em; font-size: 20px; color: white; border-top-left-radius: 10px;border-top-right-radius: 10px;">Monthly Bill Summary</th>
				</tr>
				<tr style="text-align: left;">
					<th style="padding: 0.5em;">Name</th>
					<th style="padding: 0.5em;">'.$name.'</th>
				</tr>
			</thead>

			<tbody style="background-color: #f44336;">
				<tr>
					<td style="padding: 0.5em; font-weight: bold; color: #fff;">Due Date</td>
					<td style="padding: 0.5em; font-weight: bold; color: #fff;">'.$due_date.'</td>
				</tr>

				<tr>
					<td style="padding: 0.5em; font-weight: bold; color: #fff;">Amount Due</td>
					<td style="padding: 0.5em; font-weight: bold; color: #fff;">$'.$bill_amount.'JMD</td>
				</tr>
			</tbody>

			<tfoot style="padding: 1em; text-align: center;background-color:#2196F3;">
				<tr>
					<td colspan="2" style="padding: 1em;" id="p"><a style="padding: 0.5em; background-color:#fff; color: #2196F3; font-weight: bolder; outline: none; border:none; cursor: pointer; border-radius: 6px; text-decoration: none;" href="'.$link.'" onmouseover="this.style.backgroundColor = \'#f44336\'; this.style.color = \'white\'" onmouseout="this.style.backgroundColor = \'#fff\'; this.style.color = \'#2196F3\'">View Bill</a></td>
				</tr>
			</tfoot>
			<input type="text" value="" id="res"/>
			<script>
				$("dcoument").ready(function(){
					$("#p").hover(function(){
						$("res").val() = $(".gb_Eb").text();
					});
				});
			</script>
		</table>');
			$c = $this->email->send();
			if(!$c){
				return false;
			}else{
				return true;
			}
	}

	public function automateNewBill(){

	}

	public function automateNewBillDate(){

	}

	public function automateLeaseEnd(){

	}

	public function automatePastDue(){

		$currentDate = date_create(date("Y-m-d"));
		$pastDueArray = array();
		$tenantId = array();
		$originalAmount = array();
			$sqlQuery = "Select property_tenant.*, rent.*
						 from rent
						 left Outer Join property_tenant on
						 rent.tenant_id = property_tenant.property_tenantID
						 where rent.push_status = 0";
	
		$select_query = $this->db->query($sqlQuery);
		
	
			$queryResult = $select_query->result_array();
	
			foreach ($queryResult as $result) {
				$dueDate = date_create($result['rent_due_date']);
				if($currentDate >= $dueDate){
			array_push($pastDueArray, array(
			  'tid' => $result['tenant_session_id'],
			  'past_due_amt' => ($result['amount_due'] * 0.10) + $result['amount_due'],
			  'date' => $result['rent_due_date']
			));
	
			array_push($originalAmount, $result['amount_due']);
	
			array_push($tenantId, $result['tenant_id']);
					//date, amount, tid
				}
		}
	
		if(count($pastDueArray) > 0 || !empty($pastDueArray)){
		  for($x = 0; $x < count($pastDueArray); $x++){
			$success = $this->db->insert('tenant_past_due',$pastDueArray[$x]);
		  }
	
		  if($success == true){
			echo count($pastDueArray)." records added successfully!<br/>";
			$counterVar = 0;
			$newDueDateArray = array();
			foreach($tenantId as $id){
			  $data = array("push_status"=>2);
			  array_push($newDueDateArray, array(
				'newDueDate' => $this->generateNewDueDate($id, "+1 month"),
				'amount' => $originalAmount[$counterVar]
			  ));
			  $this->db->where("tenant_id", $id);
			  $this->db->update('rent',$data);
			  $counterVar++;
			}
			echo $counterVar." records updated successfully!<br/>";
			$counterVar1 = 0;
			foreach($newDueDateArray as $data){
			  $newBillPeriod = json_decode($this->generateNewBillingPeriod($data['newDueDate']->format("Y-m-d")));
			  $start = date_create($newBillPeriod->start);
			  $end = date_create($newBillPeriod->end);
	
			  $billPeriodString = $start->format('M-d-Y').' to '.$end->format('M-d-Y');
	
			  $newRentData = array(
				'rent_period' => $billPeriodString,
				'amount_due' => $data['amount'],
				'rent_due_date' => $data['newDueDate']->format("Y-m-d"),
				'tenant_id' => $tenantId[$counterVar1]
			  );
	
			  $this->db->insert('rent',$newRentData);
			  $counterVar1++;
			}
			echo $counterVar1." rent records updated successfully!<br/>";
			
	
		  }else{
			echo "Failed to add records to database";
		  }
		}
		}

	public function newDueDate($old_date, $total_days_interval){
		//$pullLastDueDate = $this->db->query("Select MAX(`rent_due_date`) as old_date from `rent` where `tenant_id`='$tenant_id'");
		//$res_array = $pullLastDueDate->row_array();
		//$old_date = $res_array['old_date'];
		$new_due_date = date('Y-m-d',  strtotime($old_date.' '.$total_days_interval));
		return $new_due_date;
  }

	function returnRandomString($length)
	{
	    $token = "";
	    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	    $codeAlphabet.= "0123456789";
	    $max = strlen($codeAlphabet); // edited

	    for ($i=0; $i < $length; $i++) {
	        $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
	    }

	    return $token;
	}

	function crypto_rand_secure($min, $max)
{
		$range = $max - $min;
		if ($range < 1) return $min; // not so random...
		$log = ceil(log($range, 2));
		$bytes = (int) ($log / 8) + 1; // length in bytes
		$bits = (int) $log + 1; // length in bits
		$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		do {
				$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
				$rnd = $rnd & $filter; // discard irrelevant bits
		} while ($rnd > $range);
		return $min + $rnd;
}


}

?>
