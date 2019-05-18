<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('Authentication','auth02');
		$this->load->view('home');
		//$this->auth02->automatePastDue();
	}

	public function LogUserIn(){
		$this->load->model('Authentication','auth02');
		$email = $this->input->post('email');
		$password = $this->input->post('password',true);
		//$email = $this->auth02->sanitizeInput($email);
		$password = $this->auth02->sanitizeInput($password);
		$result = $this->auth02->Login($email,$password);
		if($result == 4){
			if($this->auth02->triggerOnline("system_user","online","1","managersession","{$this->ses->userdata('user_session')}") ){
				echo ("<script>window.location.href = '".site_url("Pages/dashboard")."'</script>");
			}else{
				echo "* failed to login, please try again *";
			}

		}else if($result == 2){
			echo "* Manager does not exist *";
		}
		else{
			echo "* either username or password is incorrect *";
		}
	}

	public function RegUser(){

		if($this->ses->has_userdata('user_session')){

		$this->load->model('Authentication','auth02');
		$email = $this->input->post('email',true);
		$fname = $this->input->post('fname',true);
		$lname = $this->input->post('lname',true);

		$email = $this->auth02->sanitizeInput($email);
		$fname = $this->auth02->sanitizeInput($fname);
		$lname = $this->auth02->sanitizeInput($lname);

		if(empty($email) || empty($fname) || empty($lname)){
			echo "* Error: Please fill out all feilds *";
		}else{

		if($this->auth02->isEmailValid($email) == true){

			$doesEmailExist = $this->auth02->checkDB1("system_user", "manager_email",$email);

			if($doesEmailExist == true){
				echo "* Error: User already exist *";
			}else{
				$success = $this->auth02->Register($fname,$lname,$email);

				if($success == true){
					$pullData = $this->auth02->checkDB("system_user", "manager_email",$email);
					$name = $pullData['manager_fname'].' '.$pullData['manager_lname'];
					$isThere = $this->auth02->checkDB1("property_pending_request", "email", $pullData['manager_email']);
					$bool = false;
					if($isThere == true){
						$bool = true;
					}else{
						$bool = $this->auth02->requestpost($name,"System User",$pullData['manager_email'],$pullData['manager_status']);
					}
					if($bool == true){


						if($this->auth02->sendEmailToUser($email)){
							echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";
							echo 'An activation email has been sent to www.'.$this->auth02->emailLink($email,"@").'';
						}else{
							echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
							echo 'Falied to send activation email, please check your network connection, but user information has been saved!';
						}

					}else{
						echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
					}

				}else{
					echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
				}
			}

		}else{
			echo "* Error: Invalid Email Address! *";
		}
	}
}else{
	echo "<script>window.location.href = '".site_url('Home')."?error=session expired please login';</script>";
}
	}

	public function resendActivation(){
		if($this->ses->has_userdata('user_session')){


		$this->load->model('Authentication','auth02');

		$id = $this->input->post("id",true);
		$email = $this->input->post("email",true);

		$id = $this->auth02->sanitizeInput($id);
		$email = $this->auth02->sanitizeInput($email);

		if(!ctype_digit($id) || !$this->auth02->isEmailValid($email)){
			echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
		}else{
		 	$bool = $this->auth02->checkDB1("property_pending_request", "rid", $id);

		 if($bool == true){

		 	$bool1 = $this->auth02->checkDB("property_pending_request", "rid", $id);

		 	if($bool1['email'] != $email){
		 		echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
		 	}else{
		 		if($bool1['Title'] == "System User"){
		 		if(!$this->auth02->sendEmailToUser($email)){
		 			echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
		 		}else{
		 			echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";
		 		}
		 	}else if($bool1['Title'] == "Landlord"){
		 		if(!$this->auth02->sendEmailToOwner($email)){
		 			echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
		 		}else{
		 			echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";
		 		}
		 	}else if($bool1['Title'] == "Tenant"){
		 		if(!$this->auth02->sendEmailToTenant($email)){
		 			echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
		 		}else{
		 			echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";
		 		}
		 	}

		 	}

		 }else{
		 	echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
		 }
		}

		}else{
			echo "<script>window.location.href = '".site_url('Home')."?error=session expired please login';</script>";
		}

	}

	public function UdpRegUser(){


		$this->load->model('Authentication','auth02');
		//isPasswordValid(

		if( ($this->ses->has_userdata("hash") == false) || ($this->ses->has_userdata("key") == false) ){
			echo "<script> window.location.href = '".site_url("Home/")."?error=Error:link expired';</script>";
		}else{
			$pass = $this->input->post('pass',true);
			$conp = $this->input->post('conp',true);

			$pass = $this->auth02->sanitizeInput($pass);
			$conp = $this->auth02->sanitizeInput($conp);

			$bool1 = $this->auth02->isPasswordValid($pass);
			$bool2 = $this->auth02->isPasswordValid($conp);

			if(empty($pass) || empty($conp)){
				echo "please fill out all feilds";
			}else if($pass != $conp){
				echo "password mismatch";
			}else if(($bool1) != true || ($bool2) != true){
				echo "please enter a alpha numeric password minimum character in lenght 8";
			}else{
				$passwordHash = password_hash($pass,PASSWORD_DEFAULT);

				$co = $this->auth02->checkDB("system_user", "managersession", $this->ses->userdata('key'));

				if($co['manager_password'] == "" && $co['user_hash'] == $this->ses->userdata('hash')){
				$res = $this->auth02->UpdateUser($passwordHash);
				if($res == true){
					$res2 = $this->auth02->removeRequest();
					if($res2 == true){
						echo "<script>window.location.href = '".site_url("Home/")."?error=Account Activation was successful please login to continue';</script>";
						$this->auth02->killSession("hash");
						$this->auth02->killSession("key");

					}else{
						echo "failed to activate account, please contact 876-953-9000 and request a new activation link, Link maybe expired or failed to create";
					}
				}else{
					echo "failed to activate user, please contact 876-953-9000 and request a new activation link, Link maybe expired or failed to create";
				}
				}else{
					echo "<script>window.location.href = '".site_url("Home/")."?error=User account already activated or invalid url';</script>";
					$this->auth02->killSession("hash");
						$this->auth02->killSession("key");
				}
			}
		}
	}

	public function UdpRegUser1(){


		$this->load->model('Authentication','auth02');
		//isPasswordValid(

		if( ($this->ses->has_userdata("hashes") == false) || ($this->ses->has_userdata("keyes") == false) ){
			echo "<script> window.location.href = '".site_url("Home/")."?error=Error:link expired';</script>";
		}else{
			$pass = $this->input->post('pass',true);
			$conp = $this->input->post('conp',true);

			$pass = $this->auth02->sanitizeInput($pass);
			$conp = $this->auth02->sanitizeInput($conp);

			$bool1 = $this->auth02->isPasswordValid($pass);
			$bool2 = $this->auth02->isPasswordValid($conp);

			if(empty($pass) || empty($conp)){
				echo "please fill out all feilds";
			}else if($pass != $conp){
				echo "password mismatch";
			}else if(($bool1) != true || ($bool2) != true){
				echo "please enter a alpha numeric password minimum character in lenght 8";
			}else{
				$passwordHash = password_hash($pass,PASSWORD_DEFAULT);

				$co = $this->auth02->checkDB("property_lanlord", "landlord_session_id", $this->ses->userdata('keyes'));

				if($co['landlord_password'] == "" && $co['secret_hash'] == $this->ses->userdata('hashes')){
				$res = $this->auth02->UpdateLandlord($passwordHash);
				if($res == true){
					$res2 = $this->auth02->removeRequest1();
					if($res2 == true){
						echo "<script>window.location.href = '".site_url("Home/")."?error=Account Activation was successful please login to continue';</script>";
						$this->auth02->killSession("hashes");
						$this->auth02->killSession("keyes");

					}else{
						echo "failed to activate account, please contact 876-953-9000 and request a new activation link, Link maybe expired or failed to create";
					}
				}else{
					echo "failed to activate user, please contact 876-953-9000 and request a new activation link, Link maybe expired or failed to create";
				}
				}else{
					echo "<script>window.location.href = '".site_url("Home/")."?error=User account already activated or invalid url';</script>";
					$this->auth02->killSession("hashes");
						$this->auth02->killSession("keyes");
				}
			}
		}
	}

public function UdpRegUser2(){


		$this->load->model('Authentication','auth02');
		//isPasswordValid(

		if( ($this->ses->has_userdata("hashess") == false) || ($this->ses->has_userdata("keyess") == false) ){
			echo "<script> window.location.href = '".site_url("Home/")."?error=Error:link expired';</script>";
		}else{
			$pass = $this->input->post('pass',true);
			$conp = $this->input->post('conp',true);

			$pass = $this->auth02->sanitizeInput($pass);
			$conp = $this->auth02->sanitizeInput($conp);

			$bool1 = $this->auth02->isPasswordValid($pass);
			$bool2 = $this->auth02->isPasswordValid($conp);

			if(empty($pass) || empty($conp)){
				echo "please fill out all feilds";
			}else if($pass != $conp){
				echo "password mismatch";
			}else if(($bool1) != true || ($bool2) != true){
				echo "please enter a alpha numeric password minimum character in lenght 8";
			}else{
				$passwordHash = password_hash($pass,PASSWORD_DEFAULT);

				$co = $this->auth02->checkDB("property_tenant", "tenant_session_id", $this->ses->userdata('keyess'));

				if($co['tenant_password'] == "" && $co['tenant_secret_hash'] == $this->ses->userdata('hashess')){
				$res = $this->auth02->UpdateTenant($passwordHash);
				if($res == true){
					$res2 = $this->auth02->removeRequest2();
					if($res2 == true){
						echo "<script>window.location.href = '".site_url("Home/")."?error=Account Activation was successful please login to continue';</script>";
						$this->auth02->killSession("hashess");
						$this->auth02->killSession("keyess");

					}else{
						echo "failed to activate account, please contact 876-953-9000 and request a new activation link, Link maybe expired or failed to create";
					}
				}else{
					echo "failed to activate user, please contact 876-953-9000 and request a new activation link, Link maybe expired or failed to create";
				}
				}else{
					echo "<script>window.location.href = '".site_url("Home/")."?error=User account already activated or invalid url';</script>";
					$this->auth02->killSession("hashess");
						$this->auth02->killSession("keyess");
				}
			}
		}
	}


	public function managerCreate(){
		$this->load->model('Authentication','auth02');
		if($this->ses->has_userdata('user_session')){
			$startfee = $this->input->post('start',true);
			$endfee = $this->input->post('end',true);
			$gct = $this->input->post('gct',true);
			$late = $this->input->post('late',true);

			$startfee = $this->auth02->sanitizeInput($startfee);
			$endfee = $this->auth02->sanitizeInput($endfee);
			$gct = $this->auth02->sanitizeInput($gct);
			$late = $this->auth02->sanitizeInput($late);

			if(($startfee == "") || ($endfee == "") || ($gct == "") || ($late == "")  ){

				echo "* Please fill out all feilds *";

			}else{

			if(!filter_var($startfee, FILTER_VALIDATE_FLOAT) || !filter_var($endfee, FILTER_VALIDATE_FLOAT) || !filter_var($gct, FILTER_VALIDATE_FLOAT) || !filter_var($late, FILTER_VALIDATE_FLOAT) ){

				echo "* please enter only digits in the feilds *";

			}else{

				if($startfee >= 0 && $gct >= 0 && $late >= 0 && $endfee >= 0){

					if($endfee > $startfee){

						$startfee = abs($startfee);
						$endfee = abs($endfee);
						$gct = abs($gct);
						$late = abs($late);

						$bool = $this->auth02->createManager(abs($startfee),abs($endfee),abs($gct),abs($late));

				if($bool == true){
					echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";
				}else{
					echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
				}
			}else{
				echo "* Start fee cannot be higher or the same as End Fee *";
			}

				}else{
					echo "* please use positive numbers *";
				}

			}

			}


		}else{
			echo "<script>window.location.href = '".site_url('Home')."?error=session expired please login';</script>";
		}

	}

	public function landlordCreate(){
		$this->load->model('Authentication','auth02');
		if($this->ses->has_userdata('user_session')){
			$fname = $this->input->post('fname',true) ;
			$lname = $this->input->post('lname',true) ;
			$email = $this->input->post('email',true) ;
			$mobile = $this->input->post('mobile',true);
			$saddress =$this->input->post('saddress',true);
			$city =  $this->input->post('city',true);
			$state = $this->input->post('state',true);
			$country = $this->input->post('country',true);
			$zip =$this->input->post('zip',true)  ;
			$gct =$this->input->post('gct',true) ;


			$fname = $this->auth02->sanitizeInput($fname);
			$lname = $this->auth02->sanitizeInput($lname);
			$email = $this->auth02->sanitizeInput($email);
			$mobile = $this->auth02->sanitizeInput($mobile);
			$saddress = $this->auth02->sanitizeInput($saddress);
			$city = $this->auth02->sanitizeInput($city);
			$state = $this->auth02->sanitizeInput($state);
			$country = $this->auth02->sanitizeInput($country);
			$zip = $this->auth02->sanitizeInput($zip);
			$gct = $this->auth02->sanitizeInput($gct);
			$gct = floatval($gct);

			if(empty($gct)){
				$gct = 0;
			}


			if(empty($fname) || empty($lname) || empty($email) || empty($mobile) || empty($saddress) || empty($city) || empty($state) || empty($country)){

				echo "* no feild can be empty *";

			}else{
				if(!ctype_alpha($fname) || !ctype_alpha($lname) || !ctype_graph($mobile)){
					echo "* either your first name or lastname contains a digit or symbol or your mobile number contains a letter or your zip code contains a symbol *";
				}else{
					if(!$this->auth02->isEmailValid($email) || !(filter_var($gct, FILTER_VALIDATE_FLOAT) == 0 || filter_var($gct, FILTER_VALIDATE_FLOAT) == 16.5) ){
						echo "* either your email address is incorrect or your gct *";
					}else{
						$doesEmailExistInUser = $this->auth02->checkDB1('system_user', 'manager_email', $email);
						$doesEmailExistInULandlord = $this->auth02->checkDB1('property_lanlord', 'landlord_email', $email);
						$doesEmailExistInUTenant = $this->auth02->checkDB1('property_tenant', 'tenant_email', $email);

						if($doesEmailExistInUser == true || $doesEmailExistInULandlord == true || $doesEmailExistInUTenant == true){
							echo "* User already exist *";
						}else{
							$bool = $this->auth02->createLandlord($fname, $lname, $email, $mobile, $saddress, $city, $state, $country, $zip, $gct);

							if($bool == true){
								if($this->auth02->requestpost("{$fname} {$lname}",'Landlord',$email,0) && $this->auth02->sendEmailToOwner($email)){
									echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";
								}else{
									echo "Infomation has been saved, but email failed to send, please resend on dashboard";
									echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
								}


							}else{
								echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
							}
						}
					}
				}
			}

		}else{
			echo "<script>window.location.href = '".site_url('Home')."?error=session expired please login';</script>";
		}
	}

		public function tenantCreate(){
			$gotResult;
		$this->load->model('Authentication','auth02');
		if($this->ses->has_userdata('user_session')) {
			$fname = $this->input->post('fname',true) ;
			$lname = $this->input->post('lname',true) ;
			$email = $this->input->post('email',true) ;
			$property =  $this->input->post('property',true);
			$mobile = $this->input->post('mobile',true);
			$deposit = $this->input->post("deposit",true);
			$new = $this->input->post('new',true);
			$dep = $this->input->post('dep',true);
			$pastdue = $this->input->post('pastdue',true);

			$fname = $this->auth02->sanitizeInput($fname);
			$lname = $this->auth02->sanitizeInput($lname);
			$email = $this->auth02->sanitizeInput($email);
			$property = $this->auth02->sanitizeInput($property);
			$mobile = $this->auth02->sanitizeInput($mobile);
			$new = $this->auth02->sanitizeInput($new);
			$deposit = $this->auth02->sanitizeInput($deposit);
			$dep = $this->auth02->sanitizeInput($dep);
			//$pastdue = $this->auth02->sanitizeInput($pastdue);
			$val = stripcslashes($pastdue);
			$myArry = json_decode($val);

			if(empty($myArry)){
				$gotResult = 0;
			}else{
				$gotResult = 1;
			}

			if(empty($new)){
				$new = 0;
			}

			if(empty($deposit)){
				$deposit = 0;
			}

			if(empty($dep)){
				$dep = 0;
			}

			if($dep > 1){
				$dep = 1;
			}

			if($dep < 0){
				$dep = 0;
			}

			if($new == 1 && !empty($myArry)){
				$gotResult = 0;
			}else if($new == 0 && !empty($myArry)){
				$gotResult = 1;
			}else if($new == 0 && empty($myArry)){
				$gotResult = 0;
			}else if($new == 1 && empty($myArry)){
				$gotResult = 0;
			}

			$deposit = floatval($deposit);

			if(ctype_digit($property)){
				if(empty($fname) || empty($lname) || empty($email) || empty($property) || empty($mobile)){

				echo "* no feild can be empty *";

			}else{
				if(!ctype_alpha($fname) || !ctype_alpha($lname) || !ctype_graph($mobile) || !ctype_digit($property) || !(filter_var($deposit, FILTER_VALIDATE_FLOAT) > -1 || !filter_var($pastdue,FILTER_VALIDATE_FLOAT)) ){
					echo "* either your first name or lastname contains a digit or symbol or your mobile number contains a letter or your deposit isn't a monetary value error 1 *".$deposit;
				}else{
					if(!$this->auth02->isEmailValid($email) ){
						echo "* please enter a valid email address *";
					}else{
						$doesEmailExistInUser = $this->auth02->checkDB1('system_user', 'manager_email', $email);
						$doesEmailExistInULandlord = $this->auth02->checkDB1('property_lanlord', 'landlord_email', $email);
						$doesEmailExistInUTenant = $this->auth02->checkDB1('property_tenant', 'tenant_email', $email);

						if($doesEmailExistInUser == true || $doesEmailExistInULandlord == true || $doesEmailExistInUTenant == true){
							echo "* User already exist *";
						}else{
							$propertyThere = $this->auth02->checkDB1('property_tenant', 'propertyID', $property);

							if($propertyThere == true){
								echo "* property is already rented *";
							}else{

								$doesBalanceExist = $this->auth02->checkDB1('tenant_balance_account','tid',$email);
								$doesDepositExist = $this->auth02->checkDB1('property_deposit','pid',$property);
								$holdval = $this->auth02->checkDB("landlord_property","propertyID",$property);

								if($holdval != false){

									$price = $holdval['rental_price'];
									$furnished = $holdval['furnished'];

									$totalbalance = 0;

									if(($furnished == 0)&& ( $new == 1)){
										$totalbalance = $price;
									}else if(($furnished == 1)&& ( $new == 1)){
										$totalbalance = floatval($price) * 2;
									}else if(($furnished == 0)&& ( $new == 0)){
										$totalbalance = 0;
									}else if(($furnished == 1)&& ( $new == 0)){
										$totalbalance = 0;
									}


									if($deposit < $price && $new == 1){
										echo "Your deposit cannot be less than  $".number_format($price,2,'.',',');
									}else{
								if($doesBalanceExist == true || $doesDepositExist == true){

									echo "* Error: user already had a balance or deposit *";

								}else{

							$bool = $this->auth02->createTenant($fname, $lname, $email, $property, $mobile);

							if($bool == true){
								$key =  $this->ses->userdata("ten");
								$this->auth02->updateProperty($property);
								$this->auth02->addTenantBalance($email, $totalbalance);
								$this->auth02->addTenantDeposit($email, $deposit, $property,$dep);
								if($this->auth02->requestpost("{$fname} {$lname}",'Tenant',$email,0) && $this->auth02->sendEmailToTenant($email)){
									echo "<script> $('.saved').html('Saved Successfully!').fadeIn(1000).fadeOut(2000);</script>";

									if($gotResult == 0){

									}else if($gotResult == 1){
										foreach ($myArry as $value) {
										$c = $this->auth02->addPastDue($value->amt, $value->day,$key);
									}

									if($c == true){
										$myArry = array();
										echo "<script>setTimeout(function(){
										},2000); $('.saved').html('past due balance added').fadeIn(1000).fadeOut(3000);setTimeout(function(){
										},3000);</script>";
									}else{
										$myArry = array();
										echo "<script>setTimeout(function(){
										},2000); $('.fail').html('failed to add past due').fadeIn(1000).fadeOut(3000);setTimeout(function(){
										},3000);</script>";
									}
								}else{
									echo "Fatal error please contact developer!";
								}

								}else{
									echo "Infomation has been saved, but email failed to send, please resend on dashboard";
									echo "<script> $('.sf').html('Saved Successfully!').fadeIn(1000).fadeOut(2000);</script>";

									if($gotResult == 0){

									}else if($gotResult == 1){
										foreach ($myArry as $value) {
										$c = $this->auth02->addPastDue($value->amt, $value->day,$key);
									}

									if($c == true){
										$myArry = array();
										echo "<script>setTimeout(function(){ $('.saved').html('past due balance added').fadeIn(1000).fadeOut(3000);},3000);</script>";
									}else{
										$myArry = array();
										echo "<script>setTimeout(function(){ $('.fail').html('failed to add past due').fadeIn(1000).fadeOut(3000);},3000);</script>";
									}
									}else{
									echo "Fatal error please contact developer!";
									}

								}


							}else{
								echo "<script> $('.fail').html('Fatal error, information failed to save!').fadeIn(1000).fadeOut(5000);</script>";
							}
						}
					}
				}else{
						echo "* The property you are trying to access doesn't exist *";
					}
						}
						}
					}
				}
			}
			//2nd dary main else
			}else if(ctype_alpha($property) || ctype_alnum($property)){
				if(empty($fname) || empty($lname) || empty($email) || empty($property) || empty($mobile)){

				echo "* no feild can be empty *";

			}else{
				if(!ctype_alpha($fname) || !ctype_alpha($lname) || !ctype_graph($mobile) || !(filter_var($deposit, FILTER_VALIDATE_FLOAT) > -1 || filter_var($pastdue,FILTER_VALIDATE_FLOAT)) ){
					echo "* either your first name or lastname contains a digit or symbol or your mobile number contains a letter  or your deposit isn't a monetary value  error 2 *".$deposit;
				}else{
					if(!$this->auth02->isEmailValid($email) ){
						echo "* please enter a valid email address *";
					}else{

						//still needs to query because ea manager can be a landlord and a manager can be a tenant
						$doesEmailExistInUser = $this->auth02->checkDB1('system_user', 'manager_email', $email);
						$doesEmailExistInULandlord = $this->auth02->checkDB1('property_lanlord', 'landlord_email', $email);
						$doesEmailExistInUTenant = $this->auth02->checkDB1('property_tenant', 'tenant_email', $email);


						if($doesEmailExistInUser == true || $doesEmailExistInULandlord == true || $doesEmailExistInUTenant == true){
							echo "* User already exist *";
						}else{
							$propertyThere = $this->auth02->checkDB1('property_tenant', 'propertyID', $property);

							if($propertyThere == true){
								echo "* apartment is already rented *";
							}else{
								$doesBalanceExist = $this->auth02->checkDB1('tenant_balance_account','tid',$email);
								$doesDepositExist = $this->auth02->checkDB1('property_deposit','pid',$property);
								$holdval = $this->auth02->checkDB("property_apartments","apt_hash",$property);

								if($holdval != false){
									$price = $holdval['rental_fee'];
									$furnished = $holdval['furnished'];

									$totalbalance = 0;

									if(($furnished == 0)&& ( $new == 1)){
										$totalbalance = $price;
									}else if(($furnished == 1)&& ( $new == 1)){
										$totalbalance = floatval($price) * 2;
									}else if(($furnished == 0)&& ( $new == 0)){
										$totalbalance = 0;
									}else if(($furnished == 1)&& ( $new == 0)){
										$totalbalance = 0;
									}


									if($deposit < $price && $new == 1){
										echo "Your deposit cannot be less than $".number_format($price,2,'.',',');
									}else{
										if($doesBalanceExist == true || $doesDepositExist == true){

									echo "* Error: user already had a balance or deposit *";

								}else{
							$bool = $this->auth02->createTenant2($fname, $lname, $email, $property, $mobile);

							if($bool == true){
								$key =  $this->ses->userdata("ten");
								$this->auth02->updateApartment($property);
								$this->auth02->addTenantBalance($email, $totalbalance);
								$this->auth02->addTenantDeposit($email, $deposit, $property,$dep);
								if($this->auth02->requestpost("{$fname} {$lname}",'Tenant',$email,0) && $this->auth02->sendEmailToTenant($email)){
									echo "<script> $('.saved').html('Saved Successfully!').fadeIn(1000).fadeOut(2000);</script>";
									if($gotResult == 0){

									}else if($gotResult == 1){
										foreach ($myArry as $value) {
										$c = $this->auth02->addPastDue($value->amt, $value->day,$key);
									}

									if($c == true){
										$myArry = array();
										echo "<script>setTimeout(function(){ $('.saved').html('past due balance added').fadeIn(1000).fadeOut(3000);},3000);</script>";
									}else{
										$myArry = array();
										echo "<script>setTimeout(function(){ $('.fail').html('failed to add past due').fadeIn(1000).fadeOut(3000);},3000);</script>";
									}
									}else{
										echo "Fatal error please contact devloperat 876-557-8447";
									}

								}else{
									echo "Infomation has been saved, but email failed to send, please resend on dashboard";
									echo "<script> $('.sf').html('Saved Successfully!').fadeIn(1000).fadeOut(2000);</script>";

									if($gotResult == 0){

									}else if($gotResult == 1){
										foreach ($myArry as $value) {
										$c = $this->auth02->addPastDue($value->amt, $value->day,$key);
									}

									if($c == true){
										$myArry = array();
										echo "<script>setTimeout(function(){ $('.saved').html('past due balance added').fadeIn(1000).fadeOut(3000);},3000);</script>";
									}else{
										$myArry = array();
										echo "<script>setTimeout(function(){ $('.fail').html('failed to add past due').fadeIn(1000).fadeOut(3000);},3000);</script>";
									}
									}else{
										echo "Fatal error please contact devloperat 876-557-8447";
									}

								}

							}else{
								echo "<script> $('.fail').html('Fatal error, information failed to save!').fadeIn(1000).fadeOut(5000);</script>";
							}
			}	}	}else{
						echo "* The property you are trying to access doesn't exist *";
					}	}
						}
					}
				}
			}
			}else{
				echo "* The property or apartment you choose doesn't exist *";
			}
		}else{
			echo "<script>window.location.href = '".site_url('Home')."?error=session expired please login';</script>";
		}
	}

	public function propertyCreate(){
		$this->load->model('Authentication','auth02');
		if($this->ses->has_userdata('user_session')){

			$landlord = $this->input->post('landlord',true);
			$rental = $this->input->post('rental',true);
			$street = $this->input->post('street',true);
			$city = $this->input->post('city',true);
			$state = $this->input->post('state',true);
			$country = $this->input->post('country',true);
			$zip = $this->input->post('zip',true);
			$multiple = $this->input->post('multiple',true);
			$units = $this->input->post('units',true);
			$unitname = $this->input->post('uname',true);
			$pp = $this->input->post('pp',true);

			$landlord = $this->auth02->sanitizeInput($landlord);
			$rental =$this->auth02->sanitizeInput($rental);
			$street = $this->auth02->sanitizeInput($street);
			$city = $this->auth02->sanitizeInput($city);
			$state = $this->auth02->sanitizeInput($state);
			$country = $this->auth02->sanitizeInput($country);
			$zip = $this->auth02->sanitizeInput($zip);
			$multiple =$this->auth02->sanitizeInput($multiple);
			$units =$this->auth02->sanitizeInput($units);
			$unitname =$this->auth02->sanitizeInput($unitname);
			$mfee =  $this->input->post('mfee',true);
			$mfee = $this->auth02->sanitizeInput($mfee);
			$bbf =$this->input->post('bbf',true) ;
			$bbf = $this->auth02->sanitizeInput($bbf);
			$pp = $this->auth02->sanitizeInput($pp);
			$mfee = floatval($mfee);
			if(empty($bbf)){
				$bbf = 0;
			}

			if(empty($pp)){
				$pp = 0;
			}

			//$pp = intval($pp);

			if($multiple == 0){

				if(empty($landlord) || empty($rental)  || empty($street) || empty($city) || empty($state) || empty($country) || empty($mfee)){

				echo "* Please fill out all feilds * ";

			}else{

			if(!filter_var($rental,FILTER_VALIDATE_FLOAT) || !(filter_var($mfee, FILTER_VALIDATE_FLOAT) == 10 || filter_var($mfee, FILTER_VALIDATE_FLOAT) == 10.5 || filter_var($mfee, FILTER_VALIDATE_FLOAT) == 12|| filter_var($mfee, FILTER_VALIDATE_FLOAT) == 12.5 || filter_var($mfee, FILTER_VALIDATE_FLOAT) == 15 || filter_var($bbf, FILTER_VALIDATE_FLOAT) || filter_var($pp, FILTER_VALIDATE_INT) == 1 || filter_var($pp, FILTER_VALIDATE_INT) == 0) ){

				echo "* Error: invalid rent or management fees are out of range 10% - 15% or balance brougth forward is not a number or code was modified *";

			}else{

					$rental = abs($rental);
					$bool = $this->auth02->createProperty($landlord, $rental, $street, $city, $state, $country, $zip,$mfee, $bbf,$pp);

					if($bool == true){
						echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";
					}else{
						echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
					}
			}

			}

			}else if($multiple == 1){

				if(empty($landlord) || empty($rental)  || empty($street) || empty($city) || empty($state) || empty($country) || empty($zip) || empty($units) || empty($unitname) || empty($mfee)){

				echo "* Please fill out all feilds *";

			}else{

			if(!filter_var($rental,FILTER_VALIDATE_FLOAT) || !filter_var($units,FILTER_VALIDATE_INT) || !(filter_var($mfee, FILTER_VALIDATE_FLOAT) == 10 || filter_var($mfee, FILTER_VALIDATE_FLOAT) == 10.5 || filter_var($mfee, FILTER_VALIDATE_FLOAT) == 12|| filter_var($mfee, FILTER_VALIDATE_FLOAT) == 12.5 || filter_var($mfee, FILTER_VALIDATE_FLOAT) == 15 || filter_var($bbf, FILTER_VALIDATE_FLOAT) || filter_var($pp, FILTER_VALIDATE_INT) == 1 || filter_var($pp, FILTER_VALIDATE_INT) == 0)){

				echo "* Error: invalid rent or management fees are out of range 10% - 15% or balance brougth forward is not a number or code was modified *";

			}else{

				if(!ctype_alnum($unitname)){

					echo "* your unit name is invalid *";

				}else{
					$rental = abs($rental);
					$units = abs($units);
					$bool = $this->auth02->createProperty1($landlord, $rental, $street, $city, $state, $country, $zip, $units);

					if($bool != false){
						echo "<script> $('.saved').html('saved successfully !').fadeIn(1000).fadeOut(2000);</script>";
						$re = $this->auth02->checkDB("landlord_property", "propertyhash", $bool);

						if($re != false){

							$x = 1;

							$rental = $rental / $units;

							$addApartments;

							for($x; $x <= $units; $x++){
								if($x < 10){
									$aptname = $unitname.'0'.$x;
								}else if($x >= 10){
									$aptname = $unitname.''.$x;
								}

								$addApartments = $this->auth02->createApartments($aptname, $rental, $re['propertyID'],$this->auth02->returnRandomString(8),$mfee, $bbf,$pp);
							}

							if($addApartments == true){
								$x = $x - 1;
								echo "<script> setTimeout(function(){
									$('.saved').html('+{$x} apartments where added').fadeIn(3000).fadeOut(2000);
								},3000);</script>";
							}else{
								echo "<script>setTimeout(function(){
								 $('.fail').html('Failed to add aparatments').fadeIn(3000).fadeOut(2000);
								},3000);</script>";
							}

						}else{
							echo "<script> $('.fail').html('Failed to add entries').fadeIn(1000).fadeOut(2000);</script>";
						}
					}else{
						echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
					}
				}

			}

			}

			}else{
				echo "* code modification is not supported *";
			}


		}else{
			echo "<script>window.location.href = '".site_url('Home')."?error=session expired please login';</script>";
		}
	}

	public function leaseAdd(){
		$this->load->model('Authentication','auth02');
		if($this->ses->has_userdata('user_session')){

			$start = $this->input->post('start',true);
			$end = $this->input->post('end',true);
			$tenant = $this->input->post('tenant',true);

			$start = $this->auth02->sanitizeInput($start);
			$end = $this->auth02->sanitizeInput($end);
			$tenant = $this->auth02->sanitizeInput($tenant);


/**
 * change this function to add months manually to not throw off the math for the automation
 */

			if(empty($start) || empty($end) || empty($tenant)){
				echo "* please fill out all feilds *";
			}else{

						$ree = $this->auth02->checkDB("property_lease_info","tenantID",$tenant);
						if($ree != false){
							echo "* tenant already has a lease *";
						}else{

				$days30 = date('Y-m-d',  strtotime($start.' +1 month'));
				
				if($end < 1){
					echo "Your lease date has to be atleast one month, cannot be less than ".$days30;
				}else{
					$enddate = date('Y-m-d',  strtotime($start.' +'.$end.' month'));
					$leaseAdd = $this->auth02->addLease($start, $enddate, $tenant);
					if($leaseAdd == true){
						$re = $this->auth02->checkDB("property_lease_info","tenantID",$tenant);
						if($re == false){
							echo "* please don't modify code *";
						}else{
							$updTen = $this->auth02->updateTenantLease($tenant, $re['lease_id']);
							if($updTen == true){
								echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";
							}else{
								echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
							}
						}

					}else{
						echo "* Failed to add lease *";
					}
				}
			}
			}

		}else{
			echo "<script>window.location.href = '".site_url('Home')."?error=session expired please login';</script>";
		}
	}

	public function createOrder(){

		$this->load->model('Authentication','auth02');
		if($this->ses->has_userdata('user_session')){

			$tenant = $this->input->post("tenant",true);
			$worker = $this->input->post("worker",true);
			$problem = $this->input->post("dop",true);
			$price = $this->input->post("price",true);

			$tenant = $this->auth02->sanitizeInput($tenant);
			$worker = $this->auth02->sanitizeInput($worker);
			$problem = $this->auth02->sanitizeInput($problem);
			$price = $this->auth02->sanitizeInput($price);

			if(empty($tenant) || empty($worker) || empty($problem) || empty($price)){
				echo "* all feilds are mandatory * ";
			}else{

			$checkTenant = $this->auth02->checkDB('property_tenant', 'tenant_email', $tenant);

			if($checkTenant != false){
				if(!filter_var($price,FILTER_VALIDATE_FLOAT)){
					echo "* price has to be a money value *";
				}else{
					$worker = ucfirst($worker);
					$problem = strtolower($problem);
					$save = $this->auth02->createWorkOrder($tenant, $worker, $problem, $price);

					if($save == true){
						echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";
					}else{
						echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
					}
				}
			}else{
				echo "* Tenant doesn't exist * ".$tenant;
			}
		}

		}else{
			echo "<script>window.location.href = '".site_url('Home')."?error=session expired please login';</script>";
		}


	}

	public function updateStart(){
		$this->load->model('Authentication','auth02');
		if($this->ses->has_userdata('user_session')){

			$tenant = $this->input->post("key",true);
			$worker = $this->input->post("date",true);
			$tenant = $this->auth02->sanitizeInput($tenant);
			$worker = $this->auth02->sanitizeInput($worker);

			if(empty($tenant) || empty($worker)){
				echo "* all feilds are mandatory *";
			}else{
				$doesDateExist = $this->auth02->checkDB("property_work_order","work_key",$tenant);
			if($doesDateExist != false){
				if($doesDateExist['date_started'] == "0000-00-00"){
					$date = date("Y-m-d", strtotime('now'));
					if($worker < $doesDateExist['date_issued']){
						echo "* Your work date cannot be less than ".$doesDateExist['date_issued']." *";
					}else{
						$wasStatusUpdated = $this->auth02->updateWorkStatus(1,$tenant,$worker);

						if($wasStatusUpdated == true){

							echo '<script> $(".albox").fadeOut(500); $("html").css("overflow-y","scroll");</script>';
							echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";

						}else{

							echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
						}
					}

				}else{
					if($doesDateExist['date_completed'] == "0000-00-00"){
						$start = $doesDateExist['date_started'];

					if($worker < $start){
						echo "Your completion date cannot be less than ".$start;
					}else{
						$wasStatusUpdated = $this->auth02->updateWorkStatus(2,$tenant,$worker);

						if($wasStatusUpdated == true){

							echo '<script> $(".albox").fadeOut(500); $("html").css("overflow-y","scroll");</script>';
							echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";

						}else{
							echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
						}
					}
					}else{
						$start = $doesDateExist['date_completed'];

					if($worker < $start){
						echo "Your pay date cannot be less than ".$start;
					}else{
						$wasStatusUpdated = $this->auth02->updateWorkStatus(3,$tenant,$worker);

						if($wasStatusUpdated == true){

							echo '<script> $(".albox").fadeOut(500); $("html").css("overflow-y","scroll");</script>';
							echo "<script> $('.saved').fadeIn(1000).fadeOut(2000);</script>";

						}else{
							echo "<script> $('.fail').fadeIn(1000).fadeOut(2000);</script>";
						}
					}
					}

				}
			}else{
				echo "* Work order doesn't exist *";
			}

			}
		}else{
			echo "<script>window.location.href = '".site_url('Home')."?error=session expired please login';</script>";
		}
	}


	public function duepass(){
		$this->load->model('Authentication','auth02');
		$val = $this->input->post('pastdue',true);
		$val = stripcslashes($val);
		$myArry = json_decode($val);
		foreach($myArry as $data){
			echo "Amount = ".$data->{'amt'}." | Due date = ".$data->{'day'}."<br/>";
		}
	}

}

?>
