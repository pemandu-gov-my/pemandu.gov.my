<?php
$search = $_GET['url'];
$replace = '';
$subject = $_GET['file'];
$file_path= str_replace($search, $replace, $subject);
$file = $file_path;

if((!preg_match('/^http\:\/\/.+?\.pdf/i', $file) ||
preg_match('/(\.\.\/|.+?.php$)/i', $file)))
die('Invalid request');

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}
?>
