<?php

function GetIndex($axis, $const, $value) {
  return ($axis == 'x') ? $const . ',' . $value : $value . ',' . $const;
}

function GetLine($cords, $axis, $const, $v1, $v2) {
	if ($v1 == $v2) {
	  	$index = GetIndex($axis, $const, $v1);
		$cords[$index] += 1;
		return $cords;
	}
	
	$xy1 = ($v1 > $v2) ? $v1: $v2;
	$xy2 = ($v1 > $v2) ? $v2: $v1;
	
	while ($xy1 >= $xy2) {
    	$index = GetIndex($axis, $const, $xy2);
		$cords[$index] += 1;
		$xy2++;
	}
	
	return $cords;
}

function GetDiag($cords, $x1, $x2, $y1, $y2) {
	$diff = abs($x1 - $x2);
	$count = 0;
	
	$xv1 = $x1;
	$yv1 = $y1;
	
	while ($count <= $diff) {
		$left = $xv1 . ',' . $yv1;
		
		$cords[$left] += 1;
		
		$xv1 = ($x1 > $x2) ? $xv1 - 1 : $xv1 + 1;
		$yv1 = ($y1 > $y2) ? $yv1 - 1 : $yv1 + 1;	
		
		$count++;
	}
	
	return $cords;
}

function GetCords($inputs) {
	$cords = array();
	
	foreach($inputs as $input) {
		$split = explode("->", $input);
		
		$some = array();
		
		$left = trim($split[0]);
		$right = trim($split[1]);
		
		$x1 = (int) explode(",", $split[0])[0];
		$y1 = (int) explode(",", $split[0])[1];
		$x2 = (int) explode(",", $split[1])[0];
		$y2 = (int) explode(",", $split[1])[1];
		
		if ($x1 == $x2) {
	    	$some = GetLine($cords, 'x', $x1, $y1, $y2);
		} else if ($y1 == $y2) {
			$some = GetLine($cords, 'y', $y1, $x1, $x2);
		} else {
			$some = GetDiag($cords, $x1, $x2, $y1, $y2);
		}
		
		$cords = array_merge($cords, $some);
	}

	return $cords;
}

function GetResults($cords) {
	$count = 0;
	foreach ($cords as $cord) {
		if ($cord >= 2) {
			$count++;
		}
	}
	return $count;
}

function GetInputs() {
	$file_name = "day5-inputs.txt";
	$file = fopen($file_name, "r") or die("Unable to open file!");
	$inputs = explode("\n", fread($file, filesize($file_name)));
	fclose($file);
	
	return $inputs;
}

$inputs = GetInputs();
$cords = GetCords($inputs);
var_dump(GetResults($cords));
?>
