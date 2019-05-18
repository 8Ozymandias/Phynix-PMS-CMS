<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	ini_set('display_errors', false);
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

      .o1{
      	background-color: #64DD17;
      	box-shadow: 0px 0px 10 white;
      	border-radius: 100%;
      	padding:0.2em;
      	height: 3px;
      	width: 3px;
      	margin-right: 5%;
      	margin-left: 5%;
      	/*position: absolute;*/
      }

      .o0{
      	background-color: #F5F5F5;
      	box-shadow: inset 0px 0px 2 rgba(19,19,19,0.5);
      	border-radius: 100%;
      	padding:0.2em;
      	height: 3px;
      	width: 3px;
      	margin-right: 5%;
      	margin-left: 5%;
      	/*position: absolute;*/
      }

	</style>
</head>
<body>
	<div class="online"></div>

<div class="saved" style="display:none">Activation Resent Successfully</div>
    <div class="fail" style="display:none">Failed To Send Activation</div>

	<?php $this->load->view('segments/links'); $this->load->helper('loads');?>
	<div class="res" style="display:none"></div>

	<section class="main_area">

	<section class="aside1">

	<aside class="recent_changes">
		<h1>Recent Changes</h1>
		<ul>
			<li></li>
		</ul>
	</aside>

	<aside class="pending_requests">
		<h1>Pending Activation</h1>
		<ul class='co'>
			<?php autoPullFrom2("property_pending_request"); ?>

		</ul>
	</aside>

	</section>
	<?php
		// $date = date_create_from_format("Y-m-d", "2000-01-20");
		// echo $date(->format("m"));
		// $first30Days = date('Y',  strtotime("2020-10-10"." +30 days"));
		// echo $first30Days;
		//
		// $c = date("Y");
		//
		// $actualStartDate = date_create_date_format("Y-m-d", $c."-01-01");
		// echo $actualStartDate->format("d");
	?>
	<section class="main_content">

		<article class="primary_nav">

			<ul>

				<li onclick="$('.links').eq(2)[0].click();">Create Manager<img src="<?php echo base_url("assets/plus.png");?>" width="30px" height="30px" /></li>
				<li onclick="$('.links').eq(3)[0].click();">Create Landlord<img src="<?php echo base_url("assets/plus.png");?>" width="30px" height="30px" /></li>
				<li onclick="$('.links').eq(4)[0].click();">Create Property<img src="<?php echo base_url("assets/plus.png");?>" width="30px" height="30px" /></li>
				<li onclick="$('.links').eq(5)[0].click();">Create Tenant<img src="<?php echo base_url("assets/plus.png");?>" width="30px" height="30px" /></li>
				<li onclick="$('.links').eq(6)[0].click();">Create Work Order<img src="<?php echo base_url("assets/plus.png");?>" width="30px" height="30px" /></li>
				<li onclick="$('.links').eq(17)[0].click();">Upload Forms<img src="<?php echo base_url("assets/upload.png");?>" width="30px" height="30px" /></li>

			</ul>

		</article>

		<article class="account_summary">

			<h1>Account Summary</h1>
			<div class="tabs">
				<h2>Tenant Complaints</h2>
				<p>100<span>Continue</span></p>
			</div>
			<div class="tabs">
				<h2>Lease Expring Soon</h2>
				<p>100<span>Continue</span></p>
			</div>
			<div class="tabs">
				<h2>Current Work Orders</h2>
				<p>100<span>Continue</span></p>
			</div>
			<div class="tabs">
				<h2>Total Properties Managed</h2>
				<p>100<span>Continue</span></p>
			</div>
			<div class="tabs">
				<h2>Tenants In Past Due</h2>
				<p>100<span>Continue</span></p>
			</div>
			<div class="tabs">
				<h2>Total Landlords</h2>
				<p>100<span>Continue</span></p>
			</div>
			<div class="tabs">
				<h2>Total Tenants</h2>
				<p>100<span>Continue</span></p>
			</div>
			<div class="tabs">
				<h2>Landlords To Be Payed</h2>
				<p>100<span>Continue</span></p>
			</div>
			<div class="tabs">
				<h2>Total Rents Payed</h2>
				<p>100<span>Continue</span></p>
			</div>

		</article>


		<article class="properties">

			<h1>Rented Property Details</h1>

			<table>
				<!--  style="position: absolute;"  please remember to set it to absolute-->
				<tr >
					<th>Tenant Name</th>
					<th>Property</th>
					<th>Status</th>
					<th>Lease Term</th>
					<th>Rental Fee</th>
					<th>Management Fee</th>
					<th>Lease Expire</th>
				</tr>

				<?php mainPanelProperties();?>



			</table>

		</article>

	</section>

<section class="aside2">
	<aside class="active_users">

		<h1>Active Users</h1>
		<ul class='co1'>
			<?php activeUsers($this->ses->userdata('user_session'));?>
		</ul>

	</aside>

	<aside class="active_tenants">
		<h1>Active Tenants</h1>
		<ul class='co2'>
			<?php activeTenants();?>
		</ul>
	</aside>


	<aside class="active_landlords">
		<h1>Active Landlords</h1>
		<ul class='co3'>
			<?php activeLandlords();?>
		</ul>
	</aside>

</section>


</section>



</body>

</html>

<?php
}?>
