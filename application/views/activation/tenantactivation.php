<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	if(!isset($_GET['secretHash']) || !isset($_GET['uniquekey']) || !isset($_GET['error'])){
		redirect(site_url("Home")."?error=Error:page not found, link expired");
	}else{

		if(strlen($_GET['secretHash']) < 120 || strlen($_GET['uniquekey']) < 100){
			redirect(site_url("Home")."?error=Error:invalid url");
		}else{

			if($this->ses->has_userdata("user_session")){
				redirect(site_url("Home")."?error=*Please logout to activate account");
			}else{
				 $this->load->helper('loads');
				$bool = checkSession3("property_tenant",'tenant_session_id',$_GET['uniquekey']);
				$cool = checkSession4("property_tenant",'tenant_session_id',$_GET['uniquekey']);
				$error = $_GET['error'];
				if($bool == false || $cool == false){
					redirect(site_url("Home")."?error=Error:page not found, link expired");
				}else{

					if(($cool['tenant_secret_hash'] == "" && $cool['tenant_password'] != "") || $cool['tenant_password'] != "" || $cool['tenant_secret_hash'] == ""){
						redirect(site_url("Home")."?error=Error:page not found, link expired");
					}else{



					$username = $cool['tenant_fname'].' '.$cool['tenent_lname'];
					$date = $cool['date_joined'];

					$hash = $_GET['secretHash'];
					$key = $_GET['uniquekey'];

					$arrySes = array("hashess"=>"{$hash}","keyess"=>"{$key}");

					$this->ses->set_userdata($arrySes);
		
?>
<!DOCTYPE html>

<html>
  <head>
    <title>Activation</title>
    <meta charset="utf-8"/>
    <meta description="" text="" name=""/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo(base_url('assets/icon1.png'));?>" />
	<script type="text/javascript" src="<?php echo(base_url('js/jquery-3.1.0.js'));?>"></script>
	<script type="text/javascript" src="<?php echo(base_url('js/jquery-ui.js'));?>"></script>
    <style>
      *{
        padding:0px;
        margin:0px;
        list-style: none;
      }

      body{
        display: flex;
        justify-content: center;
        flex-flow: row wrap;
        background-color: #F5F5F5;
      }

      section{
        width: 40%;
        display: flex;
        flex-flow: row wrap;
        height: auto;
        font-family: "Ebrima", "Calibri", "Times New Roman", serif;
        justify-content: center;
        margin-top: 1.5%;

      }


      .home_login{
        display:flex;
        flex-flow: row wrap;
        width: 100%;
        justify-content: center;
        border: 1px solid #fff;
        background-color:  #263238;
        color:#E65100!important;
        padding: 2em;
        margin: 2em;
        border-radius: 10px;
        box-shadow: 0px 0px 8px rgba(19,19,19,0.5);
      }

      .home_login div{
        display:flex;
        flex-flow: row wrap;
        width: 90%;
        border: 0.5px solid #E65100;;
        margin: 2em;
        padding: 2em;
        justify-content: center;
        border-radius: 5px;
        box-shadow: inset 0px 0px 10px rgba(0,0,0,0.9);
      }
      .home_login label{
        display:flex;
        flex-flow: row wrap;
        width: 60%;
        padding:0.5em;
        margin: 0.5em;
        border-bottom: 0.5px solid #B0BEC5;
        border-radius: 5px;
        box-shadow: inset 0px 0px 4px rgba(0,0,0,0.9);
      }

      #result{
        width: 100%;
        font-style: italic;
        font-size: 12px;
        text-align: center;
        /*list-style: lower-latin!important;*/
        /* display: none; */
        color: #78909C!important;
      }

      label span{
        width: auto;
        font-style: italic;
        margin-top: 4px;
        margin-left: 5px;
        height: 100%;
        font-size: 13px;
        color: #78909C!important;
      }

      .home_h3{
        width: 100%;
        font-size: 1.5em;
        text-align:center;
        margin-bottom: 0.5em;
        text-shadow: 0px 0px 5px rgba(0,0,0,0.9);
      }
      .home_other_opt{
        width: 100%;
        display: flex;
        justify-content: center;
      }

      .home_other_opt li {
        padding: 0.5em;
        cursor: pointer;
        text-shadow: 0px 0px 5px rgba(0,0,0,0.9);
      }

      .home_other_opt li:hover{
        color:  #fff;
        transition:color 0.2s;
      }

      input{
        border-bottom: 1px solid rgba(0,0,0,.2);
  	border-top: none;
  	border-left: none;
  	border-right: none;
  	background-color: rgba(0, 0, 0, 0.1);
  	color: #E65100;
  	width: 100%;
  	padding: 1em;
  	margin: 1em;
  	box-shadow: inset 0px 0px 5px rgba(0,0,0,0.9);
  	outline-color:#E65100;
      }
      input:focus {
        outline: none;
      }

      #login{
        background-color:#E65100;
        width: 30%;
        color: white!important;
        cursor: pointer;
        box-shadow: 0px 0px 3px rgba(0,0,0,0.9);
        font-weight: bold;
        border-radius: 5px;
        outline: none;
      }

      #login:hover{
        background-color:  #FB8C00;
        transition: background-color 0.2s;
      }

    </style>
  </head>
    <body>
    
      <section class=".home_section">
        <article class="home_login" id="hideMelog">
          <h3 class="home_h3">Account Activation</h3>
          <label>Name: <span><?php echo $username; ?></span></label> <label>Date Registered: <span><?php echo $date; ?></span></label>
          <div class="home_login_border">
            <input type="password" class="password" placeholder="New Password" />
            <input type="password" class="password" placeholder="Confirm Password" />
            <input type="button" value="Activate" id="login" onclick="posts();" />
            <li id="result"><?php echo $error;?></li>
          </div>
        </article>
      </section>
    </body>

    <script>
    	
    	function posts(){

    	var pass = $(".password").eq(0).val();
    	var conp = $(".password").eq(1).val();
    	$("#result").html("<img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/>");
    	if(pass !== conp){
    		setTimeout(function(){
    			$("#result").html("Mismatch password");
    		},2000);
    	}else if(pass === "" || conp === ""){
    		setTimeout(function(){
    			$("#result").html("please fill out all feilds");
    		},2000);
    	}else if(pass.length < 8 || conp.length < 8){
    		setTimeout(function(){
    			$("#result").html("password must be 8 characters in length and be must alpha numeric");
    		},2000);
    	}else{
    		$.post("<?php echo site_url('Home/UdpRegUser2'); ?>",{pass:pass,conp:conp},function(result){
    			setTimeout(function(){
    			$("#result").html(result);
    		},1);
    		});
    	}
	}
    </script>


<?php } }}}}?>