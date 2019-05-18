<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fhandler extends CI_Model{

	public function createDir($dirName){
		$systemUser = $this->ses->userdata('user_session');
		$today = date("y-m-d");
		$dirName = strtolower($dirName);

		$doesFolderExist = $this->db->query("Select * from `admin_folders` where `folder_name`='$dirName'");

		if($doesFolderExist->num_rows() > 0 ){
			return false;
		}else{
			$createFolder = $this->db->query("Insert into `admin_folders` (`folder_name`,`date_created`,`who_created`) values('$dirName','$today','$systemUser')");

			if($createFolder == true){

				return true;
			}else{
				return false;
			}
		}
	}

	public function deleteFolder($folderID){
		$doesFolderExist = $this->db->query("Select * from `admin_folders` where `folderID`='$folderID'");
		if($doesFolderExist->num_rows() > 0 ){
			$delu = $this->db->query("Delete from `admin_folders` where `folderID`='$folderID'");

			if($delu == true){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	public function selectFolder($folderID){
		$doesFolderExist = $this->db->query("Select * from `admin_folders` where `folderID`='$folderID'");
		if($doesFolderExist->num_rows() > 0 ){
			$res = $doesFolderExist->row_array();
			return $res['folder_name'];
		}else{
			return false;
		}
	}


	public function folderLoop($directoryname){
		$this->load->helper('directory');
		$directoryname = strtolower($directoryname);
		$map = directory_map('./uploads/'.$directoryname,1);
		return $map;
	}

	public function renameFolder($old, $new){
		$old = strtolower($old);
		$new = strtolower($new);

		$doesFolderExist = $this->db->query("Select * from `admin_folders` where `folder_name`='$old'");
		$doesFolderExists = $this->db->query("Select * from `admin_folders` where `folder_name`='$new'");

		if($doesFolderExist->num_rows() > 0 ){
			if($doesFolderExists->num_rows() > 0 ){
				return false;
			}else{
				$renamefolder = $this->db->query("Update `admin_folders` set `folder_name`='$new' where `folder_name`='$old'");
				if($renamefolder == true){
					return true;
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
	}

	public function uploadFiles($filename, $folder_id, $file_size){
		$systemUser = $this->ses->userdata('user_session');
		$today = date("y-m-d");
		$upfile = $this->db->query("insert into `file_upload` (`file_name`,`date_added`,`folderID`,`userID`,`file_size`) values('$filename','$today','$folder_id','$systemUser','$file_size')");

		if($upfile == true){
			return true;
		}else{
			return false;
		}
	}


}
?>