<?php
$url = $_GET['url'];
$id = !empty($_GET['id']) ? $_GET['id'] : null;

$image = exec("..\\phantomjs.exe capture.js $url $id");
header("Content-type: image/png");
header("Content-Disposition: attachment; filename='image.png'");
readfile($image);
unlink($image);

?>