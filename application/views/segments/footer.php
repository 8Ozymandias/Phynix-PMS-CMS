<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!($this->ses->has_userdata("user_session"))){
		redirect(site_url("Home")."?error=please login to continue");
	}else{
?>
<style type="text/css">
*{
	padding: 0px;
	margin: 0px;
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


.footer{
	margin: 0%;
	width: 100%;
}

.footer ul{
	display: flex;
	justify-content: center;
	align-items: center;
	width: 100%;
}
.footer ul li{
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

.footer ul li:not(:nth-child(1)):hover{
	color: #E65100;
	/*text-shadow: 0px 0px 5px white;*/
	transition: color 0.4s;
	
}
</style>


	<section class="footer">
		<ul>

				<li >Created By: Shayn Hacker</li>
				
				<li onclick="$('.links').eq(18)[0].click();">Terms & Agreements</li>
				<a class="links" href="<?php echo site_url("Pages/terms");?>" style="display: none;" target="SELF"></a>
				
				<li onclick="$('.links').eq(19)[0].click();">Privacy Policy</li>
				<a class="links" href="<?php echo site_url("Pages/privacy");?>" style="display: none;" target="SELF"></a>
				

			</ul>
	</section>
<script type="text/javascript" src="<?php echo base_url('js/materialize.min.js');?>"></script>
	<?php }?>