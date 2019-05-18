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
      	padding: 0.5em;
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
      	width:20px;
    height:20px;
    margin-left: 1.5em;
      }
      	</style>
</head>
<body>
	<div class="saved" style="display:none">Saved Successfully!</div>
    <div class="fail" style="display:none">Failed to Save</div>
	<?php $this->load->view('segments/links'); $this->load->helper('loads');$session = $this->ses->userdata('user_session');?>


	<!-- <table style="border: 2px solid black; border-radius: 10px; ">
		<thead style="background-color:#2196F3; font-weight: bolder; color: white;">
			<tr>
				<th colspan="2" style="padding: 0.5em; font-size: 20px; color: white; border-top-left-radius: 10px;border-top-right-radius: 10px;">Monthly Bill Summary</th>
			</tr>
			<tr style="text-align: left;">
				<th style="padding: 0.5em;">Name</th>
				<th style="padding: 0.5em;">Jordaine Gayle</th>
			</tr>
		</thead>

		<tbody style="background-color: #f44336;">
			<tr>
				<td style="padding: 0.5em; font-weight: bold; color: #fff;">Due Date</td>
				<td style="padding: 0.5em; font-weight: bold; color: #fff;">March 12, 2018</td>
			</tr>

			<tr>
				<td style="padding: 0.5em; font-weight: bold; color: #fff;">Amount Due</td>
				<td style="padding: 0.5em; font-weight: bold; color: #fff;">$12,000.00 JMD</td>
			</tr>
		</tbody>

		<tfoot style="padding: 1em; text-align: center;background-color:#2196F3;">
			<tr>
				<td colspan="2" style="padding: 1em;"><a style="padding: 0.5em; background-color:#fff; color: #2196F3; font-weight: bolder; outline: none; border:none; cursor: pointer; border-radius: 6px; text-decoration: none;" href="#" onmouseover="this.style.backgroundColor = '#f44336'; this.style.color = 'white'" onmouseout="this.style.backgroundColor = '#fff'; this.style.color = '#2196F3'">View Bill</a></td>
			</tr>
		</tfoot>
	</table> -->

	<section class='account_summary'>
		<h1>Create Lease</h1>
		<article>
			<?php //$today = date("m-d-y");?>
		<input type="date" class="email" placeholder="start date"/>
		<input type="number" class="email" placeholder="how many months"/>
		<select class="tenant">
			<option value="">Please Select A Tenant</option>
			<?php autoPullFrom10();?>
		</select>
		<button id="save" onclick="post();">Apply Lease</button>

		</article>
		<p class="result"></p>
	</section>

	<section class="properties">
		<p class="r" style="display: none;"></p>
		<h1>Active Lease<img src='<?php echo(base_url('assets/refresh1.png'));?>' width='30px' height='30px' class="ref"/></h1>
		<table>

			<tr class="coo">
				<th>Lease Term</th>
				<th >Tenant</th>
				<th>Lease Expire</th>
				<th>Renew</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>

			<?php autoPullFrom11();?>

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

	<!-- <footer>Created By: Jordaine Gayle</footer> -->

	<script type="text/javascript">

		Date.prototype.addDays = function(days) {
		this.setDate(this.getDate() + days);
		return this;
		};



		function post(){

			var fname = $(".email").eq(0).val();
			var lname = $(".email").eq(1).val();
			var ename = $(".tenant").val();

			$(".result").html("<img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/>");

			$.post("<?php echo site_url('Home/leaseAdd');?>",{start:fname,end:lname,tenant:ename},function(result){
				setTimeout(function(){
				$(".result").html(result);
			},2000);
			});

		}


		$("document").ready(function(){
			/*$(".email").eq(0).change(function(){

				var currentDay = new Date($('.email').eq(0).val());

				var next30 = currentDay.addDays(30).toISOString().substring(0,10);

				$(".email").eq(1).attr("min",next30);
			});*/
		});

	</script>
</body>

<?php }?>
