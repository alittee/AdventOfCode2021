<?php

function GetIndex($axis, $const, $value) {
  return ($axis == 'x') ? $const . ',' . $value : $value . ',' . $const;
}

function GetLine($coords, $axis, $const, $v1, $v2) {
	if ($v1 == $v2) {
	  $index = GetIndex($axis, $const, $v1);
		$coords[$index] += 1;
		return $coords;
	}
	
	$xy1 = ($v1 > $v2) ? $v1: $v2;
	$xy2 = ($v1 > $v2) ? $v2: $v1;
	
	while ($xy1 > $xy2) {
    $index = GetIndex($axis, $const, $xy2);
		$coords[$index] += 1;
		$xy2++;
	}
	
	return $coords;
}

function GetCords($inputs) {
	$cords = array();
	
	foreach($inputs as $input) {
		$split = explode("->", $input);
		
		$left = trim($split[0]);
		$right = trim($split[1]);
		
		$x1 = (int) explode(",", $split[0])[0];
		$y1 = (int) explode(",", $split[0])[1];
		$x2 = (int) explode(",", $split[1])[0];
		$y2 = (int) explode(",", $split[1])[1];
		
		if ($x1 == $x2) {
	    $cords[$]
		}
		if ($y1 == $y2) {
		  
		}
	}
	var_dump($cords);
}

function GetInputs() {
	//$file_name = "day5-inputs.txt";
	//$file = fopen($file_name, "r") or die("Unable to open file!");
	//$inputs = explode("\n", fread($file, filesize($file_name)));
	//fclose($file);
	
	return $inputs = ["0,9 -> 5,9","8,0 -> 0,8","9,4 -> 3,4","2,2 -> 2,1","7,0 -> 7,4","6,4 -> 2,0","0,9 -> 2,9","3,4 -> 1,4","0,0 -> 8,8","5,5 -> 8,2"];
}

$inputs = GetInputs();
GetCords($inputs);
?>
