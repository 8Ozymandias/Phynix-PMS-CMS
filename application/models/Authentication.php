<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Model{


  // Test case start

  // Test Case end

  


	public function Register($fname,$lname,$email){

		$seskey =  $this->returnRandomString(30);
		$hashkey =  $this->returnRandomString(50);

		$insertUser = $this->db->query("Insert into `system_user` (`managersession`,`manager_fname`,`manager_lname`,`manager_email`,`user_hash`,`manager_status`) values ('$seskey','$fname','$lname','$email','$hashkey','0') ");

		if($insertUser == true){
			return true;

		}else{
			return false;
		}
	}



	public function killSession($sessionarray){
		if($this->ses->has_userdata($sessionarray)){
			 $this->ses->unset_userdata($sessionarray);
			}else{
				return false;
			}

	}

	public function UpdateUser($password){

		$hash = $this->ses->userdata("hash");
		$key = $this->ses->userdata("key");

		$udpUser = $this->db->query("Update `system_user` set `manager_password`='$password',`user_hash`='',`manager_status`='1' where `managersession`='$key'");

		if($udpUser == true){
			return true;

		}else{
			return false;
		}
	}

  public function UpdateLandlord($password){

    //$hash = $this->ses->userdata("hashes");
    $key = $this->ses->userdata("keyes");

    $udpUser = $this->db->query("Update `property_lanlord` set `landlord_password`='$password',`secret_hash`='',`landlord_account_status`='1' where `landlord_session_id`='$key'");

    if($udpUser == true){
      return true;

    }else{
      return false;
    }
  }

  public function UpdateTenant($password){

    //$hash = $this->ses->userdata("hashes");
    $key = $this->ses->userdata("keyess");

    $udpUser = $this->db->query("Update `property_tenant` set `tenant_password`='$password',`tenant_secret_hash`='',`tenant_status`='1' where `tenant_session_id`='$key'");

    if($udpUser == true){
      return true;

    }else{
      return false;
    }
  }

	public function removeRequest(){
		$key = $this->ses->userdata("key");

		$secret = $this->checkDB("system_user", "managersession", $key);
		$bool = $this->checkDB1("system_user", "managersession", $key);

		if($bool == true){

			$bool1 = $this->delete("property_pending_request", "email", $secret['manager_email']);

			if($bool1 == true){
				return true;
			}else{
				return false;
			}

		}else{
			return false;
		}
	}

  public function removeRequest1(){
    $key = $this->ses->userdata("keyes");

    $secret = $this->checkDB("property_lanlord", "landlord_session_id", $key);
    $bool = $this->checkDB1("property_lanlord", "landlord_session_id", $key);

    if($bool == true){

      $bool1 = $this->delete("property_pending_request", "email", $secret['landlord_email']);

      if($bool1 == true){
        return true;
      }else{
        return false;
      }

    }else{
      return false;
    }
  }

    public function removeRequest2(){
    $key = $this->ses->userdata("keyess");

    $secret = $this->checkDB("property_tenant", "tenant_session_id", $key);
    $bool = $this->checkDB1("property_tenant", "tenant_session_id", $key);

    if($bool == true){

      $bool1 = $this->delete("property_pending_request", "email", $secret['tenant_email']);

      if($bool1 == true){
        return true;
      }else{
        return false;
      }

    }else{
      return false;
    }
  }

	public function requestpost($name,$title,$email,$status){
		$insertUser = $this->db->query("Insert into `property_pending_request` (`Name`,`Title`,`email`,`status`) values ('$name','$title','$email','$status')");
		if($insertUser == true){
			return true;

		}else{
			return false;
		}
	}

	public function Login($email, $password){

		$status = 0;
		$error = 1;
		$error2 = 2;
		$success = 4;
		$result1 = $this->checkDB1("system_user","manager_email","$email");
		$result = $this->checkDB("system_user","manager_email","$email");


		if($result1 == true){
			$pass = $result['manager_password'];
			if(password_verify($password,$pass)){
				$this->ses->set_userdata("user_session",$result['managersession']);
				$this->killSession("hash");
				$this->killSession("key");
        $this->killSession("hashes");
        $this->killSession("keyes");
        $this->killSession("hashess");
        $this->killSession("keyess");
				$status = $success;
				return $status;
			}else{
				$status = $error;
				return $status;
			}
		}else{
			$status = $error2;
			return $status;
		}
	}

  public function triggerOnline($table, $column,$data,$column2,$data2){
    $upd = $this->db->query("Update `$table` set `$column`='$data' where `$column2`='$data2'");
    if($upd){
      return true;
    }else{
      return false;
    }
  }

	public function checkDB($table, $column, $data){
		$result = $this->db->query("Select * from `$table` where `$column`='$data'");
		return $result->row_array();
	}

	public function checkDB1($table, $column, $data){
		$result = $this->db->query("Select * from `$table` where `$column`='$data'");
		if($result->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($table, $column, $data){
		$result = $this->db->query("Delete from `$table` where `$column`='$data'");
		if($result == true){
			return true;
		}
		else{
			return false;
		}
	}

	public function sanitizeInput($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    $input = $this->db->escape_str($input);
    return $input;
  }

  public function isPasswordValid($password){
  	if(!ctype_alnum($password) || strlen($password) < 8){
  		return false;
  	}else{
  		return true;
  	}
  }

  public function isEmailValid($email){
  	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
  		return true;
  	}else{
  		return false;
  	}
  }

 public function is_connected()
{
	$is_conn = false;
    $connected = @fsockopen("www.google.com", 80);
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}


public function sendEmailToUser($email){
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
    '_replyto_flag'=>'TRUE',
    'charset'   => 'utf-8'
    );
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");
    $link = $this->hashLink($email,"activation");
    $result = $this->checkDB("system_user", "manager_email",$email);
    $hash = $result['user_hash'];
    if($link == false){
      return "Email Falied To send";
    }
		$this->email->from('freshcode9@gmail.com', 'Phynix Support');
		$this->email->to($email);
		$this->email->reply_to("do_not_reply@gmail.com");
		$this->email->subject('Phynix Inc Account Activation');
		// $this->email->message('<strong>Please click the link to activate your account:</strong> <a href="'.$link.'">Activate Account</a><br/><br/><strong>Your Activation Code is: '.$hash.'</strong>');
		 $this->email->message('<style>*{padding:0px;}</style><div style="background-color: #263238; margin:2em; display:block!important; display:-webkit-flex;
display:-ms-flexbox;display:block;  justify-content: center!important; width:300px!important; height:auto!important; flex-flow:row wrap; "><h3 style="background-color: #E65100!important; display:flex!important; padding: 1em; justify-content:center!important; color: white!important; width:270px!important; align-items:center!important;">Activate Account</h3><p style="display:flex; padding:1em; justify-content: center; color: white;width:300px!important; text-align: center;">Please click the button to activate your account </p><a href="'.$link.'" style="color:white!important; font-style: none; width:300px!important; display:flex; padding: 1em; justify-content: center; "><button  style="background-color: #E65100; display:flex; padding: 1em; cursor:pointer;justify-content: center; color: white; width:auto; align-items:center; border-radius:5px; outline:none; border:none;box-shadow: 0px 0px 10px rgba(19,19,19,0.5); font-weight:bolder;">
	Activate Account</button></a></div>');
		//<br/><br/><strong>Your Activation Code is: '.$hash.'
		//$col = ;

		 if($this->is_connected() == true){
		 	if($this->email->send()){
			return true;
			//"https://www.".$this->emailLink($email,"@");
		}else{
			return false;
      show_error($this->email->print_debugger());
			//"failed to send activation to -> (".$email.")";
		}
		 }else{
		 	return false;
		 }

}

public function sendEmailToOwner($email){
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
    '_replyto_flag'=>'TRUE',
    'charset'   => 'utf-8'
    );
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");
    $link = $this->hashLink1($email,"landactivation");
    $result = $this->checkDB("property_lanlord", "landlord_email",$email);
    $hash = $result['secret_hash'];
    if($link == false){
      return "Email Falied To send";
    }
    $this->email->from('freshcode9@gmail.com', 'Phynix Inc Support');
    $this->email->to($email);
    $this->email->reply_to("do_not_reply@gmail.com");
    $this->email->subject('Phynix Inc Landlord Account Activation');
    // $this->email->message('<strong>Please click the link to activate your account:</strong> <a href="'.$link.'">Activate Account</a><br/><br/><strong>Your Activation Code is: '.$hash.'</strong>');
     $this->email->message('<style>*{padding:0px;}</style><div style="background-color: #263238; margin:2em; display:block!important; display:-webkit-flex;
display:-ms-flexbox;display:block;  justify-content: center!important; width:300px!important; height:auto!important; flex-flow:row wrap; "><h3 style="background-color: #E65100!important; display:flex!important; padding: 1em; justify-content:center!important; color: white!important; width:270px!important; align-items:center!important;">Activate Account</h3><p style="display:flex; padding:1em; justify-content: center; color: white;width:300px!important; text-align: center;">Please click the button to activate your account </p><a href="'.$link.'" style="color:white!important; font-style: none; width:300px!important; display:flex; padding: 1em; justify-content: center; "><button  style="background-color: #E65100; display:flex; padding: 1em; cursor:pointer;justify-content: center; color: white; width:auto; align-items:center; border-radius:5px; outline:none; border:none;box-shadow: 0px 0px 10px rgba(19,19,19,0.5); font-weight:bolder;">
  Activate Account</button></a></div>');
    //<br/><br/><strong>Your Activation Code is: '.$hash.'
    //$col = ;

     if($this->is_connected() == true){
      if($this->email->send()){
      return true;
      //"https://www.".$this->emailLink($email,"@");
    }else{
      return false;
      show_error($this->email->print_debugger());
      //"failed to send activation to -> (".$email.")";
    }
     }else{
      return false;
     }

}

public function sendEmailToTenant($email){
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
    '_replyto_flag'=>'TRUE',
    'charset'   => 'utf-8'
    );
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");
    $link = $this->hashLink2($email,"tenantactivation");
    $result = $this->checkDB("property_tenant", "tenant_email",$email);
    $hash = $result['tenant_secret_hash'];
    if($link == false){
      return "Email Falied To send";
    }
    $this->email->from('freshcode9@gmail.com', 'Phynix Inc Support');
    $this->email->to($email);
    $this->email->reply_to("do_not_reply@gmail.com");
    $this->email->subject('Phynix Inc Tenant Account Activation');
    // $this->email->message('<strong>Please click the link to activate your account:</strong> <a href="'.$link.'">Activate Account</a><br/><br/><strong>Your Activation Code is: '.$hash.'</strong>');
     $this->email->message('<style>*{padding:0px;}</style><div style="background-color: #263238; margin:2em; display:block!important; display:-webkit-flex;
display:-ms-flexbox;display:block;  justify-content: center!important; width:300px!important; height:auto!important; flex-flow:row wrap; "><h3 style="background-color: #E65100!important; display:flex!important; padding: 1em; justify-content:center!important; color: white!important; width:270px!important; align-items:center!important;">Activate Account</h3><p style="display:flex; padding:1em; justify-content: center; color: white;width:300px!important; text-align: center;">Please click the button to activate your account </p><a href="'.$link.'" style="color:white!important; font-style: none; width:300px!important; display:flex; padding: 1em; justify-content: center; "><button  style="background-color: #E65100; display:flex; padding: 1em; cursor:pointer;justify-content: center; color: white; width:auto; align-items:center; border-radius:5px; outline:none; border:none;box-shadow: 0px 0px 10px rgba(19,19,19,0.5); font-weight:bolder;">
  Activate Account</button></a></div>');
    //<br/><br/><strong>Your Activation Code is: '.$hash.'
    //$col = ;

     if($this->is_connected() == true){
      if($this->email->send()){
      return true;
      //"https://www.".$this->emailLink($email,"@");
    }else{
      return false;
      show_error($this->email->print_debugger());
      //"failed to send activation to -> (".$email.")";
    }
     }else{
      return false;
     }

}

public function sendResetEmailToUser($email){
  $config = array(
  'protocol'  => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'freshcode9@gmail.com',
  'smtp_pass' => 'Love123456789',
  'mailtype'  => 'html',
  'charset'   => 'utf-8'
  );
  $this->eml->initialize($config);
  $this->eml->set_mailtype("html");
  $this->eml->set_newline("\r\n");
  $link = $this->hashLink($email,"resetword");
  //$result = $this->returnResult($email);
  //$hash = $result['thy_user_temp_hash'];
  if($link == false){
    return "Email Falied To send";
  }
  $this->eml->from('freshcode9@gmail.com', 'Thy Support');
  $this->eml->to($email);
  $this->eml->subject('Reset Password');
  $this->eml->message('<strong>Please click the link to reset your password:</strong> <a href="'.$link.'">Reset Password</a>');
  $this->eml->send();

  return "https://www.".$this->emailLink($email,"@");

}



public function hashLink($email,$opt){
    $result = $this->checkDB("system_user", "manager_email",$email);
    if($this->doesHashExist($result['user_hash']) == true){
      $hash = $result['user_hash'];
      $sessionID = $result['managersession'];
      if($opt == "actView1"){
        $link = site_url("/"."Pages/".$opt."?user=".$email."&uniquekey=".$sessionID."&secretHash=".$hash);
        return $link;
      }elseif($opt == "landactivation"){
        $link = site_url("/"."Pages/".$opt);
        return $link;
      }else{
        $link = "http://".$_SERVER['SERVER_NAME']."/app/"."Pages/".$opt."?user=".$email."&uniquekey=".$sessionID."&secretHash=".$hash."&error=no errors found proceed";
        return $link;
      }

    }else{
      return false;
    }

  }

  public function hashLink1($email,$opt){
    $result = $this->checkDB("property_lanlord", "landlord_email",$email);
    if($this->doesHashExist1($result['secret_hash']) == true){
      $hash = $result['secret_hash'];
      $sessionID = $result['landlord_session_id'];

      if($opt == "landactivation"){

        $link = "http://".$_SERVER['SERVER_NAME']."/app/"."Pages/".$opt."?user=".$email."&uniquekey=".$sessionID."&secretHash=".$hash."&error=no errors found proceed";
        return $link;
      }
    }else{
      return false;
    }

  }


    public function hashLink2($email,$opt){
    $result = $this->checkDB("property_tenant", "tenant_email",$email);
    if($this->doesHashExist2($result['tenant_secret_hash']) == true){
      $hash = $result['tenant_secret_hash'];
      $sessionID = $result['tenant_session_id'];

      if($opt == "tenantactivation"){

        $link = "http://".$_SERVER['SERVER_NAME']."/app/"."Pages/".$opt."?user=".$email."&uniquekey=".$sessionID."&secretHash=".$hash."&error=no errors found proceed";
        return $link;
      }
    }else{
      return false;
    }

  }

  public function doesHashExist($hash){
    $hashQuery = $this->db->query("Select * from `system_user` where `user_hash`='$hash'");
    if($hashQuery->num_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

  public function doesHashExist1($hash){
    $hashQuery = $this->db->query("Select * from `property_lanlord` where `secret_hash`='$hash'");
    if($hashQuery->num_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

 public function doesHashExist2($hash){
    $hashQuery = $this->db->query("Select * from `property_tenant` where `tenant_secret_hash`='$hash'");
    if($hashQuery->num_rows() > 0){
      return true;
    }else{
      return false;
    }
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

public function emailLink($word, $section){
  $pos = strpos($word, $section);
  $new = substr($word,$pos+1,strlen($word) - 1);
  return $new;
}

//creating manager


public function createManager($startfee, $endfee, $gct, $late){

  $today = date("y-m-d");
  $seskey = $this->ses->userdata('user_session');
  $insertUser = $this->db->query("Insert into `property_manager` (`management_start_fee`,`management_end_fee`,`management_late_fee`,`management_gct`,`date_added`,`system_user`) values ('$startfee','$endfee','$late','$gct','$today','$seskey') ");

    if($insertUser == true){
      return true;

    }else{
      return false;
    }

}


public function createProperty($landlordID, $rental, $street, $city, $state, $country, $zip,$mfee, $bbf,$pp){
//needs working on
  $today = date("y-m-d");
  $hashkey =  $this->returnRandomString(100);
  $seskey = $this->ses->userdata('user_session');
  $insertUser = $this->db->query("Insert into `landlord_property` (`rental_price`,`property_street_address`,`property_city`,`property_state`,`property_country`,`property_zip`,`system_user`,`date_created`,`property_status`,`landlordID`,`propertyhash`,`multiple_units`,`property_management_fee_tax_percent`,`furnished`) values ('$rental','$street','$city','$state','$country','$zip','$seskey','$today','open','$landlordID', '$hashkey', '0','$mfee','$pp') ");

    //please remeber to check if id already exist to fix that later if it poses a problem

  $balancequery = $this->db->query("Insert into `property_balance_account` (`pid`,`balance`,`date_added` ) values('$hashkey','$bbf','$today') ");

    if($insertUser == true && $balancequery){
      return true;

    }else{
      return false;
    }

}

public function createProperty1($landlordID, $rental, $street, $city, $state, $country, $zip, $units){

  $today = date("y-m-d");
  $hashkey =  $this->returnRandomString(100);
  $seskey = $this->ses->userdata('user_session');
  $insertUser = $this->db->query("Insert into `landlord_property` (`rental_price`,`property_street_address`,`property_city`,`property_state`,`property_country`,`property_zip`,`system_user`,`date_created`,`property_status`,`landlordID`,`propertyhash`,`multiple_units`,`property_management_fee_tax_percent`,`total_units`) values ('$rental','$street','$city','$state','$country','$zip','$seskey','$today','open','$landlordID', '$hashkey', '1','0','$units') ");

    //please remeber to check if id already exist to fix that later if it poses a problem

  // $balancequery = $this->db->query("Insert into `landlord_balance_account` (`pid`,`balance`,`date_added` ) values('$hashkey','$bbf','$today') ");

    if($insertUser == true){
      return $hashkey;

    }else{
      return false;
    }

}



public function createApartments($unitname, $rent, $pid, $hash,$mfee, $bbf,$pp){
$today = date("y-m-d");
  $hashkey =  $this->returnRandomString(100);
  $seskey = $this->ses->userdata('user_session');
  $insertUser = $this->db->query("Insert into `property_apartments` (`pid`,`aptname`,`rental_fee`,`date_added`,`apt_status`,`apt_hash`,`property_management_fee_tax_percent`,`furnished`) values ('$pid','$unitname','$rent','$today','open', '$hash','$mfee','$pp') ");

  //please remeber to check if id already exist to fix that later if it poses a problem

  $balancequery = $this->db->query("Insert into `property_balance_account` (`pid`,`balance`,`date_added` ) values('$hashkey','$bbf','$today') ");

    if($insertUser == true && $balancequery){
      return true;

    }else{
      return false;
    }
}


public function createLandlord($fname, $lname, $email, $mobile, $saddress, $city, $state, $country, $zip, $gct){

  $skey =  $this->returnRandomString(70);
  $hashkey =  $this->returnRandomString(100);

  $today = date("y-m-d");
  $seskey = $this->ses->userdata('user_session');
  $insertUser = $this->db->query("Insert into `property_lanlord` (`landlord_fname`,`landlord_lname`,`landlord_email`,`landlord_mobile`,`system_user`,`landlord_session_id`,`lanlord_street_address`,`landlord_city`,`landlord_state`,`landloard_zip`,`landlord_country`,`secret_hash`,`landlord_account_status`,`date_joined`,`gct`)
   values ('$fname','$lname','$email','$mobile','$seskey','$skey','$saddress','$city','$state','$zip','$country','$hashkey','0','$today','$gct') ");

  //please remeber to check if id already exist to fix that later if it poses a problem


    if($insertUser == true){
      return true;

    }else{
      return false;
    }

}

public function createTenant($fname, $lname, $email, $property, $mobile){
  $skey =  $this->returnRandomString(100);
  $hashkey =  $this->returnRandomString(120);
  $this->ses->set_userdata("ten",$skey);
  $today = date("y-m-d");
  $seskey = $this->ses->userdata('user_session');
  $result = $this->checkDB("landlord_property","propertyID",$property);
  if($result != false){
    //$result = $this->checkDB("landlord_property","propertyID",$property);
    $insertUser = $this->db->query("Insert into `property_tenant` (`tenant_fname`,`tenent_lname`,`tenant_email`,`tenant_mobile`,`tenant_session_id`,`monthly_fee`,`tenant_secret_hash`,`tenant_status`,`date_joined`,`propertyID`,`tenant_street_address`,`tenant_city`,`tenant_state`,`tenant_country`,`tenant_zip`,`system_user`,`landlordID`)
   values ('$fname','$lname','$email','$mobile','$skey','{$result['rental_price']}','$hashkey','0','$today','$property','{$result['property_street_address']}','{$result['property_city']}','{$result['property_state']}','{$result['property_country']}','{$result['property_zip']}','$seskey','{$result['landlordID']}') ");

    if($insertUser == true){
      return true;

    }else{
      return false;
    }
  }else{
    return false;
  }

}

public function createTenant2($fname, $lname, $email, $property, $mobile){
  $skey =  $this->returnRandomString(100);
  $hashkey =  $this->returnRandomString(120);
  $this->ses->set_userdata("ten",$skey);
  $today = date("y-m-d");
  $seskey = $this->ses->userdata('user_session');
  $results = $this->checkDB("property_apartments","apt_hash",$property);
  if($results != false){
    //$results = $this->checkDB("property_apartments","apt_hash",$property);
    $result =  $this->checkDB("landlord_property","propertyID",$results['pid']);

		$street = $result['property_street_address'];
		$city = $result['property_city'];
		$state = $result['property_state'];
		$country = $result['property_country'];
		$zip = $result['property_zip'];
		$lid = $result['landlordID'];
		$aptname = $results['aptname'];
    $insertUser = $this->db->query("Insert into `property_tenant` (`tenant_fname`,`tenent_lname`,`tenant_email`,`tenant_mobile`,`tenant_session_id`,`monthly_fee`,`tenant_secret_hash`,`tenant_status`,`date_joined`,`propertyID`,`tenant_street_address`,`tenant_city`,`tenant_state`,`tenant_country`,`tenant_zip`,`system_user`,`landlordID`,`unit`)
   values ('$fname','$lname','$email','$mobile','$skey','{$results['rental_fee']}','$hashkey','0','$today','$property','$street','$city','$state','$country','$zip','$seskey','$lid','$aptname') ");

    if($insertUser == true){
      return true;

    }else{
      return false;
    }
  }else{
    return false;
  }

}

public function updateProperty($id){
  $bool = $this->checkDB1("landlord_property","propertyID",$id);
   if($bool == true){
    $insertUser = $this->db->query("Update `landlord_property` set `property_status`='rented' where `propertyID`='$id'");
    if($insertUser == true){
      return true;

    }else{
      return false;
    }
  }else{
    return false;
  }
}

public function updateApartment($id){
  $bool = $this->checkDB1("property_apartments","apt_hash",$id);
   if($bool == true){
    $insertUser = $this->db->query("Update `property_apartments` set `apt_status`='rented' where `apt_hash`='$id'");
    if($insertUser == true){
      return true;

    }else{
      return false;
    }
  }else{
    return false;
  }
}

public function updateTenantLease($id, $lease){
  $upd = $this->db->query("Update `property_tenant` set `lease_id`='$lease' where `property_tenantID`='$id'");
  if($upd == true){
    return true;
  }else{
    return false;
  }
}

public function addLease($start, $end, $tenant){


  $hashkey =  $this->returnRandomString(5);

  $res = $this->checkDB("property_tenant","property_tenantID",$tenant);

  if(!$res){
    return false;
  }else{
     $add = $this->db->query("Insert into `property_lease_info` (`lease_secret_key`,`lease_start_date`,`lease_end_date`,`lease_payment_agreement`,`tenantID`) values ('$hashkey','$start','$end','{$res['monthly_fee']}','$tenant')");

     if($add == true){
        return true;
     }else{
      return false;
     }
  }

}

public function addFirstRent(){

}


public function createWorkOrder($tenant, $worker, $problem, $price){

  $workkey =  $this->returnRandomString(4);
  $zero = 0;
  $today = date("y-m-d");
  $seskey = $this->ses->userdata('user_session');
  //status 0 = pending start status 1 = pending finish status 2 = pending payment payed  = 0 status 3 complete =  1 status 4 = user request

  $workOrder = $this->db->query("Insert into `property_work_order` (`person_assigned`,`status`,`amount`,`tenantID`,`problem_description`,`work_key`,`date_issued`,`system_user`) values ('$worker','0','$price','$tenant','$problem','$workkey','$today','$seskey')");

  if($workOrder == true){
     return true;
     }else{
      return false;
     }

}

public function updateWorkStatus($status, $key, $date){

  if($status == 1){
    $v = $this->db->query("Update `property_work_order` set `status`='$status',`date_started`='$date' where `work_key`='$key'");
//$this->checkDB("property_work_order","work_key",$key);
  if($v == true){
    return true;
  }else{
    return false;
  }
}else if($status == 2){
  $v = $this->db->query("Update `property_work_order` set `status`='$status',`date_completed`='$date' where `work_key`='$key'");
//$this->checkDB("property_work_order","work_key",$key);
  if($v == true){
    return true;
  }else{
    return false;
  }
}else if($status == 3){
  $v = $this->db->query("Update `property_work_order` set `status`='$status',`date_payed`='$date',`payed`=1 where `work_key`='$key'");
//$this->checkDB("property_work_order","work_key",$key);
  if($v == true){
    return true;
  }else{
    return false;
  }
}



}


public function addTenantBalance($tid, $balance){
  $today = date("y-m-d");
  $addBalance = $this->db->query("Insert into `tenant_balance_account` (`tid`,`balance`,`date_added`) values ('$tid','$balance','$today')");

  if($addBalance == true){
     return true;
     }else{
      return false;
     }
}

public function addTenantDeposit($tid, $balance, $pid,$res){
  $today = date("y-m-d");
  $addDeposit = $this->db->query("Insert into `property_deposit` (`amount`,`pid`,`date_added`,`tid`,`whores`) values ('$balance','$pid','$today','$tid','$res')");

  if($addDeposit == true){
     return true;
     }else{
      return false;
     }
}

public function addPastDue($amt,$date,$key){

  $addDeposit = $this->db->query("Insert into `tenant_past_due` (`tid`,`past_due_amt`,`date`,`payed_status`) values ('$key','$amt','$date','0')");

  if($addDeposit == true){
     $this->killSession('ten');
     return true;
     }else{
      $this->killSession('ten');
      return false;
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
	$select  = $this->db->query("Select * from `monthly_bills` where `sent_status`=0");
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
		'_replyto_flag'=>'TRUE',
		'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
	$link = site_url("/Pages/bill?unique=".$billHash);
	if($link == false){
		return "Email Falied To send";
	}
	$this->email->from('freshcode9@gmail.com', 'Phynix Inc');
	$this->email->to($email);
	$this->email->subject('Monthly Bill from - Phynix Inc');
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

}

?>
