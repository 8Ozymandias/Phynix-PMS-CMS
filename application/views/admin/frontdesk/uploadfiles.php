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
	width: 80%!important;
	margin: 2em!important;
	border-radius: 10px;
	box-shadow: inset 0px 0px 10px rgba(19,19,19,0.6);
}

.account_summary article{
	width: 100%;
	display: flex;
	/*padding: 1em!important;*/
	flex-flow: row wrap!important;
	justify-content: flex-start!important;
	margin: 2em;
	background-color:#BDBDBD;
	height: 330px!important;
	overflow-y: scroll;
}

.account_summary article input{
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

.account_summary .options{
	display: flex!important;
	width: 100%!important;
	justify-content: center;
	padding: 0.5em;
}

.account_summary article .folders{
	display: flex!important;
	width: 100px!important;
	height: 100px!important;
	justify-content: center;
}

.account_summary article .folders p{
	width: 100%!important;
}
.account_summary .options p{
	display: flex!important;
	width: 10%!important;
	justify-content: center;
	height: inherit;
	margin: 0.3em!important;
}

.account_summary .options:hover{
	background-color: #263238;
	color: white;
	transition: background-color 0.4s, color 0.4s;
}

.account_summary .options p:hover{
	background-color: #E65100;
	color: white;
	transition: background-color 0.4s, color 0.4s;
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

      .fname{
	border-bottom: 1px solid rgba(0,0,0,.2);
  	border-top: none;
  	border-left: none;
  	border-right: none;
  	background-color: rgba(0, 0, 0, 0.1);
  	color: #E65100;
  	width:20%;
  	padding: 0.5em;
  	/*margin: 1em;*/
  	box-shadow: inset 0px 0px 5px rgba(0,0,0,0.9);
  	outline-color:#E65100;

}

#up{
	border-bottom: 1px solid rgba(0,0,0,.2);
  	border-top: none;
  	border-left: none;
  	border-right: none;
  	background-color: rgba(0, 0, 0, 0.1);
  	color: #E65100;
  	width:20%;
  	padding: 0.5em;
  	/*margin: 1em;*/
  	box-shadow: inset 0px 0px 5px rgba(0,0,0,0.9);
  	outline-color:#E65100;

}

.folders ul{
	z-index: 1000;
	background-color: #F5F5F5;
	display: flex;
	flex-flow: row wrap;
	margin-top: -50px;
	margin-left: 50px;
}
.folders ul li{
	background-color: #F5F5F5;
	color: #263238;
	font-weight: bolder;
	font-size: 13px;
	display: flex;
	width: 100%;
	padding: 0.5em;
	border-bottom: 2px solid #455A64;
}

.folders ul li:hover{
	background-color: #E65100;
	color: white;
	transition: background-color 0.4s, color 0.4s;
}

#progressWrap{
	background-color: inherit!important;
	box-shadow: inset 0px 0px 10px rgba(10,10,10,0.5);
	width: 400px!important;
	height: 40px!important;
	padding: 0px!important;
	display: flex;
	align-items: center;
	padding: 0.2em!important;
	margin: 0px!important;
	margin-top: 2%!important;
}
#progressBar{
	position: absolute;
	background-color: #E65100;
	width: 0px;
	height: 40px;
	margin: 0px!important;
}

#progress{
	padding: 0px!important;
	background-color: transparent!important;
	color: white;
	z-index: 1000;
	margin-left: 45%!important;
	margin-top: 6%!important;
	text-shadow: 0px 0px 10px rgba(10,10,10,0.5);
}
select{
	border-bottom: 1px solid rgba(0,0,0,.2);
  	border-top: none;
  	border-left: none;
  	border-right: none;
  	background-color: rgba(0, 0, 0, 0.1);
  	color: #E65100;
  	width: 15%;
  	box-shadow: inset 0px 0px 5px rgba(0,0,0,0.9);
  	outline-color:#E65100;

}

/*Setting up the folder open section*/

#backg{
	position: fixed;
	background-color: rgba(10,10,10,0.7);
	width:100%;
	height: 100%;
	z-index: 3000;
	display:flex;
	flex-flow: row wrap;
	justify-content: center;
	align-items: center;
	padding: 0px!important;
	margin: 0px!important;
}

.headers{
	width: 100%!important;
	padding: 0px!important;
	background-color: #424242;
	display: flex;
	flex-flow: row wrap;
	justify-content: space-between;
	margin: 0px!important;
	align-items: center;
}

.headers div{
	padding: 0px!important;
	margin: 0px!important;
	color: white!important;
	font-weight: bolder;
	width: 30%;
	display: flex;
	flex-flow: row wrap;
	align-items: center;

}
.headers input{
	border-bottom: 1px solid rgba(0,0,0,.2);
  	border-top: none;
  	border-left: none;
  	border-right: none;
  	background-color: rgba(0, 0, 0, 0.1);
  	color: #E65100;
  	width: 100%;
  	padding: 0.5em;
  	margin: 1em;
  	box-shadow: inset 0px 0px 5px rgba(0,0,0,0.9);
  	outline-color:#E65100;
}

.files_in_folder{
	width: 70%;
	height: 550px;
	background-color: #EEEEEE;
	padding: 0px!important;
	margin: 0px!important;
}

#close{
	justify-content: flex-end;
}

.allfiles{
	width: 100%;
	display: flex;
	flex-flow: row warp;
	height: 500px;
	overflow-y: scroll;
	overflow-x: hidden;
	/*justify-content: flex-start!important;*/
}

.afile{
	margin: 10px;
	padding: 0.5em!important;
	background-color: #424242;
	border-radius: 5px;
	width: 10%;
	box-shadow: inset 0px 0px 10px rgba(10,10,10,0.5);
	display: flex;
	justify-content: center;
	flex-flow: row wrap;
	color: white;
	height: 120px;
	font-weight: bolder;
}

.afile p{
	width: 100%;
	font-size: 12px;
	font-style: italic;
	text-align: center;
}

.afile .dl{
	padding: 0.3em;
	background-color: #4CAF50;
	margin: 5px;
	border-radius: 5px;
	height: 30px;
	width: 30px;
	box-shadow: inset 0px 0px 10px rgba(10,10,10,0.5);
}

.afile .dl:hover{
	background-color: #388E3C;
	transition: background-color 0.4s;
}

.afile .dt:hover{
	background-color: #d32f2f;
	transition: background-color 0.4s;
}


.afile .dt{
	padding: 0.3em;
	height: 30px;
	width: 30px;
	background-color: #f44336;
	margin: 5px;
	border-radius: 5px;
	box-shadow: inset 0px 0px 10px rgba(10,10,10,0.5);
}

#ext{
	cursor: pointer;
	top: 12%;
	margin: 0px!important;
	position: fixed!important;
	padding: 0.1em;
	/*box-shadow: 0px 0px 5px rgba(255,10,10,0.5);
	border-radius: 100%;*/
}
.createFolder , .ufiles{
	background-color: inherit;
	border: 0.5px solid #E65100;
	font-size: 12px;
	font-style: italic;
	text-align: center;
	color: white;
	text-shadow: 0px 0px 10px rgba(10,10,10,0.5);
	cursor: pointer;
	width: 10%;
}
      	</style>
</head>
<body>
	<div class="saved" style="display:none">Saved Successfully!</div>
    <div class="fail" style="display:none">Failed to Save</div>
    <div id="backg" style="display: none;">
    <div class="files_in_folder">
    	<div class="headers">
    		<div>
			<img src="<?php echo base_url('assets/folder.png');?>" width="50px" height="50px"/>|
    		<p class="folderN">My Documents</p>
			</div>
			
    		<div>
    			<input type="search" name="" placeholder="search" />
    		</div>
			<div id="close">
    		<img src="<?php echo base_url('assets/extg.png');?>" width="30px" height="30px" id="ext"/>
    		</div>
    	</div>
    	<article class="allfiles">
    	</article>
    	
    </div>
    </div>
	<?php $this->load->view('segments/links'); $this->load->helper('loads');$session = $this->ses->userdata('user_session');?>
	<section class='account_summary'>
		<h1 class="uploadpath" ">File Uploads | path-> <?php echo "./uploads/";?></h1>
		<img src="<?php echo base_url('assets/loading.png');?>" width='0px' height='20px' id='oo'/>

		<div class="options">
			<!-- Creating folders -->
			<input type="text" placeholder="Folder Name" class="fname"/>
			<button class="createFolder" onclick="cf();">Create Folder</button>
			<!-- Uploading files -->
			<input type="file" name="upl" id="up" multiple />
			
			<select class="folder_name" onchange="upd();">
				<option value="">Select upload folder</option>
				<?php folders();?>
			</select>
			<button class="ufiles" >Upload Files</button>

			<div id="progressWrap">
				<p id="progress">0%</p>
				<div id="progressBar"></div>
			</div>
		</div>
		<article class="d">
			<?php loadFolders();?>
		</article>
		<p class="result">
			
		</p>
	</section>



</body>



<script type="text/javascript">



	var clickCount = $('.folders').length;

	
	function cf(){
		let foldername = $('.fname').val();
		if(foldername === ""){
			alert("folder name cannot be empty");
		}else{

			setTimeout(function(){
				$('.d').append('<div class="folders"><img src="<?php echo base_url('assets/folder.png')?>"  width="50px" height="50px"/> <p class"name">'+foldername+'</p></div>');
			$(".folders").eq(clickCount).hide().fadeIn(1000);
			clickCount++;
			},3000);
			

			$.post("<?php echo site_url("FileHandler/createDirectory");?>",{fname:foldername},function(data){
				$(".result").html(data);
			});
		}
	}

	function options(num){

		$("#"+num).fadeIn(1000).mouseleave(function(){
			$(this).fadeOut(1000);
		});
	}

	function opn(val){
		$(".folderN").text(val.toUpperCase());
		$("#backg").fadeIn(1000);
		$(".afile").remove();
		var cool = new Array();
		$.ajax({
			url: "<?php echo site_url("FileHandler/loadFiles");?>",
			type: "POST",
			dataType: "json",
			data: {'arr':val},
			success: function(data){
				for(x = 0; x < data.length; x++){
					var filename = "<?php echo base_url('assets/') ?>";

					var extension = data[x].split('.').pop().toLowerCase();
					var fname = data[x].split('assets/').pop().toLowerCase();
					
					if(extension === "docx" || extension === "doc"){
						filename+="docx.png";
					}else if(extension === "xlsx" || extension === "xls"){
						filename+="xlsx.png";
					}else if(extension === "pdf"){
						filename+="pdf.png";
					}else if(extension === "txt"){
						filename+="txt.png";
					}else if(extension === "jpeg" || extension === "jpg"){
						filename+="jpeg.png";
					}else if(extension === "mp4" || extension === "avi"){
						filename+="video.png";
					}else if(extension === "csv"){
						filename+="csv.png";
					}else{
						filename+="DEFAULT.png";
					}

					$(".allfiles").append("<div class='afile'><img src='"+filename+"' width='50px' height='50px'/>"+
    				"<p class='filename'>"+fname+"</p>"+
    		"<a href='"+data[x]+"' target='_BLANK' class='dl'><img src='<?php echo base_url('assets/download.png');?>' width='30px' height='30px'></a>"+
    		"<a href='#' target='_BLANK' class='dt'><img src='<?php echo base_url('assets/delete.png');?>' width='30px' height='30px'></a></div>");

				}
			}
		});
	}
	
	function pro(val){
	
	}
	
	function mve(val){
	
	}
	
	function ren(val1){
		let p = $('#'+val1);
		let data  = p.text();	
		data = data.toLowerCase(); //SAVING DATA IN A VARIABLE FOR FUTURE USE

		p.html("<textarea class='temp'>"+data+"</textarea>");


		$('.temp').mouseleave(function(){
			
				var datas = $('.temp').val();
			p.html(datas.toLowerCase());
			$.post("<?php echo site_url("FileHandler/renameFolder");?>",{newfile:datas,oldfile:data},function(result){
				$('.result').html(result);
			});
		
			
		});
		}

	function del(val1,val2){
		//var name = $('.name').eq(val2).val();
		//alert(val2);
		let yN = confirm("Are you sure you want to delete this folder ?");
		if(yN === true){
			$.post("<?php echo base_url('FileHandler/delFolder');?>",{id:val1,fname:val2},function(data){
			$(".result").html(data);
		});
		}else{
			$('.result').html("no changes made!");
		}
		
	}

	function upd(){
			if($(".folder_name option:selected").val() === ""){
				$(".uploadpath").html("File Uploads | path-> ./uploads/");
			}else{
				$(".uploadpath").html("File Uploads | path-> ./uploads/"+$(".folder_name option:selected").text());
			}

	}

	$('document').ready(function(){

		$("#ext").click(function(){
			$("#backg").fadeOut(1000);
		});
		
		
		$('.ufiles').click(function(){
			var foldername  = $(".folder_name").val();
			//console.log(foldername);
			var files = $('#up')[0].files;
			if($("#up").val() === "" || foldername === ""){
				alert("Please Choose a file and a folder to upload to");
			}else{

			
			var error = '';
			var form_data = new FormData();
			for(var count = 0; count <files.length; count++){
				var name = files[count].name;
				var extension = name.split('.').pop().toLowerCase();
				if($.inArray(extension, ['pdf','jpf','docx','mp4','avi','csv','psd','png','doc','pps','ppt','xls','xlsx','txt','rtf']) == -1){
					error += "Invalid "+ count + " Image File";
				}else{
					form_data.append("upl[]",files[count]);
					form_data.append('foldername',foldername);
				}
			}



			if(error == ''){

				$.ajax({
					url: "<?php echo base_url('FileHandler/uploadFile');?>",
					method: "POST",
					data: form_data,
					 xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress',progress, false);
                }
                return myXhr;
        },
					contentType: false,
					cache: false,
					processData: false,
   				beforeSend:function(){
					$(".result").html("File upload in progress please wait...");
				},
        		complete: function(xhr) {
            		$(".result").html(xhr.responseText);
            		$("#progressBar").css("width","0px");
            		$("#up").val('');
            		$("#progress").html("0%");
        		}

				});

			}else{
				alert(error);
			}
		}
		});
	});


	function progress(e){

    if(e.lengthComputable){
        var max = e.total;
        var current = e.loaded;
        var percent = (event.loaded / event.total) * 100;
        var Percentage = (Math.round(percent) / 100) * 400;
        
        $("#progress").html(Math.round(percent)+"%");
        $("#progressBar").css("width",Percentage+"px");


        if(Percentage >= 100)
        {
           console.log("file uploaded Successfully!");'' 
        }
    }}  


	//to prevent user from access the js files all you need to do is to target the button and let it trigger a different event like reload and so forth

</script>

<?php }?>
