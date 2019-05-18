<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!($this->ses->has_userdata("user_session"))){
		redirect(site_url("Home")."?error=please login to continue");
	}else{
?>

<style type="text/css">
::-webkit-scrollbar {
    width: 0.5em;
    border-radius: 5px;
    z-index: 100;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 5px;
    z-index: 100;
}

::-webkit-scrollbar-thumb {
  background-color: #78909C;
  outline: 1px solid #03A9F4;
  border-radius: 5px;
  z-index: 100;
}
*{
	padding: 0px;
	margin: 0px;
	font-family: "Ebrima", "Calibri", "Times New Roman", serif;
}
	body,article,section,aside,nav,footer{
	display: flex;
	flex-flow: row wrap;
	justify-content: center;
}

nav{
	width: 100%;
	background-color: #263238;
	box-shadow: 0px 0px 10px rgba(19,19,19,0.8);
	position: fixed;
}

footer{
	width: 100%;
	background-color: #263238;
	box-shadow: 0px 0px 10px rgba(19,19,19,0.8);

}

nav ul{
	display: flex;
	flex-flow: row wrap;
	align-items: center;
}

nav ul li{
	padding-left: 0.5em;
	padding-right: 0.5em;
	display: flex;
	align-items: center;
	color: #78909C;
	font-weight: bolder;
	cursor: pointer;
	height: 100%;
}

nav .header{
	width: 20%;
}

nav .main_links{
	width: 80%;
	justify-content: flex-end;
}

nav ul li:hover{
	color: rgba(245,245,245 ,1);
	box-shadow: inset 0px 0px 10px rgba(30,30,30,1);
	text-shadow: 0px 0px 5px white;
	transition: box-shadow 0.4s, color 0.4s, text-shadow 0.4s;

}

/*Configuring Section Css*/

.main_area{
	width: 100%;
	height: auto;
	padding: 1em;
	justify-content: center;
}

/*Site Map*/


.site_path_links{
	border-radius: 10px;
	box-shadow: inset 0px 0px 10px rgba(19,19,19,0.6);
	margin-top: 5%;
	width: 95%;
}

.site_path_links ul{
	display: flex;
	justify-content: center;
	align-items: center;
	width: 100%;
}
.site_path_links ul li{
	padding:1em;
	display: flex;
	font-size: 10px;
	align-items: center;
	color: #78909C;
	font-weight: bolder;
	cursor: pointer;
	height: 100%;
	display: flex;
	justify-content: center;
	text-align: center;
}

.site_path_links ul li:not(:nth-child(1)):hover{
	color: #E65100;
	text-shadow: 0px 0px 5px white;
	transition: color 0.4s, text-shadow 0.4s;

}

.pro_notification_bar::-webkit-scrollbar-thumb {
  background-color: #03A9F4!important;
  outline: 1px solid #03A9F4!important;
  border-radius: 5px;
  z-index: 100;
}
.pro_settings_bar{
  z-index: 0;
  width: 15%;
  height: auto;
  display: none;
  background-color: #263238;
  position: fixed;
  top: 47px;
  right: 3.9%;
  color: #78909C;
  box-shadow: inset 0px 0px 10px rgba(0,0,0,0.6);

}

.pro_settings{
   z-index: -1;
  width: 15%;
  height: auto;
  display: none;
  background-color: #263238;
  position: fixed;
  top: 50px;
  color: #03A9F4;
  right: 5.3%;
  box-shadow: inset 0px 0px 10px rgba(0,0,0,0.6);

}
.pro_notification_bar{
	z-index: 0;
  display: flex;
  flex-flow: row wrap;
  justify-content: center;
  align-items: center;
  width: 20%;
  height: 260px;
  background-color: #263238;
  position: fixed;
  top: 50px;
  right: 8.8%;
  color: #78909C;
  overflow-y:hidden;
  box-shadow: inset 0px 0px 10px rgba(0,0,0,0.6);
}
.pro_notification_bar:hover{
  overflow-y: scroll;
  transition: overflow-y 0.4s;
}

.pro_settings_bar ul,.pro_settings ul,.pro_right ul, .pro_left ul{
  display: flex;
  justify-content: center;
  width: 100%;
  flex-flow: row wrap;
}
.pro_settings_bar ul li,.pro_settings ul li,.pro_right ul li, .pro_left ul li{
  padding: 1em;
  width: 100%;
  text-align: center;
  cursor: pointer;
  display: flex;
  align-items: center;
  font-weight: bolder;
  font-size: 12px;
}

.pro_settings_bar ul li img,.pro_settings ul li img,.pro_right ul li img,.pro_left ul li img{
  padding: 0.8em;
}

.pro_settings_bar ul li:hover,.pro_settings ul li:hover,.pro_right ul li:hover,.pro_left ul li:hover{
  background-color: #546E7A;
  transition: background-color 0.4s;
}


     		footer{
	width: 100%;
	justify-content: center!important;
	color:transparent;
	font-weight: bolder;
	font-style: italic;
	font-size: 10px;
	margin-bottom:0px!important;
	position: fixed;
	bottom: 0%;

}
</style>
<nav class="main_nav">
		<ul class="header">

			<li onclick="$('.links').eq(0)[0].click();"><img src="<?php echo base_url("assets/profile.png");?>" width="50px" height="50px" /> <?php echo $data['manager_fname'].' '.$data['manager_lname']; ?></li>


		</ul>

		<ul class="main_links">

			<li onclick="$('.links').eq(10)[0].click();"><img src="<?php echo base_url("assets/pay.png");?>" width="30px" height="30px" /> Collect Rent</li>

			<li class="bell"><img src="<?php echo base_url("assets/note.png");?>" width="30px" height="30px" /> Notifications</li>
			<li class="settings" ><img src="<?php echo base_url("assets/aset.png");?>" width="30px" height="30px" /> Account Settings</li>
			<li onclick="window.location.href = '<?php echo site_url('Pages/logout'); ?>'"><img src="<?php echo base_url("assets/logout.png");?>" width="30px" height="30px" /> Logout</li>
<!-- onclick="$('.links').eq(8)[0].click();" -->
		</ul>



	</nav>

	<div class="pro_notification_bar" style="display:none"></div>
	<div class="pro_settings_bar">
      <ul>
	<li onclick="$('.links').eq(8)[0].click();"><img src="<?php echo base_url('assets/aset.png');?>" width='30px' height='30px'/>Edit Account</li>
	<li onclick="$('.links').eq(14)[0].click();"><img src="<?php echo base_url('assets/aset.png');?>" width='30px' height='30px'/>Change Theme</li>
      </ul>
    </div>

	<section class="site_path_links">
		<ul>

				<li><img src="<?php echo base_url("assets/links.png");?>" width="30px" height="30px" /> Page Links: </li>

				<li onclick="$('.links').eq(0)[0].click();">Dashboard</li>
				<a class="links" href="<?php echo site_url("Pages/dashboard");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(1)[0].click();">Create User</li>
				<a class="links" href="<?php echo site_url("Pages/userpanel");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(2)[0].click();">Create Manager</li>
				<a class="links" href="<?php echo site_url("Pages/managerpanel");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(3)[0].click();">Create Landlord</li>
				<a class="links" href="<?php echo site_url("Pages/landlordpanel");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(4)[0].click();">Create Property</li>
				<a class="links" href="<?php echo site_url("Pages/propertypanel");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(5)[0].click();">Create Tenant</li>
				<li onclick="$('.links').eq(15)[0].click();">Create Lease</li>
				<a class="links" href="<?php echo site_url("Pages/tenantpanel");?>" style="display: none;" target="SELF"></a>

				<!-- <li onclick="$('.links').eq(6)[0].click();">Create Work Order</li> -->
				<a class="links" href="<?php echo site_url("Pages/workorderpanel");?>" style="display: none;" target="SELF"></a>


				<a class="links" href="<?php echo site_url("Pages/documents");?>" style="display: none;" target="SELF"></a>


				<a class="links" href="<?php echo site_url("Pages/accountsetting");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(9)[0].click();">View Work Orders</li>
				<a class="links" href="<?php echo site_url("Pages/workorders");?>" style="display: none;" target="SELF"></a>

				<!-- <li onclick="$('.links').eq(10)[0].click();">Collect Rent</li> -->
				<a class="links" href="<?php echo site_url("Pages/collections");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(11)[0].click();">Landlord Portal</li>
				<a class="links" href="<?php echo site_url("Pages/landlordlogin");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(12)[0].click();">Tenant Portal</li>
				<a class="links" href="<?php echo site_url("Pages/tenantlogin");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(13)[0].click();">Complaints</li>
				<a class="links" href="<?php echo site_url("Pages/complaints");?>" style="display: none;" target="SELF"></a>


				<a class="links" href="<?php echo site_url("Pages/themes");?>" style="display: none;" target="SELF"></a>


				<a class="links" href="<?php echo site_url("Pages/leasepanel");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(16)[0].click(); run();">Generate Reports</li>
				<a class="links" href="<?php echo site_url("Pages/reports");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(17)[0].click();">Upload Forms</li>
				<a class="links" href="<?php echo site_url("Pages/uploadfiles");?>" style="display: none;" target="SELF"></a>

				<!-- <li onclick="$('.links').eq(17)[0].click();">Terms & Agreements</li>
				// <a class="links" href="<?php //echo site_url("Pages/terms");?>" style="display: none;" target="SELF"></a>

				<li onclick="$('.links').eq(18)[0].click();">Privacy Policy</li>
				// <a class="links" href="<?php //echo site_url("Pages/privacy");?>" style="display: none;" target="SELF"></a> -->


			</ul>
	</section>
<footer><?php $this->load->view("segments/footer");?></footer>
	<script type="text/javascript">

	var run = function(){
		window.location.href = "<?php echo site_url("Pages/bill");?>";
	}

		$("document").ready(function(){
			$(".bell").click(function(){
        $(".pro_notification_bar").slideToggle( "slow" );
        $(".pro_settings_bar").slideUp( "slow" );
        $(".pro_settings").slideUp( "slow" );
        
      });

      $(".settings").click(function(){
        $(".pro_settings_bar").slideToggle( "slow" );
        $(".pro_notification_bar").slideUp( "slow" );
        $(".pro_settings").slideUp( "slow" );
      });

      $(".pro_header").click(function(){
        $(".pro_settings").slideToggle( "slow" );
        $(".pro_notification_bar").slideUp( "slow" );
        $(".pro_settings_bar").slideUp( "slow" );
      });
		});

	</script>

	<?php }?>
