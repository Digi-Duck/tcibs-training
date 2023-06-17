<?php
$base = $_POST['file'];
$name = 'img.png';
$path = '/img/img.png';

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'. $name .'"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: '.filesize($path));

ob_clean();
flush();

readfile($path);


header('Location: 19(X).php');
exit;

?>