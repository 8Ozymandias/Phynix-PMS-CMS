<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	if(!($this->ses->has_userdata("user_session"))){
		redirect(site_url("Home")."?error=please login to continue");
	}else{
?>

<!Doctype html>
<html>
<head>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo(base_url('assets/icon1.png'));?>" />
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>" type="text/css" />
	<script type="text/javascript" src="<?php echo(base_url('js/jquery-3.1.0.js'));?>"></script>
	<script type="text/javascript" src="<?php echo(base_url('js/jquery-ui.js'));?>"></script>
	<title>Admin Panel</title>
	<style type="text/css">
		footer{
	width: 100%;
	justify-content: flex-start!important;
	color:transparent;
	font-weight: bolder;
	font-style: italic;
	text-shadow: 0px 0px 0.5px rgba(19,19,19,0.2);
	font-size: 10px;
}
.properties{
	width: 50%!important;
	height:400px!important;
	margin: 2em!important;
	border-radius: 10px;
	box-shadow: inset 0px 0px 10px rgba(19,19,19,0.6);

}
.properties table{
	width: auto!important;
	height:300px!important;
}

.account_summary{
	width: 50%!important;
	margin: 2em!important;
	border-radius: 10px;
	box-shadow: inset 0px 0px 10px rgba(19,19,19,0.6);
}

.account_summary article{
	width: 70%;
	display: flex;
	/*padding: 1em!important;*/
	flex-flow: row wrap!important;
	justify-content: center;
	margin-top: 1em!important;
	margin-left: 3em!important;
	margin-right: 3em!important;
	background-color: #263238;
}

.account_summary article input:not(#subscribeNews), .account_summary article select{
	border-bottom: 1px solid rgba(0,0,0,.2);
  	border-top: none;
  	border-left: none;
  	border-right: none;
  	background-color: rgba(0, 0, 0, 0.1);
  	color: #E65100;
  	width: 40%;
  	padding: 0.5em;
  	margin: 1em;
  	box-shadow: inset 0px 0px 5px rgba(0,0,0,0.9);
  	outline-color:#E65100;

}
.account_summary article input::placeholder{
	font-style: italic;
	color: #E65100;

}

.account_summary article button:hover{
	background-color:  #FB8C00;
        transition: background-color 0.4s;
        cursor: pointer;
}
.account_summary article button{
	width: 50%;
	padding: 0.5em!important;
	margin: 1em!important;
	border-radius: 5px;
	box-shadow: 0px 0px 10px rgba(19,19,19,0.6);
	outline: none;
	border: none;
	background-color: #E65100;
	color: white;
	font-weight: bolder;
}
.result{
	width: 67.4%!important;
	margin-bottom: 2em!important;
}
		.saved{
        display: flex;
        color: white;
        background-color: #81C784;
        padding: 1em;
        justify-content: center;
        border-radius: 10px;
        position: fixed;
        /*border: 2px solid #4CAF50;*/
        font-weight: bolder;
        box-shadow: 0px 0px 10px rgba(19, 19, 19, 0.5);
        top: 90%;
        left: 80%;
        z-index: 10000;
      }

      .fail{
        display: flex;
        color: white;
        background-color: #e57373;
        padding: 1em;
        justify-content: center;
        border-radius: 10px;
         position: fixed;
        font-weight: bolder;
        box-shadow: 0px 0px 10px rgba(19, 19, 19, 0.5);
        top: 90%;
        left: 80%;
        z-index: 10000;
      } 

      .ref{
      	cursor: pointer;
      }

      .to{
      	padding-top: 1em;
      	padding-bottom: 1em;
      	color: white;
      	padding-left: 0px;
      	padding-right: 0px;
      	font-weight: bolder;
      	display: flex;
      	justify-content: center;
      	align-items: center;
      }

      .gct{
      	width: 50%!important;
      
      	border-radius: 0px!important;
      	display: flex;
      	justify-content: center;
      	align-items: center;
      	font-weight: bolder;
      	font-size: 13px;
      	font-style: italic;
      	color: #78909C!important;
      }
      .gct:hover{
      	background-color: inherit!important;
      }
      .gct input{
      	width:20px!important;
    	height:20px!important;
    	/*margin-left: 1em!important;*/
    	background-color: transparent!important;
    	box-shadow: none!important;
      }
      	</style>
</head>
<body>
	<div class="saved" style="display:none">Saved Successfully!</div>
    <div class="fail" style="display:none">Failed to Save</div>
	<?php $this->load->view('segments/links'); $this->load->helper('loads');$session = $this->ses->userdata('user_session');?>

	<section class='account_summary'>
		<h1>Create Landlord</h1>
		<article>

		<input type="text" class="email" placeholder="Firstname"/>
		<input type="text" class="email" placeholder="Lastname"/>
		<input type="text" class="email" placeholder="mobile number"/>
		<input type="email" class="email" placeholder="email address"/>
		<input type="text" class="email" placeholder="street address"/>
		<input type="text" class="email" placeholder="city"/>
		<input type="text" class="email" placeholder="state"/>
		<select class="country">
			<option>Select Country</option>
			<?php allCountries();?>
		</select> 
		<input type="email" class="email" placeholder="zip code"/>
		
		<div class="gct">Apply GCT (16.5%)<input type="checkbox" id="check" /></div>

		<button id="save" onclick="post();">Create Landlord</button>
		
		</article>
		<p class="result"></p>
	</section>

	<section class="properties">
		<p class="r" style="display: none;"></p>
		<h1>Landlords<img src='<?php echo(base_url('assets/refresh1.png'));?>' width='30px' height='30px' class="ref"/></h1>
		<table>
			
			<tr class="coo">	
				<th>Firstname</th>
				<th>Lastname</th>
				<th>GCT</th>
				<th title="total properties owned">TPO</th>
				<th >Email</th>
				<th >Mobile#</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>

			<?php autoPullFrom5();?>

		</table>
		<p class="results"><img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/></p>
		<script type="text/javascript">
			setTimeout(function(){
				$(".results").html($(".r").text());
			},1000);
			
			$('.ref').click(function(){
				$(this).attr('src','<?php echo(base_url('assets/pleasewait1.gif'));?>');
				setTimeout(function(){
					window.location.reload();
				},2000);
			});
		</script>
	</section>


	<script type="text/javascript">
		
		function post(){

			var fname = $(".email").eq(0).val();

			var lname = $(".email").eq(1).val();

			

			var mobile = $(".email").eq(2).val();


			var email = $(".email").eq(3).val();


			var saddress = $(".email").eq(4).val();
			var city = $(".email").eq(5).val();
			var state = $(".email").eq(6).val();
			var country = $(".country").val();

			var zip = $(".email").eq(7).val();

			

			var check = $("#check").prop('checked');
			var gct = 0;

			if(check === true){
				gct = 16.5;
			}else{
				gct = 0.0;
			}

		


			$(".result").html("<img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/>");

			$.post("<?php echo site_url('Home/landlordCreate');?>",{fname:fname,lname:lname,email:email,mobile:mobile,saddress:saddress,city:city,state:state,country:country,zip:zip,gct:gct},function(result){
				setTimeout(function(){
				$(".result").html(result);
			},200);
			});
				
		}

	</script>
</body>

<?php }?>