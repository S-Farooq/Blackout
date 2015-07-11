<?php
	# Enable Error Reporting and Display:
	error_reporting(~0);
	ini_set('display_errors', 1);
	
	
	
	$url = $_POST["canvasLink"];
	$html = file_get_contents($url);
	$arr =  explode(" ", $html);
	$result='';
	$flag = 0;
	//print all the value which are in the array
	foreach($arr as $v){
		if (strpos($v, "<p" ) !== false){
			$flag = 1;
		}
		else if (strpos($v, "</p>" ) !== false){
			$flag = 0;
		}
		
		if ($flag == 1) $result = $result.$v." ";
		
		
	}
	$arr =  explode(" ", strip_tags($result));
	$output = '';
	$i = 0;
	foreach($arr as $v){
		$output = $output.$v.' ';
		$i++;
		
		
	}
	// $result = '';
	// if (preg_match_all("%(<p[^>]*>(.*)?</p>)%i", $html, $regs)) {
		// for ($i=0;$i < count($regs); $i++) {
				// #echo count($regs);
				// $result = $result."Next<br />".$regs[1][$i];
		// }
		// #$result = $regs[1];
		
	// } else {
		// $result = "";
	// }

	echo $output;

?>
