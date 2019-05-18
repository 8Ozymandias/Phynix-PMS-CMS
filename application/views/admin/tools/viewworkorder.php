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
	width: 60%!important;
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
	width: 60%!important;
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
	width: 40%;
	padding: 0.8em!important;
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

      .dop{
      	width: 85%;
      	min-width:85%;
      	max-width: 85%;
      	min-height: 20px;
      	height: 20px;
      	max-height: 50px;
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

      td button{
      	width: 100%;
	padding: 0.5em!important;
	border-radius: 5px;
	box-shadow: 0px 0px 10px rgba(19,19,19,0.6);
	outline: none;
	border: none;
	background-color: white;
	color: #263238;
	font-weight: bolder;
	cursor: pointer;
      }

      td button:hover{
      	color: white;
        background-color: #81C784;
        transition: color 0.4s, background-color 0.4s;
      }



            .albox{
        position: absolute;
        width: 100%;
         /*height: 100%; */
        background-color: rgba(19, 19, 19, 0.9);
        z-index: 999;
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        align-items: center;
      }

      .alert{
        position: absolute;
        box-shadow: 0px 0px 8px rgba(255,255,255,0.5);
        background-color: #E0E0E0;
        z-index: 1000;
        display: flex;
        flex-flow: row wrap;
        width: 300px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;

        justify-content: center;
      }

      .alert h3{
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        background-color: #E65100;
		color: white;
        text-align: center;
        vertical-align: center;
        padding: 1em;
        font-size: 15px;
      }

      .alert div{
        width: 90%;
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        margin: 1em;
      }

      .alert input{
        width: 100%;
        background-color: transparent;
        border: none;
        /* border-bottom: 2px solid rgba(38,50,56 ,1); */
        color: #37474F;
        font-weight: bold;
        padding: 1em;
        cursor: pointer;
        margin: 1em;
        box-shadow: inset 0px 0px 10px rgba(19, 19, 19, 0.5);
      }


      .alert button{
        background-color: #E65100;
		color: white;
        border: none!important;
        cursor: pointer;
        font-weight: bold;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(19,19,19,0.6);
        outline: none;
        padding: 1em;
        /* margin: 1em; */
      }

      .alert .result{
        width: 100%;
        background-color: transparent;
        border: none;
        /* text-align: center; */
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom: 2px solid rgba(38,50,56 ,1);
        color: red;
        font-weight: bold;
        font-size: 10px;
        font-style: italic;
        padding: 1em;
        cursor: pointer;
        /* margin: 1em; */
        box-shadow: inset 0px 0px 10px rgba(19, 19, 19, 0.5);
      }
      .ext{
        position: absolute;
        top: 1px!important;
        right: 1px!important;
        cursor: pointer;
      }

        .pending_request{
      	background-color: #d50000;
      	box-shadow: 0px 0px 10 white;
      	border-radius: 100%;
      	padding:0.2em;
      	height: 3px;
      	width: 3px;
      	margin-right: 5%;
      	margin-left: 50%;
      	/*position: absolute;*/
      }

      .pending_start{
      	background-color: #F5F5F5; 
      	box-shadow: 0px 0px 10 white;
      	border-radius: 100%;
      	padding:0.2em;
      	height: 3px;
      	width: 3px;
      	margin-right: 5%;
      	margin-left: 50%;
      	/*position: absolute;*/
      }

      .inprogress{
      	background-color:#FFFF00;;
      	box-shadow: 0px 0px 10 white;
      	border-radius: 100%;
      	padding:0.2em;
      	height: 3px;
      	width: 3px;
      	margin-right: 5%;
      	margin-left: 50%;
      	/*position: absolute;*/
      }

      .complete{
      	background-color: #AED581;
      	box-shadow: 0px 0px 10 white;
      	border-radius: 100%;
      	padding:0.2em;
      	height: 3px;
      	width: 3px;
      	margin-right: 5%;
      	margin-left: 50%;
      	/*position: absolute;*/
      }


      	</style>
</head>
<body>
 <div class="albox" style="display: none;">
      <div class="alert">
        <h3>Select Date<img class="ext" src="<?php echo base_url('assets/ext.png');?>" width="30px" height="30px"/></h3>
        <div>
          <input class="pass" type="date" placeholder="(please enter account password)" autofocus=true />
          <button class="auth">Set Date</button>
          <!-- <button class="auth" style="display:none">Autenticate</button> -->
        </div>
        <p class="result"></p>
      </div>
    </div>
	<div class="saved" style="display:none">Saved Successfully!</div>
    <div class="fail" style="display:none">Failed to Save</div>
	<?php $this->load->view('segments/links'); $this->load->helper('loads');$session = $this->ses->userdata('user_session');?>

	<section class='account_summary'>
		<h1>Create Work Order</h1>
		<article>
		<select class="tenant">
			<option value="">Select Tenant</option>
			<?php autoPullFrom12();?>
		</select> 
		<input type="text" class="email" placeholder="worker full name (John Black)"/>
		<textarea class="dop" placeholder="descrption of problem"></textarea>
		<input type="number" class="email" placeholder="price"/>
		<button id="save" onclick="post();">Finish</button>
		
		</article>
		<p class="result"></p>
	</section>

	<section class="properties">
		<p class="r" style="display: none;"></p>
		<h1>Work Request<img src='<?php echo(base_url('assets/refresh1.png'));?>' width='30px' height='30px' class="ref"/></h1>
		<table>
			
			<tr class="coo">	
				<th>Tenant</th>
				<th>Date Created</th>
				<th>Problem Statement</th>
				<th>Image</th>
				<th>Review</th>
			</tr>

			<?php autoPull16();?>

		</table>
		<p class="results"><img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/></p>
		<script type="text/javascript">
			setTimeout(function(){
				$(".results").eq(0).html($(".r").eq(0).text());
			},1000);
			
			$('.ref').click(function(){
				$(this).attr('src','<?php echo(base_url('assets/pleasewait1.gif'));?>');
				setTimeout(function(){
					window.location.reload();
				},2000);
			});
		</script>
	</section>

	<section class="properties">
		<p class="r" style="display: none;"></p>
		<h1>In Progress<img src='<?php echo(base_url('assets/refresh1.png'));?>' width='30px' height='30px' class="ref"/></h1>
		<table>
			
			<tr class="coo">	
				<th>Tenant</th>
				<th>Person Assigned</th>
				<th>Price</th>
				<th>Date Created</th>
				<th>Start Date</th>
				<th>Status</th>
				<th>DOP</th>
				<th>Image</th>
				<th>Action</th>
			</tr>

			<?php autoPull13();?>

		</table>
		<p class="results"><img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/></p>
		<script type="text/javascript">
			setTimeout(function(){
				$(".results").eq(1).html($(".r").eq(1).text());
			},1000);
			
			$('.ref').click(function(){
				$(this).attr('src','<?php echo(base_url('assets/pleasewait1.gif'));?>');
				setTimeout(function(){
					window.location.reload();
				},2000);
			});
		</script>
	</section>

	<section class="properties">
		<p class="r" style="display: none;"></p>
		<h1>Completed<img src='<?php echo(base_url('assets/refresh1.png'));?>' width='30px' height='30px' class="ref"/></h1>
		<table>
			
			<tr class="coo">	
				<th>Tenant</th>
				<th>Person Assigned</th>
				<th>Price</th>
				<th>Date Created</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Status</th>
				<th>DOP</th>
				<th>Image</th>
				<th>Action</th>
			</tr>

			<?php autoPull14();?>

		</table>
		<p class="results"><img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/></p>
		<script type="text/javascript">
			setTimeout(function(){
				$(".results").eq(2).html($(".r").eq(2).text());
			},1000);
			
			$('.ref').click(function(){
				$(this).attr('src','<?php echo(base_url('assets/pleasewait1.gif'));?>');
				setTimeout(function(){
					window.location.reload();
				},2000);
			});
		</script>
	</section>

	<section class="properties">
		<p class="r" style="display: none;"></p>
		<h1>Work Transaction<img src='<?php echo(base_url('assets/refresh1.png'));?>' width='30px' height='30px' class="ref"/></h1>
		<table>
			
			<tr class="coo">	
				<th>Work Order Key</th>
				<th>Person Assigned</th>
				<th>Price</th>
				<th>Date Payed</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>View Receipt</th>
			</tr>

			<?php autoPull15();?>

		</table>
		<p class="results"><img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/></p>
		<script type="text/javascript">
			setTimeout(function(){
				$(".results").eq(3).html($(".r").eq(3).text());
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

		function post(){

			var worker = $(".email").eq(0).val();
			var price = $(".email").eq(1).val();
			var dop = $(".dop").val();
			var tenant = $(".tenant").val();

			$(".result").html("<img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/>");
			$.post("<?php echo site_url('Home/createOrder');?>",{worker:worker,price:price,dop:dop,tenant:tenant},function(result){
				setTimeout(function(){
				$(".result").html(result);
			},2000);
			});
				
		}
		var key = "";

		$("document").ready(function(){

			$("td > button").click(function(){
				key = $(this).attr("id");

				$(".albox").css("height",$(window).height()+"px");
    			$(".albox").fadeIn(1000);
				$("html").css("overflow","hidden");
				$(".pass").val("");
    			$(".pass").focus();
			});

			$(".ext").click(function(){
      $(".albox").fadeOut(1000);
      $("html").css("overflow-y","scroll");
      //$(".res").css("color","rgba(176,190,197 ,1)");
        //$(".res").html("Please Recheck Before you save");
    }).hover(function(){
      $(this).attr("src","<?php echo base_url('assets/extg.png');?>").fadeIn(1000);
    }).mouseleave(function(){
      $(this).attr("src","<?php echo base_url('assets/ext.png');?>").fadeIn(1000);
    });


    $(".auth").click(function(){
    	var date = $(".pass").val();

    	$(".result").eq(0).html("<img src='<?php echo(base_url('assets/pleasewait1.gif'));?>' width='30px' height='30px'/>");
			$.post("<?php echo site_url('Home/updateStart');?>",{date:date,key:key},function(result){
				setTimeout(function(){
				$(".result").eq(0).html(result);
			},2000);
			});
    });
		});

	</script>
</body>

<?php }?>