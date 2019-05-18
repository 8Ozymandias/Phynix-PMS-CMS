<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

	$this->load->model('Authentication','auth02');

	}

	public function landlordpanel(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/createlandlord",$result);
	}

	public function managerpanel(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/createmanager",$result);
	}

	public function propertypanel(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/createproperty",$result);
	}

	public function tenantpanel(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/createtenant",$result);
	}

	public function userpanel(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/createuser",$result);
	}

	public function documents(){
		$this->load->library('Pdf');
		$this->load->view("pdf/pdfview");
	}
	public function workorderpanel(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/createworkorder",$result);
	}
	public function accountsetting(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/account/accountsetting",$result);
	}
	public function themes(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/account/themesetting",$result);
	}
	public function dashboard(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/mainpanel",$result);
	}
	public function workorders(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/tools/viewworkorder",$result);
	}
	public function reports(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/tools/generatereports",$result);
	}
	public function collections(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/tools/rentcollector",$result);
		// $this->load->view("admin/reports/invoice",$result);
	}
	public function complaints(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/tools/viewcomplaints",$result);
	}
	public function leasepanel(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/createlease",$result);
	}
	public function landlordlogin(){
		$this->load->view("users/landlord/landlordlogin");
	}

	public function tenantlogin(){
		$this->load->view("users/tenants/tenantlogin");
	}

	public function terms(){
		$this->load->view('terms');
	}

	public function privacy(){
		$this->load->view('privacy');
	}

	public function activation(){
		$this->load->view('activation/activation');
	}

	public function landactivation(){
		$this->load->view('activation/landactivation');
	}

	public function tenantactivation(){
		$this->load->view('activation/tenantactivation');
	}

	public function uploadfiles(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/frontdesk/uploadfiles",$result);
	}

	public function bill(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/reports/monthlybill",$result);
	}

	public function invoice(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/reports/invoice",$result);
	}


	public function receipt(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/reports/receipt",$result);
	}

	public function statement(){
		$session = $this->ses->userdata("user_session");
		$result['data'] = $this->auth02->checkDB("system_user","managersession","$session");
		$this->load->view("admin/reports/statement",$result);
	}

	  public function logout(){
    $array_items = array('user_session');
    if($this->auth02->triggerOnline("system_user","online","0","managersession","{$this->ses->userdata('user_session')}") ){
    	$this->ses->unset_userdata($array_items);

    	redirect(site_url("/?error=Thanks For Using Good Bye"));
    }else{
    	echo "Falied to logout";
    }


  }
}
?>
