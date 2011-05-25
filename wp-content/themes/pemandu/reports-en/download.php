<?php
$filename = $_GET['filename']; 
$file = explode('.', $filename);
$fullPath = $_GET['file'];
if($file[1] != 'pdf') 
die('Could not download selected file.'); 
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment; filename=".basename($filename).";");
header("Content-Length: ".filesize($filename));
readfile("$filename"); 
exit();
?>