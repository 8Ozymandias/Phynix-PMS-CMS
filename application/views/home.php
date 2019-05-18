<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$error = "";
if(isset($_GET['error'])){
	$error = $_GET['error'];
}else{
	$error = "no errors proceed";
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo(base_url('assets/icon1.png'));?>" />
	<meta charset="utf-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="<?php echo base_url('css/home.css'); ?>" type="text/css" />
	<script type="text/javascript" src="<?php echo(base_url('js/jquery-3.1.0.js'));?>"></script>
	<script type="text/javascript" src="<?php echo(base_url('js/jquery-ui.js'));?>"></script>
</head>
<body>

	<section class="home_section">

		<article class="login_box">
			
			<h1>Management Portal</h1>

			<input type="email" placeholder="email" class="email"/>
			<input type="password" placeholder="password" class="email"/>
			<button id="login_btn" onclick="Login();">Login</button>

		</article>
		<p class="result"><?php echo '* '.$error.' *'; ?></p>
	</section>
</body>
<!-- <div style="background-color: #263238; margin:2em; display:flex!important; display:-webkit-flex;
display:-ms-flexbox;display:flex;  justify-content: center!important; width:300px!important; height:auto!important; flex-flow:row wrap!important; "><h3 style="background-color: #E65100!important; display:flex!important; padding: 1em; justify-content:center!important; color: white!important; width:300px!important; align-items:center!important;">Activate Account</h3><p style="display:flex; padding:1em; justify-content: center; color: white;width:300px!important; text-align: center;">Please click the button to activate your account </p><a href="'.$link.'" style="color:white!important; font-style: none; width:300px!important; display:flex; padding: 1em; justify-content: center; "><button  style="background-color: #E65100; display:flex; padding: 1em; cursor:pointer;justify-content: center; color: white; width:auto; align-items:center; border-radius:5px; outline:none; border:none;box-shadow: 0px 0px 10px rgba(19,19,19,0.5); font-weight:bolder;">
	Activate Account</button></a></div> -->

</html>

<script type="text/javascript">
	
	function Login(){
		let email = getText("email",0);
		let password = getText("email",1);

		if(email === "" || password === ""){
			$(".result").html("Please Fill out all feilds");
		}else{
			if(email.length < 6){
				$(".result").html("your email address is too short");
			}

			if(password.length < 8 ){
				$(".result").html("The minimum password length is 8");
			}

			if(password.length >=8 && email.length >= 6){
				$(".result").html("<img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/>");
				var url = "<?php echo(site_url('Home/LogUserIn'));?>";
				setTimeout(function(){
					$.post(url,{email:email, password:password},function(result){
					$(".result").html(result);
				});
				},2000);
				
			}
		}
	}

	function getText(string,identify){
		let r = p(string);
		let word = r[identify].value;
		return word;
	}

	function p(string){
		var r = document.getElementById(string);
		return r;
	}

	function p(string){
		var r = document.getElementsByClassName(string);
		return r;
	}

</script>
