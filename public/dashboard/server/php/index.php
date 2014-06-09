<?php
// function get_full_url() {
//     $https = !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0;
//     return
//         ($https ? 'https://' : 'http://').
//         (!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
//         (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
//         ($https && $_SERVER['SERVER_PORT'] === 443 ||
//         $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
//         substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
// }

// if(isset($_POST['folder_id'])){
// 	$folder = $_POST['folder_id'];
// 	$pathToFolder = '/garageSale/'.$folder.'/';
// 	$pathToFolderUrl = '/garageSale/'.$folder.'/';

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

// $options = [
//   'upload_dir' => 'test/files/',
//   'upload_url' => get_full_url().'/test/files/',
// ];

echo '<pre>';
var_dump($_POST);
echo '</pre>';

if(isset($_POST['folder_id'])){
	$folder = $_POST['folder_id'];
	$pathToFolder = '../../../garageSale/'.$folder.'/';
	$pathToFolderUrl = '/garageSale/'.$folder.'/';

	//create folder
	if (!file_exists($pathToFolder)) {
	    mkdir($pathToFolder, 0777, true);
	}

}else{
	$folder = '';
}

$options = [
	'upload_dir' => $pathToFolder,
	'upload_url' => $pathToFolderUrl
];


error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$upload_handler = new UploadHandler($options);