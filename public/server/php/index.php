<?php
$options =[];
// if(isset($_POST['folder_id'])){
// 	$folder = $_POST['folder_id'];
// 	$pathToFolder = '../../../public/garageSale/'.$folder.'/';
// 	$pathToFolderUrl = "http://$_SERVER[HTTP_HOST]/garageSale/$folder/";

// 	//create folder
// 	if (!file_exists($pathToFolder)) {
// 	    mkdir($pathToFolder, 0777, true);
// 	}

// }else{
// 	$folder = '';
// }

// $options = [
// 	'upload_dir' => $pathToFolder,
// 	'upload_url' => $pathToFolderUrl
// ];


error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$upload_handler = new UploadHandler($options);
