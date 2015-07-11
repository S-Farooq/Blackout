<?php
//$url = $_GET['url'];
//$id = !empty($_GET['id']) ? $_GET['id'] : null;
$html = $_POST['html'];
$width = $_POST['width'];
$height = $_POST['height'];
$scroll = $_POST['scroll'];

$myfile = 'testfile.html';

file_put_contents($myfile,'<!DOCTYPE html><html lang="en">'.$html.'</html>');


//echo $html;

// //exec("phantomjs.exe capture.js $url $id", $output, $return);
Proc_Close (Proc_Open ("phantomjs capture.js http://localhost/Blackout/testfile.html camera $width $height $scroll &", Array (), $foo));
echo "DOne".$scroll." ".$width." ".$height;
// Return will return non-zero upon an error
// if (!$return) {
    // echo "PNG Created Successfully";
// } else {
    // echo "PNG not created";
// }

// $image = exec("phantomjs.exe capture.js $url $id");
// $im = imagecreatefrompng("image.png");
// header("Content-type: image/png");
// imagepng($im);
// imagedestroy($im);

//header("Content-Disposition: attachment; filename='image.png'");
//readfile($image);
//unlink($image);

?>