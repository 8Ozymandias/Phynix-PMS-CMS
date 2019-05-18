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
	width: 70%!important;
	height:400px!important;
	margin: 1em!important;
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
      	width: 45%!important;
      height: 40px;
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

      .gt{
      	width: 100%!important;
      	border-radius: 0px!important;
      	display: flex;
      	justify-content: center;
      	align-items: center;
      	font-weight: bolder;
      	font-size: 13px;
      	font-style: italic;
      	height: 40px;
      	border-radius: 0px!important;
      	color: #78909C!important;
      }
      .gt:hover{
      	background-color: inherit!important;
      }

     .gt input{
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
.gt input::placeholder{
	font-style: italic;
	color: #E65100;

}



   
      .gctt{
      	width: 90%!important;
      	height: 40px;
      	border-radius: 0px!important;
      	display: flex;
      	justify-content: center;
      	align-items: center;
      	font-weight: bolder;
      	font-size: 13px;
      	font-style: italic;
      	color: #78909C!important;
      	box-shadow: inset 0px 0px 5px rgba(0,0,0,0.9);

      }
      .gctt:hover{
      	background-color: inherit!important;
      }
      .gctt p{
      	width:40%!important;
      	display: flex;
      	align-items: center;
      	
      }
      .gctt input{
      	width:20px!important;
    	height:20px!important;
    	/*color: !important;*/
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
		<h1>Create Property</h1>
		<article>
			<?php //$today = date("m-d-y");?>
		<select class="land">
			<option value="">Please Select A Landlord</option>
			<?php autoPullFrom6();?>
		</select> 
		<input type="number" class="email" placeholder="rental price"/>
		
		<!-- <input type="text" class="email" placeholder="property description"/> -->
		<div class="gct">Same as landlord address
		<input type="checkbox" id="check" /></div>

		<div class="gct">Has Multiple Units
		<input type="checkbox" id="units" /></div>

		<div class="gt" style="display: none;">
			
			<input type="text" class="email1" placeholder="apartment name (apt,unit,floor) "/>
			<input type="number" class="email1" placeholder="number of units to create"/>

		</div>

		<div class="gctt">
			<p><input type="radio" name="f" value="1" id="fur"/>
			<label for="fur">Furnished</label></p>
			<p><input type="radio" name="f" value="0" id="ufur"/>
			<label for="ufur">Unfurnished</label></p>
		</div>

		<input type="email" class="email" value="" placeholder="street address"/>
		<input type="email" class="email" value="" placeholder="city"/>
		<input type="email" class="email" value="" placeholder="state"/>
		<input type="email" class="email" value="" placeholder="country"/>
		<input type="email" class="email" value="" placeholder="zip code"/>
		<select class="mgntfee">
			<option>Select Management Fee%</option>
			<?php autoPullFrom4('property_manager',1);?>
		</select> 
		<input type="text" class="email" placeholder="balance brought forward"/>
		<button id="save" onclick="post();">Create Property</button>
		
		</article>
		<p class="result"></p>
	</section>

	<section class="properties">
		<p class="r" style="display: none;"></p>
		<h1>Properties<img src='<?php echo(base_url('assets/refresh1.png'));?>' width='30px' height='30px' class="ref"/></h1>
		<table>
			
			<tr class="coo">	
				<th>Property</th>
				<th>Rental Fee</th>
				<th>Mngt Fee</th>
				<th>Landlord</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>

			<?php autoPullFrom7();?>

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

	<!-- <section class="properties">
		<p class="r" style="display: none;"></p>
		<h1>Apartments<img src='<?php //echo(base_url('assets/refresh1.png'));?>' width='30px' height='30px' class="ref"/></h1>
		<table>
			
			<tr class="coo">	
				<th>Property</th>
				<th>Apartment</th>
				<th>Rental Fee</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>

			<?php //autoPullFrom17();?>

		</table>
		<p class="results"><img src='<?php //echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/></p>
		<script type="text/javascript">
			setTimeout(function(){
				$(".results").html($(".r").text());
			},1000);
			
			$('.ref').click(function(){
				$(this).attr('src','<?php //echo(base_url('assets/pleasewait1.gif'));?>');
				setTimeout(function(){
					window.location.reload();
				},2000);
			});
		</script>
	</section> -->

	<script type="text/javascript">
		var isNew = false;

		var isChecked = false, isFurChecked = false, isFurUnchecked = false;;

		var fur = false, ufur = false;
		var check2 = false,check = false, pp = 0;
		
		function post(){

					var street = $(".email").eq(1).val();
					var  city = $(".email").eq(2).val();
					var state = $(".email").eq(3).val();
					var country = $(".email").eq(4).val();
					var zip = $(".email").eq(5).val();
					var rental = $(".email").eq(0).val();
					var landlord = $(".land").val();
					var uname = $(".email1").eq(0).val();
					var unit = $(".email1").eq(1).val();

					var mfee = $(".mgntfee").val();
					var bbf = $(".email").eq(6).val();
					
					var multiple = 0;

					if(check2 === false){
						multiple = 0;
					}else{
						multiple = 1;
					}
					if(bbf === ""){
					bbf = 0;
					}

					if(fur === 1 && ufur === false){
						pp = 1;
					}else if(ufur === 0 && fur === false){
						pp = 0;
					}else{
						pp = null;
					}


			$(".result").html("<img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/>");

			$.post("<?php echo site_url('Home/propertyCreate');?>",{street:street,city:city,state:state,country:country,zip:zip,rental:rental,landlord:landlord,multiple:multiple, units:unit, uname:uname,bbf:bbf,mfee:mfee,pp:pp},function(result){
				setTimeout(function(){
				$(".result").html(result);
			},2000);
			});
				
		}

		$('document').ready(function(){
			check = $("#check").prop('checked');
			check2 = $("#units").prop('checked');

			isChecked = $('#new').prop('checked');
			isFurChecked = $("#fur").prop('checked');
			isFurUnChecked = $("#ufur").prop('checked');
			var street,city,state,country,zip;
			var data = new Array();

				"<?php $data = returnData();?>";

				"<?php foreach($data as $dat){?>";

				data.push('<?php echo '{"street":"'.$dat['lanlord_street_address'].'","city":"'.$dat['landlord_city'].'","state":"'.$dat['landlord_state'].'","country":"'.$dat['landlord_country'].'","zip":"'.$dat['landloard_zip'].'"}';?>');


				"<?php }?>";

				$(".land").change(function(){
					if($(this).val() === ""){
						console.log("empty");
					}else{
						var json = JSON.parse(data[$(this).val() - 1]);
						street = json.street;
						city = json.city;
						state = json.state;
						country = json.country;
						zip = json.zip;
						$("#check")[0].click();
					}
					
				});

				$("#units").click(function(){

					check2 = $("#units").prop('checked');

					if(check2 === true){
						$(".gt").slideDown("slow");
					}else{
						$(".gt").slideUp("slow");
					}
				});


				$("#check").click(function(){

					check = $("#check").prop('checked');

				if(check === true && $('.land').val() != ""){
					$(".email").eq(1).val(street);
					$(".email").eq(2).val(city);
					$(".email").eq(3).val(state);
					$(".email").eq(4).val(country);
					$(".email").eq(5).val(zip);
				}else if(check === true && $('.land').val() == ""){
					$(".email").eq(1).val("");
					$(".email").eq(2).val("");
					$(".email").eq(3).val("");
					$(".email").eq(4).val("");
					$(".email").eq(5).val("");
				}else{
					$(".email").eq(1).val("");
					$(".email").eq(2).val("");
					$(".email").eq(3).val("");
					$(".email").eq(4).val("");
					$(".email").eq(5).val("");
				}

				});



			$('#fur').click(function(){
				fur = true;
				$("#ufur").prop('checked',false);
				ufur = $("#ufur").prop('checked');
				if(fur === true){
					fur = 1;
				}
				//test module
			});

			$('#ufur').click(function(){
				ufur = true;
				$("#fur").prop('checked',false)
				fur = $("#fur").prop('checked');
				if(ufur === true){
					ufur = 0;
				}
				//test module
			});




				// data.push("[<?php //echo "{'street':'{$dat['lanlord_street_address']}','city':'{$dat['landlord_city']}','state':'{$dat['landlord_state']}','country':'{$dat['landlord_country']}','zip':'{$dat['landloard_zip']}'}";?>]");
		});

	</script>
</body>

<?php }?>