<?php
function GetLine($coords, $v1, $v2) {
	if ($v1 == $v2) {
		$coords[$v1] += 1;
		return $coords;
	}
	
	/*
		add in counter for y1 to y2 and vice versa
		perform nutty for loop here
	*/
	
	return $coords;
}

function GetInputs() {
	$file_name = "day5-inputs.txt";
	$file = fopen($file_name, "r") or die("Unable to open file!");
	$inputs = explode("\n", fread($file, filesize($file_name)));
	fclose($file);
	
	$x_cords = array();
	$y_cords = array();
	
	foreach($inputs as $input) {
		$split = explode("->", $input);
		$x1 = (int) explode(",", $split[0])[0];
		$y1 = (int) explode(",", $split[0])[1];
		$x2 = (int) explode(",", $split[1])[0];
		$y2 = (int) explode(",", $split[1])[1];
		
		if ($x1 == $x2) {
			$x_cords[$x1] += 1;
			$y_cords = GetLine($y_cords, $y1, $y2);
		}
		if ($y1 == $y2) {
			$y_cords[$y1] += 1;
			$x_cords = GetLine($x_cords, $x1, $x2);
		}
		
	}
	var_dump($x_cords);
	var_dump($y_cords);
}

GetInputs();

?>