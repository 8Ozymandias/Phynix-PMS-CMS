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
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Admin Panel</title>

	<style type="text/css">

		section.mainClass{
			width: 44%!important;
			margin: 2em!important;
			border-radius: 10px;
			box-shadow: inset 0px 0px 10px rgba(19,19,19,0.6);
			padding: 1em;
		}

		header.tabs{
			background-color: #E65100;
			border-top-right-radius: 10px;
			border-top-left-radius: 10px;
			width: 100%;
			text-align: center;
			vertical-align: center;
			color: white;
			display: flex;
			justify-content: space-between;
		}

		/*Setting up the header*/
		header.tabs > .tab{
			font-size: 13px;
			cursor: pointer;
			padding: 1em;
		}

		header.tabs > .tab:first-child{
			border-top-left-radius: 10px;
		}

		header.tabs > .tab:last-child{
			border-top-right-radius: 10px;
		}

		header.tabs > .tab:hover{
			background-color: rgba(255,224,178 ,0.4);
			transition: background-color ease-in 0.1s;
		}

		header.tabs > .tab_click{
			background-color: rgba(38,50,56 ,1);
			border-bottom: 1.5px solid rgba(76,175,80,1);
			transition: background-color ease-in 0.2s;
		}
		header.tabs > .tab_click:hover{
			background-color: rgba(84,110,122 ,0.9);
			transition: background-color ease-in 0.2s;
		}

		/*Creating and styling the tab bodies*/

		section > article.tabBody{
			width: 100%;
			height: 450px;
			position: relative;
			background-image: linear-gradient(180deg, rgba(55,71,79 ,1),rgba(38,50,56 ,1));
			display: flex;
			flex-flow: row wrap;
			overflow-y: scroll;
			overflow-x: hidden;
		}

		.tenantInfo{
			margin: 10px;
			padding: 0.6em;
			display: flex;
			justify-content: space-around;
			width: 100%;
			height: 40px;
			align-items: center;
			border-radius: 8px;
			background-color: #E65100;
			color: white;
			font-size: 12px;
			font-weight: bolder;
			box-shadow: inset 0px 0px 8px rgba(19,19,19,0.5);

		}

		.tenantInfo > div > button{
			border-radius: 5px;
			padding:1em;
			font-size: 10px;
			font-weight: bolder;
			box-shadow: inset 0px 0px 8px rgba(19,19,19,0.5);
			outline: none;
			border:none;
			background-color: #9CCC65;
			color: white;
			cursor: pointer;
		}

		.tenantInfo > div > button:hover{
			background-color: #C5E1A5;
			transition: background-color 0.1s;
		}

		/*Setting up popup box*/

		.popUp{
			background-color: rgba(19,19,19,0.5);
			width: 100%!important;
			height: 100%!important;
			z-index: 1000!important;
			display: flex;
			justify-content: center;
			align-items: center;
			position: absolute;
		}

		.bodyOfPopup{
			width: 50%;
			height: auto;
			border-radius: 10px;
			box-shadow: inset 0px 0px 10px rgba(19,19,19,0.5);
			background-color: #F5F5F5;
			display: flex;
			flex-flow: row wrap;
			justify-content: center;
		}

		.bodyOfPopup div{
			width: 100%;
			display: flex;
			flex-flow: row wrap;
			justify-content: center;
		}

		.bodyOfPopup div p:first-child{
			width: 100%;
			font-weight: bolder;
			font-size: 13px;
			color: #B0BEC5;
			font-style: italic;
			background-color: #263238;
			padding: 1em;
		}

		.bodyOfPopup div p:not(:first-child){
			width: 40%;
			font-weight: bolder;
			font-size: 13px;
			color: #607D8B;
			font-style: italic;
  			padding: 1em;
  			margin: 0.5em;
  			box-shadow: inset 0px 0px 5px rgba(19,19,19,0.5);
  			border-radius: 5px;
		}

		.bodyOfPopup input, .bodyOfPopup select{
  			border-top: none;
  			border-left: none;
  			border-right: none;
  			background-color:transparent;
  			color: black;
  			width: 40%;
  			padding: 1em;
  			margin: 0.5em;
  			box-shadow: inset 0px 0px 5px rgba(19,19,19,0.5);
  			outline-color:none;
  			outline: none;
  			border-radius: 5px;
		}

		.bodyOfPopup input:focus{
			outline:none;
			box-shadow: inset 0px 0px 8px #2196F3;
		}

		.bodyOfPopup div button{
			border-radius: 5px;
			padding:1em;
			font-size: 14px;
			font-weight: bolder;
			box-shadow: inset 0px 0px 8px rgba(19,19,19,0.5);
			outline: none;
			border:none;
			background-color: #9CCC65;
			color: white;
			cursor: pointer;
			margin: 1em;
			width: 200px;
		}

		.bodyOfPopup div button.exit{
			border-radius: 5px;
			padding:1em;
			font-size: 14px;
			font-weight: bolder;
			box-shadow: inset 0px 0px 8px rgba(19,19,19,0.5);
			outline: none;
			border:none;
			background-color: #ef5350;
			color: white;
			cursor: pointer;
			margin: 1em;
			width: 200px;
		}

		.bodyOfPopup > div > button:hover{
			background-color: #C5E1A5;
			transition: background-color 0.1s;
		}

		.bodyOfPopup > div > button.exit:hover{
			background-color: #ef9a9a;
			transition: background-color 0.1s;
		}



	</style>
</head>


<body>

	<?php $this->load->view('segments/links');  $this->load->helper('loads');?>

	<section class="mainClass">
		
		<header class="tabs">
			<h4 class="tab">Receive Payments</h4>
			<h4 class="tab">Pay Landlord</h4>
			<h4 class="tab">View Accounts in Arreas</h4>
			<h4 class="tab">View Bills</h4>
			<h4 class="tab">View Transactions</h4>
		</header>

		<article class="tabBody">
			<div class="tenantInfo">
				<div><p><span>Name:</span> Jordaine Gayle</p></div>
				<div><p><span>Current Month's Rent:</span> $12,000.00</p></div>
				<div><p><span>Due Date:</span> 12/09/2018</p></div>
				<div><button onclick="Popup()">Collect</button></div>
			</div>
			
		</article>

		

		<article class="tabBody" style="display: none;">

		</article>

		<article class="tabBody" style="display: none;">

		</article>

		<article class="tabBody" style="display: none;">

		</article>

		<article class="tabBody" style="display: none;">

		</article>

	</section>

	<div class="popUp" style="display:none;">
				<div class="bodyOfPopup">
					<div class="one">
						<p style="border-top-right-radius: 10px; border-top-left-radius: 10px;">Contact Info</p>
						<input type="text" placeholder="Firstname" />
						<input type="text" placeholder="Lastname" />
						<input type="text" placeholder="Property Address" />
						<input type="text" placeholder="date joined" />
						<input type="text" placeholder="Telephone Number" />
						<input type="text" placeholder="Email" />
						<input type="text" placeholder="lease start" />
						<input type="text" placeholder="lease end" />
						</div>

					<div class="two">
						<p>Payment Details</p>
						<select>
							<option>Select rent period</option>
						</select>
						<input type="number" placeholder="Payment Amount" />
						<select>
							<option>Select payment account</option>
						</select>
						<input type="date" placeholder="Payment Date" />
						</div>

					<div class="three">
						<p>Payment Summary</p>
						<p>Landlord Name: Bobby Sac</p>
						<p>Esitmated amount for landlord: $4000.00</p>
						<p>Esitmated amount for property management team: $1000.00</p>
						<p>Tax%: 16.5%</p>
						<p>Total tax: $150.00</p>
						<p>Late Fee: 9.00</p>

						<button class="payment">Receive Payment</button>
						<button class="exit">Close</button>
						</div>
					</div>
				</div>

</body>

<script type="text/javascript">

class PageTools{

	/*private static PageTools instance;
	private PageTools(){}
	getInstance(){
		if(this.instance == null){
			instance = new PageTools();
		}
		return instance;
	}
	public static PageTools Instance = this.getInstance();*/

	removeClassName(className, indexOfClass, removeClas){

		if(indexOfClass === $(className).length-1){
			for(var x = indexOfClass-1; x > -1; x--){
				$(className).eq(x).removeClass(removeClas);
			}
		}else{
			for(var x = indexOfClass+1; x < $(className).length; x++){
				$(className).eq(x).removeClass(removeClas);
			}
			for(var x = indexOfClass-1; x > -1; x--){
				$(className).eq(x).removeClass(removeClas);
			}
		}
	}
}

var Popup = () =>{
	$(".popUp").fadeIn(1000);
}


$('dcoument').ready( () => {

	var tabClick = $(".tab");
	var tabBody = $('.tabBody');
	tabClick.on('click',function(){
		var tools = new PageTools();
		var currentTabIndex = tabClick.index(this);
		tabClick.eq(currentTabIndex).addClass('tab_click');
		tools.removeClassName(".tab",currentTabIndex,'tab_click');

		if(currentTabIndex === 0){
			tabBody.eq(currentTabIndex).fadeIn(1000);
			tabBody.eq(currentTabIndex).css("display","flex");
			tabBody.eq(1).css("display","none");
			tabBody.eq(2).css("display","none");
			tabBody.eq(3).css("display","none");
			tabBody.eq(4).css("display","none");
		}else if(currentTabIndex === 1){
			tabBody.eq(currentTabIndex).fadeIn(1000);
			tabBody.eq(currentTabIndex).css("display","flex");
			tabBody.eq(0).css("display","none");
			tabBody.eq(2).css("display","none");
			tabBody.eq(3).css("display","none");
			tabBody.eq(4).css("display","none");
		}else if(currentTabIndex === 2){
			tabBody.eq(currentTabIndex).fadeIn(1000);
			tabBody.eq(currentTabIndex).css("display","flex");
			tabBody.eq(0).css("display","none");
			tabBody.eq(1).css("display","none");
			tabBody.eq(3).css("display","none");
			tabBody.eq(4).css("display","none");
		}else if(currentTabIndex === 3){
			tabBody.eq(currentTabIndex).fadeIn(1000);
			tabBody.eq(currentTabIndex).css("display","flex");
			tabBody.eq(0).css("display","none");
			tabBody.eq(1).css("display","none");
			tabBody.eq(2).css("display","none");
			tabBody.eq(4).css("display","none");
		}else if(currentTabIndex === 4){
			tabBody.eq(currentTabIndex).fadeIn(1000);
			tabBody.eq(currentTabIndex).css("display","flex");
			tabBody.eq(0).css("display","none");
			tabBody.eq(1).css("display","none");
			tabBody.eq(2).css("display","none");
			tabBody.eq(3).css("display","none");
		}

	});


	$(".exit,.payment").on('click', function(){
		$(".popUp").fadeOut(1000);
	});

});

</script>


<script type="text/javascript">

	//var parsedData = <?php rentCollection(); ?>;

	//var stringifyData = JSON.stringify(parsedData);

	var keyValPair = new Array();

	/*for(var x = 0; x < parsedData.length; x++){
			console.log(parsedData[x].rent_id);
	}
*/


	console.log(<?php rentCollection(); ?>);

</script>

<?php }?>
