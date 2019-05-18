<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function autoPullFrom($table, $user){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `$table` where `manager_status`='1' AND `user_hash`='' AND `managersession` != '$user' ");
       if($request->num_rows() > 0){
         $result = $request->result_array();
         foreach($result as $val){
					$status = "";
					if($val['manager_status'] == 1){
						$status = "Activated";
					}

					echo "<tr><td> ".$val['manager_fname']."</td>
					<td>". $val['manager_lname']."</td>
					<td>".$status."</td>
					<td id='".$val['managerID']."'><img class='de' src='".base_url('assets/del.png')."' width='24px' height='24px'/></td></tr>";
       }
   }else{
         echo '<script>setTimeout(function(){ $(".r").text("No other system users avaliable");},1000);</script>';
       }
	}

	function activeUsers($session){
		$ci =& get_instance();
		$request = $ci->db->query("Select * from `system_user` where `manager_status`=1 AND `managersession` != '$session' ");
		if($request->num_rows() > 0){
         $result = $request->result_array();
         $online = 0;
         $st = "";
         foreach($result as $data){
         	if($data['online'] == 1){
         		$online = 1;
         		$st = "online";
         	}else{
         		$online = 0;
         		$st = "offline";
         	}

         	echo "<li class='pending' title='System User Status: {$st}'><div class='o{$online}' title='{$st}'></div>Name: {$data['manager_fname']} {$data['manager_lname']} <br/> Date-Joined: {$data['date_joined']} </li>";


         }
         //activeUsers($session);
     }else{
     	echo '<script>setTimeout(function(){ $(".co1").text("No Active Users");},200);</script>';
     }

	}

	function activeLandlords(){
		$ci =& get_instance();
		$request = $ci->db->query("Select * from `property_lanlord` where `landlord_account_status`=1 ");
		if($request->num_rows() > 0){
         $result = $request->result_array();
         $online = 0;
         $st = "";
         foreach($result as $data){
         	if($data['online'] == 1){
         		$online = 1;
         		$st = "online";
         	}else{
         		$online = 0;
         		$st = "offline";
         	}

         	echo "<li class='pending' title='Lanlord Status: {$st}'><div class='o{$online}' title='{$st}'></div>Name: {$data['landlord_fname']} {$data['landlord_lname']} <br/> Date-Joined: {$data['date_joined']}<br/> Email: {$data['landlord_email']}</li>";


         }
         //activeUsers($session);
     }else{
     	echo '<script>setTimeout(function(){ $(".co2").text("No Active Landlord");},200);</script>';
     }
	}

	function activeTenants(){
			$ci =& get_instance();
		$request = $ci->db->query("Select * from `property_tenant` where `tenant_status`=1 ");
		if($request->num_rows() > 0){
         $result = $request->result_array();
         $online = 0;
         $st = "";
         foreach($result as $data){
         	if($data['online'] == 1){
         		$online = 1;
         		$st = "online";
         	}else{
         		$online = 0;
         		$st = "offline";
         	}

         	echo "<li class='pending' title='Tenant Status: {$st}'><div class='o{$online}' title='{$st}'></div>Name: {$data['tenant_fname']} {$data['tenent_lname']} <br/> Date-Joined: {$data['date_joined']} <br/>Email: {$data['tenant_email']}</li>";


         }
         //activeUsers($session);
     }else{
     	echo '<script>setTimeout(function(){ $(".co3").text("No Active Tenant");},200);</script>';
     }
	}

	function autoPullFrom2($table){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `$table`");
       if($request->num_rows() > 0){
         $result = $request->result_array();
         foreach($result as $val){
					$status = "";
					if($val['status'] == 0){
						$status = "not activated";
					}

					echo "<li class='pending'>Name:{$val['Name']} <br/>Status:{$status} <br/>Email: {$val['email']} <img id='{$val['rid']}' src ='".base_url('assets/send.png')."' width='30px' height='30px'/><img style='display:none;' class='{$val['rid']}' src ='".base_url('assets/pleasewait1.gif')."' width='30px' height='30px'/></li> <script>$('#{$val['rid']}').click(function(){

						$(this).hide();
						$('.{$val['rid']}').show();

						var email = '{$val['email']}';
						var id = {$val['rid']};

						$.post('".site_url('Home/resendActivation')."',{id:id,email:email},function(data){
							setTimeout(function(){
								$('.res').html(data);
								$('#{$val['rid']}').show();
								$('.{$val['rid']}').hide();
							},200);
						});
					});</script>";
       }
   }else{
         echo '<script>setTimeout(function(){ $(".co").text("No Pending Request");},200);</script>';
       }
	}

		function autoPullFrom3($table){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `$table`");
       if($request->num_rows() > 0){
         $result = $request->result_array();
         foreach($result as $val){
			echo "<tr class='adone'>

				<td>{$val['management_start_fee']}% - {$val['management_end_fee']}%</td>
				<td>{$val['management_late_fee']}%</td>
				<td>{$val['management_gct']}%</td>
				<td class='".$val['property_manager_id']."'><img class='de' src='".base_url('assets/edit.png')."' width='24px' height='24px'/></td>
				<td id='".$val['property_manager_id']."'><img class='de' src='".base_url('assets/del.png')."' width='24px' height='24px'/></td>

			</tr>";
       }
   }else{
         echo '<script>setTimeout(function(){ $(".r").text("No other system users avaliable");},1000);</script>';
       }
	}


	function autoPullFrom4($table,$data){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `$table` where `property_manager_id`='$data'");
       if($request->num_rows() > 0){
         $result = $request->row_array();

         $startfee = $result['management_start_fee'];
         $endfee =  $result['management_end_fee'];
         $startfee1 = $result['management_start_fee'];

         for($x = $startfee; $x <= $endfee; $x += 2){

         	if($x == 10){
         		echo "<option value='{$x}'>{$x}</option>%";
         		echo "<option value='{$x}.5'>{$x}.5</option>";
         	}else if($x == 12){
         		echo "<option value='{$x}'>{$x}</option>";
         		echo "<option value='{$x}.5'>{$x}.5</option>";
         	}
         	else if($x == 14){
         		echo "<option value='15'>15</option>";
         	}


         }

   }else{
         echo '<option>No Maintenance fee avaliable</option>';
       }
	}

	function autoPullFrom6(){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `property_lanlord`");
       if($request->num_rows() > 0){
         $result = $request->result_array();

         foreach($result as $val){
         	echo "<option value='{$val['landlordID']}'>{$val['landlord_fname']} {$val['landlord_lname']}</option>";
         }

   }else{
         echo '<option>No landlords avaliable</option>';
       }
	}

	function autoPullFrom8(){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `landlord_property` where `property_status`='open' AND `multiple_units` != '1'");
       if($request->num_rows() > 0){
         $result = $request->result_array();

         foreach($result as $val){
         	echo "<option value='{$val['propertyID']}'>{$val['property_street_address']},{$val['property_city']}</option>";
         }

         autoPullFrom18();

   }else{
         echo '<option>No Open Property avaliable</option>';
				 autoPullFrom18();
       }
	}

    function autoPullFrom18(){
         $ci =& get_instance();
         $request = $ci->db->query("Select * from `property_apartments` where `apt_status`='open'");
       if($request->num_rows() > 0){
         $result = $request->result_array();
         echo "<option value=''>-- Plese Select an apartment --</option>";
         foreach($result as $val){
            echo "<option value='{$val['apt_hash']}'>{$val['aptname']}__property id - {$val['pid']}</option>";
         }

   }else{
         echo '<option>No Open Apartments avaliable</option>';
       }
    }

	function returnData(){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `property_lanlord`");
		 // where `landlordID`='$data'
       if($request->num_rows() > 0){
       		return $request->result_array();
       }else{
       	return false;
       }
	}

	function autoPullFrom7(){
 		$ci =& get_instance();
		$request = $ci->db->query("Select * from `landlord_property` ");
		if($request->num_rows() > 0){
			setlocale(LC_MONETARY, 'en_US');
         $result = $request->result_array();

         foreach($result as $val){
         	$landlord = checkSession4("property_lanlord","landlordID",$val['landlordID']);
         	echo "<tr>

         		<td>{$val['property_street_address']}, {$val['property_city']}, {$val['property_state']}, {$val['property_country']}, {$val['property_zip']}</td>
         		<td>$".number_format($val['rental_price'],2,'.',',')."</td>
                <td>{$val['property_management_fee_tax_percent']}%</td>
         		<td>{$landlord['landlord_fname']} {$landlord['landlord_lname']}</td>
         		<td>{$val['property_status']}</td>
         		<td class='".$val['propertyID']."'><img class='de' src='".base_url('assets/edit.png')."' width='24px' height='24px'/></td>
				<td id='".$val['propertyID']."'><img class='de' src='".base_url('assets/del.png')."' width='24px' height='24px'/></td>

         	</tr>";
         }

   }else{
         echo '<script>setTimeout(function(){ $(".r").text("No properties avaliable");},1000);</script>';
       }
	}

    function autoPullFrom17(){
        $ci =& get_instance();
        $request = $ci->db->query("Select * from `property_apartments` ");
        if($request->num_rows() > 0){
            //setlocale(LC_MONETARY, 'en_US');
         $result = $request->result_array();

         foreach($result as $val){
            $property = checkSession4("landlord_property","propertyID",$val['pid']);
            echo "<tr>

                <td>{$property['property_street_address']}, {$property['property_city']}, {$property['property_state']}, {$property['property_country']}, {$property['property_zip']}</td>
                <td>{$val['aptname']}</td>
                <td>$".number_format($val['rental_fee'],2,'.',',')."</td>

                <td>{$val['apt_status']}</td>
                <td class='".$val['aid']."'><img class='de' src='".base_url('assets/edit.png')."' width='24px' height='24px'/></td>
                <td id='".$val['aid']."'><img class='de' src='".base_url('assets/del.png')."' width='24px' height='24px'/></td>

            </tr>";
         }

   }else{
         echo '<script>setTimeout(function(){ $(".r").text("No properties avaliable");},1000);</script>';
       }
    }

	function autoPullFrom9(){
 		$ci =& get_instance();
		$request = $ci->db->query("Select * from `property_tenant` ORDER BY `property_tenantID`,`lease_id` DESC ");
		if($request->num_rows() > 0){
         $result = $request->result_array();
         $term = "";
         $por = "";
         foreach($result as $val){
            if($val['unit'] == ""){
                $por = "{$val['tenant_street_address']}, {$val['tenant_city']}";
            }else{
                $por = "{$val['tenant_street_address']}, {$val['tenant_city']} - apartment - {$val['unit']}";
            }
         	if($val['lease_id'] == ""){
         		$term = "none";
         	}else{
         		$term = $val['lease_id'];
         		$leaseTerm = checkSession4("property_lease_info","lease_id",$term);

         		if($leaseTerm == false){
         			$term = "none";
         		}else{
		 	$datediff = $ci->db->query("Select DATEDIFF(`lease_end_date`,`lease_start_date`) as dt from `property_lease_info` where `tenantID`='{$val['property_tenantID']}' ");
		 		$rt = $datediff->row_array();
		 		$term = floor($rt['dt'] / 30);
		 		$days = ($rt['dt'] % 30);
		 		if($days > 0){
		 			$days = ($rt['dt'] % 30) - 1;
		 		}
		 		if($term > 1){
		 			$term.=' months '.$days.=' days';
		 		}else{
		 			$term.=' month '.$days.=' days';
		 		}

         		}
         	}

         	$landlord = checkSession4("property_lanlord","landlordID",$val['landlordID']);
         	echo "<tr>
         		<td>{$val['tenant_fname']} {$val['tenent_lname']}</td>
         		<td>{$por}</td>
         		<td>{$landlord['landlord_fname']} {$landlord['landlord_lname']}</td>
         		<td>{$term}</td>
         		<td>{$val['tenant_email']}</td>
         		<td>{$val['tenant_mobile']}</td>
         		<td class='".$val['property_tenantID']."'><img class='de' src='".base_url('assets/edit.png')."' width='24px' height='24px'/></td>
				<td id='".$val['property_tenantID']."'><img class='de' src='".base_url('assets/del.png')."' width='24px' height='24px'/></td>

         	</tr>";
         }

   }else{
         echo '<script>setTimeout(function(){ $(".r").text("No tenants avaliable");},1000);</script>';
       }
	}


	function autoPullFrom10(){
 		$ci =& get_instance();
		$request = $ci->db->query("Select * from `property_tenant` where `lease_id`='' ");
		if($request->num_rows() > 0){
         $result = $request->result_array();
     foreach($result as $val){
         	echo "<option value='{$val['property_tenantID']}'>{$val['tenant_fname']} {$val['tenent_lname']}</option>";
         }

   }else{
         echo '<option>No Open Tenant avaliable</option>';
       }
	}

        function autoPullFrom12(){
        $ci =& get_instance();
        $request = $ci->db->query("Select * from `property_tenant` where `tenant_email` != '' ");
        if($request->num_rows() > 0){
         $result = $request->result_array();
     foreach($result as $val){
            echo "<option value='{$val['tenant_email']}'>{$val['tenant_fname']} {$val['tenent_lname']}</option>";
         }

   }else{
         echo '<option>No Open Tenant avaliable</option>';
       }
    }
      //status 0 = pending start status 1 = pending finish status 2 = pending payment payed  = 0 status 3 complete =  1 status 4 = user request

    function autoPull13(){
        $ci =& get_instance();
        $request = $ci->db->query("Select * from `property_work_order` where `status` = 0 OR `status` = 1 ORDER BY `status` ASC ");
        $button = "";
        $word = "";
        $image = "";
        $div = "";
        if($request->num_rows() > 0){
            $result = $request->result_array();
            foreach($result as $val){
                $tenant = checkSession4("property_tenant","tenant_email",$val['tenantID']);
                if($val['status'] == 0){
                    $word = "pending start";
                    $div = "<div class='pending_start' title='{$word}'></div>";
                    $button = "<button  id='{$val['work_key']}' >Start</button>";
                }else if($val['status']==1){
                    $word = "work in progress";
                    $div = "<div class='inprogress' title='{$word}'></div>";
                    $button = "<button id='{$val['work_key']}'>Complete</button>";
                }

                if($val['work_image'] == ""){
                    $image = "create by manager";
                }else{
                    $image = "<a>{$val['work_image']}<a/>";
                }

                echo "<tr>
                    <td>{$tenant['tenant_fname']} {$tenant['tenent_lname']}</td>
                    <td>{$val['person_assigned']}</td>
                    <td>$".number_format($val['amount'],2,'.',',')."</td>
                    <td>{$val['date_issued']}</td>
                    <td>{$val['date_started']}</td>
                    <td>{$div}</td>
                    <td>{$val['problem_description']}</td>
                    <td>{$image}</td>
                    <td>{$button}</td>
                </tr>";
            }
        }else{
            echo '<script>setTimeout(function(){ $(".r").eq(1).text("No Work In Progress");},1000);</script>';
        }
    }
      //status 0 = pending start status 1 = pending finish status 2 = pending payment payed  = 0 status 3 complete =  1 status 4 = user request

    function autoPull14(){

        $ci =& get_instance();
        $request = $ci->db->query("Select * from `property_work_order` where `status` = 2 ORDER BY `status` ASC ");
        $button = "";
        $word = "pending payment";
        $image = "";
        if($request->num_rows() > 0){
            $result = $request->result_array();
            foreach($result as $val){
                $tenant = checkSession4("property_tenant","tenant_email",$val['tenantID']);

                if($val['work_image'] == ""){
                    $image = "create by manager";
                }else{
                    $image = "<a>{$val['work_image']}<a/>";
                }

                echo "<tr>
                    <td>{$tenant['tenant_fname']} {$tenant['tenent_lname']}</td>
                    <td>{$val['person_assigned']}</td>
                    <td>$".number_format($val['amount'],2,'.',',')."</td>
                    <td>{$val['date_issued']}</td>
                    <td>{$val['date_started']}</td>
                    <td>{$val['date_completed']}</td>
                    <td><div class='complete' title='work completed'></div></td>
                    <td>{$val['problem_description']}</td>
                    <td>{$image}</td>
                    <td><button id='{$val['work_key']}'>Pay</button></td>
                </tr>";
            }
        }else{
            echo '<script>setTimeout(function(){ $(".r").eq(2).text("No Completed Work Order ");},1000);</script>';
        }

    }

    function autoPull15(){
        $ci =& get_instance();
        $request = $ci->db->query("Select * from `property_work_order` where `status` = 3 ORDER BY `status` ASC ");
        if($request->num_rows() > 0){
            $result = $request->result_array();
            foreach($result as $val){

                echo "<tr>
                    <td>{$val['work_key']}</td>
                    <td>{$val['person_assigned']}</td>
                    <td>$".number_format($val['amount'],2,'.',',')."</td>
                    <td>{$val['date_payed']}</td>
                    <td>{$val['date_started']}</td>
                    <td>{$val['date_completed']}</td>
                    <td><a href = '".site_url('C_test/create_pdf')."' target='_BLANK'>View Receipt</a></td>
                </tr>";
            }
        }else{
            echo '<script>setTimeout(function(){ $(".r").eq(3).text("No Work Transactions Made");},1000);</script>';
        }

    }

    function autoPull16(){

        $ci =& get_instance();
        $request = $ci->db->query("Select * from `property_work_order` where `status` = 4 ORDER BY `status` ASC ");
        $button = "";
        $word = "pending review";
        $image = "";
        if($request->num_rows() > 0){
            $result = $request->result_array();
            foreach($result as $val){
                $tenant = checkSession4("property_tenant","tenant_email",$val['tenantID']);

                if($val['work_image'] == ""){
                    $image = "create by manager";
                }else{
                    $image = "<a>{$val['work_image']}<a/>";
                }

                echo "<tr>
                    <td>{$tenant['tenant_fname']} {$tenant['tenent_lname']}</td>
                    <td>{$val['date_issued']}</td>
                    <td>{$val['problem_description']}</td>
                    <td>{$image}</td>
                    <td id='{$val['work_order_id']}_{$val['work_key']}'><img class='de' src='".base_url('assets/view.png')."' width='24px' height='24px'/></td>
                </tr>";
            }
        }else{
            echo '<script>setTimeout(function(){ $(".r").eq(0).text("No user requested work order");},1000);</script>';
        }

    }


	function allCountries(){
		$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

		foreach($countries as $country){
			echo "<option value='{$country}'>{$country}</option>";
		}
	}


	function autoPullFrom5(){
		$ci =& get_instance();
		 $request = $ci->db->query("Select * from `property_lanlord` where `landlord_account_status`=1 AND `secret_hash`='' ");
		 $gct = "";
		 if($request->num_rows() > 0){
		 	$result = $request->result_array();

		 	foreach($result as  $val){
		 		if($val['gct'] == 0){
		 			$gct = "no";
		 		}else{
		 			$gct = "yes";
		 		}
		 		$request1 = $ci->db->query("Select COUNT(*) as total from `landlord_property` where `landlordID`='{$val['landlordID']}'");
		 		$ro = $request1->row_array();
		 		$tpo = $ro['total'];
		 		echo "<tr>
		 			<td>{$val['landlord_fname']}</td>
		 			<td>{$val['landlord_lname']}</td>
		 			<td title='{$val['gct']}%'>{$gct}</td>
		 			<td>{$tpo}</td>
		 			<td>{$val['landlord_email']}</td>
		 			<td>{$val['landlord_mobile']}</td>
		 			<td class='".$val['landlordID']."'><img class='de' src='".base_url('assets/edit.png')."' width='24px' height='24px'/></td>
				<td id='".$val['landlordID']."'><img class='de' src='".base_url('assets/del.png')."' width='24px' height='24px'/></td>

		 		</tr>";
		 	}

		 }else{
		 	echo '<script>setTimeout(function(){ $(".r").text("No landlords avaliable");},1000);</script>';
		 }
	}

	function autoPullFrom11(){
		$ci =& get_instance();

		//innerJoins
		 $request = $ci->db->query("Select * from `property_lease_info`");

		 if($request->num_rows() > 0){
		 	$result = $request->result_array();

		 	foreach($result as  $val){
		 		$tenant = checkSession4("property_tenant","property_tenantID",$val['tenantID']);
		 		$datediff = $ci->db->query("Select DATEDIFF(`lease_end_date`,`lease_start_date`) as dt from `property_lease_info` where `tenantID`='{$tenant['property_tenantID']}' ");
		 		$rt = $datediff->row_array();
		 		$term = floor($rt['dt'] / 30);
		 		$days = ($rt['dt'] % 30);
		 		if($days > 0){
		 			$days = ($rt['dt'] % 30) - 1;
		 		}
		 		if($term > 1){
		 			$term.=' months '.$days.=' days';
		 		}else{
		 			$term.=' month '.$days.=' days';
		 		}
		 		echo "<tr>
		 			<td>{$term}</td>
		 			<td>{$tenant['tenant_fname']} {$tenant['tenent_lname']}</td>
		 			<td>{$val['lease_end_date']}</td>
		 			<td id='".$val['lease_secret_key']."'><img class='de' src='".base_url('assets/autorenew.png')."' width='24px' height='24px'/></td>
		 			<td class='".$val['lease_id']."'><img class='de' src='".base_url('assets/edit.png')."' width='24px' height='24px'/></td>
					<td id='".$val['lease_id']."'><img class='de' src='".base_url('assets/del.png')."' width='24px' height='24px'/></td>

		 		</tr>";
		 	}

		 }else{
		 	echo '<script>setTimeout(function(){ $(".r").text("No lease avaliable");},1000);</script>';
		 }
	}

	function mainPanelProperties(){
		$ci =& get_instance();
		$joins = $ci->db->query("
			Select
				property_tenant.propertyID as pid1,
				landlord_property.propertyID as pid2,
				property_apartments.property_management_fee_tax_percent as per2,
				landlord_property.property_management_fee_tax_percent as per1,
				property_tenant.*,
				landlord_property.*,
				property_apartments.*,
				property_lease_info.*
				from property_tenant
				Left Outer Join landlord_property On  property_tenant.propertyID  = landlord_property.propertyID
				Left Outer Join property_apartments On property_tenant.propertyID = property_apartments.apt_hash
				Left Outer Join property_lease_info On property_tenant.lease_id = property_lease_info.lease_id
				WHERE property_status IS NULL or apt_status IS NULL
				Order By property_tenant.lease_id DESC
				"
			);

			
		if($joins->num_rows() > 1){
			$result = $joins->result_array();
			
			$property;
			$status;
			$leaseTerm;
			$start;
			$end;
			$month;
			$day;
			$rentalFee;
			$mngtFee;
			$leaseExp;
			$name;
			foreach ($result as $res) {
				$name = $res['tenant_fname']." ".$res['tenent_lname'];
				$property = $res['pid1'];
				$rentalFee = "$".number_format($res['monthly_fee'],2,'.',',');
				$start = date_create($res['lease_start_date']);
				$end = date_create($res['lease_end_date']);
				$leaseTerm = date_diff($end,$start);
				$month = floor($leaseTerm->days / 30);
				$day = $leaseTerm->days % 30;
				if($day > 1 && $month > 1 ){
					$leaseTerm= $month." months ".$day." days";
				}else if($day > 1 && $month <= 1 ){
					$leaseTerm= $month." month ".$day." days";
				}else if($day <= 1 && $month > 1 ){
					$leaseTerm= $month." months ".$day." day";
				}else{
					$leaseTerm= "not assigned";
				}

				if( ($res['property_status'] === '') || ($res['apt_status'] === '') ){
					$status="empty";
				}else{
					$status="rented";
				}

				if($res['per1'] != ""){
					$mngtFee = $res['per1']."%";
				}else if($res['per2'] != ""){
					$mngtFee = $res['per2']."%";
				}else{
					$mngtFee="not assigned";
				}

				if($res['lease_end_date'] != ""){
					$leaseExp = $res['lease_end_date'];
				}else{
					$leaseExp = "not assigned";
				}
				echo "<tr>
					<td>{$name}</td>
					<td>{$property}</td>
					<td>{$status}</td>
					<td>{$leaseTerm}</td>
					<td>{$rentalFee}</td>
					<td>{$mngtFee}</td>
					<td>{$leaseExp}</td>
				</tr>";

			}
		}else{
            echo "<tr >
						<td colspan='6'>This database has no property please create properties and rent them to get started</td>
						</tr>";
		 }
	}

	function rentCollection(){
		$queryString = "Select property_tenant.*, landlord_property.*,property_apartments.*,
		property_lease_info.*,rent.*,tenant_past_due.*,property_lanlord.* 
		from property_tenant
		left outer join landlord_property on property_tenant.propertyID = landlord_property.propertyID
		Left outer join property_apartments on property_tenant.propertyID = property_apartments.apt_hash
		left outer join property_lease_info on property_tenant.lease_id = property_lease_info.lease_id
		left outer join rent on property_tenant.property_tenantID = rent.tenant_id
		left outer join tenant_past_due on property_tenant.tenant_session_id = tenant_past_due.tid
		left outer join property_lanlord on property_tenant.landlordID = property_lanlord.landlordID
		where (landlord_property.property_status = 'rented' AND rent.push_status <> 2)
		OR (property_apartments.apt_status = 'rented' AND rent.push_status <> 2)";
		
		$ci =& get_instance();

		$query = $ci->db->query($queryString);
		$mainArray = array();
		$mainArray1 = array();
		if($query->num_rows() > 1){
			$result = $query->result_array();
			$jsonVersion = json_encode($result);
			$jsonDecode = json_decode($jsonVersion);
			$val = 0;
			for($x = 0; $x < count($jsonDecode); $x++){
				if(in_array($jsonDecode[$x]->property_tenantID, $mainArray1)){

				}else{
					$val = in_array_r($jsonDecode[$x]->property_tenantID,$mainArray1);
				
				//echo $val;
				if($val > -1){
					array_push($mainArray[$val]['PaymentData'], array(
						"Amount" => $jsonDecode[$x]->amount_due,
						"Period" => $jsonDecode[$x]->rent_period,
						"Account" => ""
					));
					/*array_push($mainArray, array(
						"id" => $jsonDecode[$x]->property_tenantID,
						"Dates" => array($jsonDecode[$x]->property_tenantID),
					));//to solv this you need to find the index of the item that exisit already and update that array*/
				}else{
					array_push($mainArray, array(
						"id" => $jsonDecode[$x]->property_tenantID,
						"PaymentData" => array(array(
							"Amount" => $jsonDecode[$x]->amount_due,
							"Period" => $jsonDecode[$x]->rent_period,
							"Account" => ""
						)
					)));
				}
			}
				array_push($mainArray1, $jsonDecode[$x]->property_tenantID);
			}
			
			print_r(json_encode($mainArray));
		}
}

function in_array_r($item, $array) {
	$isThere = false;
	$count = -1;
	$counta  = 0;
    foreach ($array as $key) {
        if ($key == $item) {
			$counta++;
			$count = $counta;
			break;
		}
    }
    return $count;
}

	function checkSession($table,$user){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `$table` where `managersession`='$user'");
       if($request->num_rows() > 0){
       		return true;
       }else{
       	return false;
       }
	}

	function checkSession1($table,$user){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `$table` where `managersession`='$user'");
       if($request->num_rows() > 0){
       		return $request->row_array();
       }else{
       	return false;
       }
	}

	function checkSession4($table,$column,$data){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `$table` where `$column`='$data'");
       if($request->num_rows() > 0){
       		return $request->row_array();
       }else{
       	return false;
       }
	}

	function checkSession3($table,$column,$data){
		 $ci =& get_instance();
		 $request = $ci->db->query("Select * from `$table` where `$column`='$data'");
       if($request->num_rows() > 0){
       		return true;
       }else{
       	return false;
       }
	}

    function KB_GB($kb_value){
        $one_gb_kb = 1048576;
        $one_gb = $kb_value / $one_gb_kb;
        $one_gb = number_format($one_gb,2,'.','');
        return $one_gb;
    }

    function loadFolders(){

        $ci =& get_instance();

        $request = $ci->db->query("Select * from `admin_folders`");
        $c = 0;
        if($request->num_rows() > 0){
            $folders = $request->result_array();
            foreach ($folders as $folder) {

                if(is_dir('uploads/'.$folder['folder_name'])){
                    $re = $ci->db->query("Select Count(*) as total, Sum(`file_size`) as totalkb from `file_upload` where `folderID`='{$folder['folderID']}'");

                    $ress = $re->row_array();
                    $size_of_files = KB_GB($ress['totalkb']);
                    echo "

                <div class='folders' ondblclick='options({$folder['folderID']});' title='File in folder: {$ress['total']}\nFolder Size: {$size_of_files} gb'>
                <img src='".base_url('assets/folder.png')."' width='50px' height='50px'/>
                <p class='name' id='l{$folder['folderID']}'>".ucwords($folder['folder_name'])."</p>

                <ul id='{$folder['folderID']}' style='display:none'>

                    <li onclick='opn(\"{$folder['folder_name']}\")'>Open</li>
                    <li  onclick='ren(\"l{$folder['folderID']}\")'>Rename</li>
                    <li onclick='del({$folder['folderID']},\"{$folder['folder_name']}\")'>Delete</li>

                </ul>
                </div>
             ";
            }else{

               $ci->db->query("delete from `admin_folders` where `folder_name` = '".$folder['folder_name']."'");
            }
             $c++;
         }
            }else{
            echo "No folders to display";
        }



    }

    function folders(){
        $ci =& get_instance();
        $request = $ci->db->query("Select * from `admin_folders`");
       if($request->num_rows() > 0){
        $folders = $request->result_array();
         foreach ($folders as $folder) {
            echo "<option value='".$folder['folderID']."'>{$folder['folder_name']}</option>";
        }
        }else{
            echo "No folder please create to upload";
        }
    }

    function files($folderID){

    }
?>
