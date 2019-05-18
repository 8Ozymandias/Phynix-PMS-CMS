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
	<script type="text/javascript" src="<?php echo(base_url('js/jquery-3.1.0.js'));?>"></script>
	<script type="text/javascript" src="<?php echo(base_url('js/jquery-ui.js'));?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/reports.css'); ?>" type="text/css" />
	<title>Admin Panel</title>
</head>


<body>
  <section class="main_bill_area">
<!--      <p class="water">RE/MAX RG</p>-->
      <article class="sec">
      <header><p>Name: Jordaine Gayle</p> <p>Billing Period: 12/10/2018 - 01/10/2019</p></header>

      <article class="secbody">
          <div class="bill_details">
              <p>Due Date: Sepptember 10, 2018</p>
              <p>Amount Due: $12,000</p>
              <p>Days Left on Lease: 13 days</p>
              <p>Property: West Village</p>
          </div>

          <div class="btns">
            <button>Save</button>
            <button>Print</button>
          </div>

      </article>
          <div class="cde">RE/MAX Realty Group - 876-953-9000 - www.remaja.com<br/><em>37 Shopping Village Rosehall, Montego Bay, St. James</em><br/><em>"outstadning agents; outstanding results"</em></div>
      </article>
  </section>
</body>
</html>

<script type="application/javascript">
    $("document").ready(function(){
        $(".main_bill_area").click(function(){
            $(window).print();
        });
    });
</script>
<?php }?>
