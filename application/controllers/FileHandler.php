<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileHandler extends CI_Controller {

	public function createDirectory(){

		$this->load->model("Authentication","auth02");
		$this->load->model("Fhandler","fh");

		$folderName = $this->input->post("fname",true);
		$folderName = strtolower($this->auth02->sanitizeInput($folderName));

		$tf = $this->fh->createDir($folderName);

		if($tf == true){

			if(!is_dir('uploads/'.$folderName)){
				mkdir('uploads/'.$folderName,0777,TRUE);
			}

			echo "<script> $('.saved').html('Folder Created Successfully').fadeIn(1000).fadeOut(2000);</script>";
		}else{
			echo "<script> $('.fail').html('Folder Exist Already').fadeIn(1000).fadeOut(2000); setTimeout(function(){
				location.reload();
			},2000);</script>";
		}
	}

	public function delFolder(){
		$this->load->model("Authentication","auth02");
		$this->load->model("Fhandler","fh");

		$fid = $this->input->post("id",true);
		$fid = $this->auth02->sanitizeInput($fid);
		$folderName = $this->input->post("fname",true);
		$folderName = strtolower($this->auth02->sanitizeInput($folderName));

		if(!ctype_digit($fid)){
			echo "Only Digits are allowed";
		}else{
			$tf = $this->fh->deleteFolder($fid);

			if($tf == true){
				//echo $folderName;
				if(is_dir('uploads/'.$folderName)){
					rmdir('uploads/'.$folderName);
				echo "<script> $('.saved').html('Folder deleted Successfully').fadeIn(1000).fadeOut(2000); $('#{$fid}').parent().remove();</script>";
			}else{
				echo "<script> $('.fail').html('folder doesnt exist!').fadeIn(1000).fadeOut(2000);</script>";
			}
			}else{
				echo "<script> $('.fail').html('failed to delete folder').fadeIn(1000).fadeOut(2000); </script>";
			}
		}

		
	}

	public function loadFiles(){
		$this->load->model("Authentication","auth02");
		$this->load->model("Fhandler","fh");
		$dirName = $this->input->post('arr',true);
		$dirName = $this->auth02->sanitizeInput(strtolower($dirName));

		$map = $this->fh->folderLoop($dirName);
 

 		$keys = array();

		foreach($map as $col => $val){
			$dirName = str_replace(" ", "%20",$dirName);
			$val = site_url("uploads/".$dirName."/").$val;
			$keys += [$col => $val];
			//map each file from the db with the id as the main linking and then display it as a link to show to the user based on the file type
		}

		echo json_encode($keys,JSON_UNESCAPED_SLASHES);
	}

	public function renameFolder(){
		$this->load->model("Authentication","auth02");
		$this->load->model("Fhandler","fh");
		$newDirName = $this->input->post('newfile',true);
		$oldDirName = $this->input->post('oldfile',true);

		$newDirName = $this->auth02->sanitizeInput($newDirName);
		$oldDirName = $this->auth02->sanitizeInput($oldDirName);

		$newDirName = strtolower($newDirName);
		$oldDirName = strtolower($oldDirName);

		if(empty($newDirName) || empty($oldDirName)){
			echo "Directry name cannot be empty";
		}else{

		if(file_exists('uploads/'.$oldDirName)){
			if(file_exists('uploads/'.$newDirName)){
				echo "Directory already exist";
			}else{
				$success = rename('uploads/'.$oldDirName, 'uploads/'.$newDirName);
				if($success == true){
					$success = $this->fh->renameFolder($oldDirName,$newDirName);
					if($success == true){
						echo "file rename successfully!";
					}else{
						echo "failed to rename directory in the database!";
					}
				}else{
					echo "failed to rename directory!";
				}
			}
		}else{
			echo "Directory you are trying to rename doesn't exist ";
		}
	}


	}

	public function uploadFile(){
		$this->load->model("Authentication","auth02");
		$this->load->model("Fhandler","fh");
		$foldername = $this->input->post("foldername",true);
		if(!ctype_digit($foldername)){
			echo "your file name is invalid!";
		}else{
			$bool = $this->fh->selectFolder($foldername);
			if($bool != false){
				if(($_FILES['upl']['name'] != "") && !empty($foldername)){
			$output = 0;
			$config['upload_path'] = './uploads/'.$bool."/";
			$config['allowed_types'] = "pdf|jpf|docx|mp4|avi|csv|psd|png|doc|pps|ppt|xls|xlsx|txt|rtf";
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			for($count = 0; $count<count($_FILES['upl']['name']); $count++){
				$_FILES['file']['name'] = $_FILES['upl']['name'][$count];
				$_FILES['file']['type'] = $_FILES['upl']['type'][$count];
				$_FILES['file']['tmp_name'] = $_FILES['upl']['tmp_name'][$count];
				$_FILES['file']['error'] = $_FILES['upl']['error'][$count];
				$_FILES['file']['size'] = $_FILES['upl']['size'][$count];
				if($this->upload->do_upload('file')){
					$data = $this->upload->data();
					$res = $this->fh->uploadFiles($data['file_name'], $foldername,$data['file_size']);
				}
				$output++;
			}

			if($res = true){
				echo "<script>$('.saved').html('Uploaded {$output} file successfully!').fadeIn(1000).fadeOut(2000)</script>";
				echo "Uploaded Successfully!";
			}else{
				echo "<script>$('.failed').html('Failed to upload files').fadeIn(1000).fadeOut(2000)</script>";
				echo "file upload wasn't successful";
			}
		}else{
			echo "please choose a file to upload or select a folder, create one if non exist!";
		}
			}else{
				echo "the folder you are trying upload to doesn't exist!";
			}
		
	}
	}
	
}

?>