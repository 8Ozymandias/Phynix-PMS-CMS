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

			.sf{
        display: flex;
        color: white;
        background-color: #FB8C00;
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
      .gt{
      	width: 45%!important;

      	border-radius: 0px!important;
      	display: flex;
      	justify-content: center;
      	align-items: center;
      	font-weight: bolder;
      	font-size: 13px;
      	font-style: italic;
      	color: #78909C!important;
      }
      .gt:hover{
      	background-color: inherit!important;
      }
      .gt input{
      	width:20px!important;
    	height:20px!important;
    	/*margin-left: 1em!important;*/
    	background-color: transparent!important;
    	box-shadow: none!important;
      }


      .gct{
      	width: 100%!important;
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
      .gct p{
      	width:40%!important;
      	display: flex;
      	align-items: center;

      }
      .gct input{
      	width:20px!important;
    	height:20px!important;
    	/*color: !important;*/
    	background-color: transparent!important;
    	box-shadow: none!important;

      }

      .pastdue{
      	width:100%!important;
      	display: flex;
      }


        .pastdue:hover{
      	background-color: inherit!important;
      }

      .pastdue p{
      	width: 100%;
      	display: flex;
      	align-items: center;
      }

      .pastdue p img{
      	padding-right: 1em;
      }
/*          input[type='radio']:after {
        width: 20px;
        height: 20px;
        border-radius: 20px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    input[type='radio']:checked:after {
        width:20px;
        height: 20px;
        border-radius: 20px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #E65100;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }*/


      	</style>
</head>
<body>
	<div class="saved" style="display:none">Saved Successfully!</div>
    <div class="fail" style="display:none">Failed to Save</div>
		<div class="sf" style="display:none">Failed to Save</div>
	<?php $this->load->view('segments/links'); $this->load->helper('loads');$session = $this->ses->userdata('user_session');?>

	<section class='account_summary'>
		<h1>Create Tenant</h1>
		<article>
			<?php //?>
		<input type="text" class="email" placeholder="Firstname"/>
		<input type="text" class="email" placeholder="Lastname"/>

		<select class="property">
			<option value="">Please Select A Property</option>
			<?php autoPullFrom8();?>
		</select>

		<input type="number" class="email" placeholder="mobile number"/>

		<input type="email" class="email" placeholder="email address"/>
		<input type="number" class="email" placeholder="Deposit"/>
		<!-- The account balances and all money that will be calculated -->
		<div class="gt">New Tenant
			<input type="checkbox" id="new"/>
		</div>
		<div class="gt">Send Deposit to landlord
			<input type="checkbox" id="dep"/>
		</div>

		<div class="pastdue">
			<p><img src="<?php echo base_url('assets/add.png');?>" width="30px" height="30px" class="addPass"/>Add a line of past due </p>
		</div>
		<button id="save" onclick="post();">Add Tenant</button>

		</article>
		<p class="result"></p>
	</section>

	<section class="properties">
		<p class="r" style="display: none;"></p>
		<h1>Tenants<img src='<?php echo(base_url('assets/refresh1.png'));?>' width='30px' height='30px' class="ref"/></h1>
		<table>

			<tr class="coo">
				<th>Tenant Name</th>
				<th>Property</th>
				<th>Landlord</th>
				<th >Lease Term</th>
				<th >Email</th>
				<th >Mobile#</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>

			<?php autoPullFrom9();?>

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

		var isNew = false;

		var isChecked = false, isFurChecked = false, isFurUnchecked = false, dep = false;

		var fur = false, ufur = false, lanDep = false;

		var holdData = new Array();
		var holdData2 = new Array();
		var str = "";
		var clickCount = 0;

		$('document').ready(function(){

			$('.addPass').click(function(){
				$('.pastdue').append("<input class='amt' type='number' placeholder='amount'/> <input type='date' placeholder='date of past due' class='dte'/>");


				$('.amt').eq(clickCount).hide().slideDown('slow');
				$('.dte').eq(clickCount).hide().slideDown('slow');
				clickCount+=1;
			});

			isChecked = $('#new').prop('checked');

			isFurChecked = $("#fur").prop('checked');

			isFurUnChecked = $("#ufur").prop('checked');

			dep = $("#dep").prop('checked');

			if(isChecked === false){
				isNew = 0;
			}

			if(dep === false){
				lanDep = 0;
			}

			$('#new').click(function(){
				isChecked = $('#new').prop('checked');

				if(isChecked === true){
					isNew = 1;
				}else{
					isNew = 0;
				}

			});

			$('#dep').click(function(){
				dep = $('#dep').prop('checked');

				if(dep === true){
					lanDep = 1;
				}else{
					lanDep = 0;
				}

			});
		});


		function post(){
			var proAbb;
			var fname = $(".email").eq(0).val();
			var lname = $(".email").eq(1).val();
			var email = $(".email").eq(3).val();
			var deposit = $(".email").eq(4).val();
			var mobile = $(".email").eq(2).val();
			var property = $(".property").val();

			for(x = 0; x < document.getElementsByClassName('amt').length; x++){
				var co = {
					"amt": $('.amt').eq(x).val(),
					"day": $('.dte').eq(x).val()
				}
				holdData.push(co);
			}

			$(".result").html("<img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/>");

			$.post("<?php echo site_url('Home/tenantCreate');?>",{fname:fname,lname:lname,email:email,mobile:mobile,property:property,new:isNew,deposit:deposit,dep:lanDep,pastdue:JSON.stringify(holdData)},function(result){
				$(".result").html(result);
				holdData = [];
			});

		}

	</script>
</body>

<?php }?>
