<?php

function GetInputs() : array 
{
	$file = fopen("day8-inputs.txt", "r") or die("Unable to open file!");
	$lines = explode("\n", fread($file, filesize("day8-inputs.txt")));
	fclose($file);
	return $lines;
}

function CalculateSegment($codes) : array 
{
	$layout = array_fill(0, 10, 0);
	$fives = array();
	$sixes = array();
	
	foreach($codes as $code) {
		$letters = str_split($code);
		$length = count($letters);

		switch($length) {
			case 2:
				$layout[1] = $letters;
				break;
			case 3:
				$layout[7] = $letters;
				break;
			case 4:
				$layout[4] = $letters;
				break;
			case 5:
				$fives[] = $letters;
				break;
			case 6:
				$sixes[] = $letters;
				break;
			case 7:
				$layout[8] = $letters;
				break;
		}
	}
	
	foreach($sixes as $code) {
		$one = count(array_diff($layout[1], $code));
		$four = count(array_diff($layout[4], $code));

		// find 0
		if ($one == 0 && $four == 1) {
			$layout[0] = $code;
			continue;
		}
		
		// find 6
		if ($one == 1 && $four == 1) {
			$layout[6] = $code;
			continue;
		}
		
		// find 9
		$layout[9] = $code;
	}
	
	foreach($fives as $code) {
		$one = count(array_diff($layout[1], $code));
		$four = count(array_diff($layout[4], $code));
		$six = count(array_diff($layout[6], $code));
		$seven = count(array_diff($layout[7], $code));

		// find 5		
		if ($six == 1) {
			$layout[5] = $code;
			continue;
		}
		
		// find 3
		if ($one == 0 && $four == 1 && $seven == 0) {
			$layout[3] = $code;
			continue;
		}
		
		// find 2
		$layout[2] = $code;
	}
	
	return $layout;
}

function GetNumber($layout, $code) : int
{
	$answer = 0;

	foreach($layout as $index => $sequence) {
		if(count($code) == count($sequence) && count(array_diff($code, $sequence)) == 0) {
			$answer = $index;
		}		
	}

	return $answer;
} 

function CalculateCode($layout, $codes) : int
{
	$return_code = array();
	
	foreach($codes as $code) {
		$letters = str_split($code);
		$length = count($letters);

		switch($length) {
			case 2:
				$return_code[] = 1;
				break;
			case 3:
				$return_code[] = 7;
				break;
			case 4:
				$return_code[] = 4;
				break;
			case 5:
				$return_code[] = GetNumber($layout, $letters);
				break;
			case 6:
				$return_code[] = GetNumber($layout, $letters);
				break;
			case 7:
				$return_code[] = 8;
				break;
		}
	}
	
	return implode($return_code);
}

function GetCodes($lines) : int
{
	$digits = array();
	
	foreach ($lines as $index => $line) {
		$input = explode('|', $line);
		$codes[$index]["numbers"] = explode(' ', rtrim($input[0]));
		$codes[$index]["codes"] = explode(' ', ltrim($input[1]));
	}
	
	foreach($codes as $segment) {
		// calculate the segment layout
		$layout = CalculateSegment($segment["numbers"]);
		
		// calculate the code
		$digits[] = CalculateCode($layout, $segment["codes"]);
	}
	
	var_dump($digits);
	
	return array_sum($digits);
}

$inputs = GetInputs();

var_dump(GetCodes($inputs));
?>