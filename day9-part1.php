<?php

function GetInputs() : array
{
	$file = fopen("day9-inputs.txt", "r") or die("Unable to open file!");
	$lines = explode("\n", fread($file, filesize("day9-inputs.txt")));
	fclose($file);
	
	$inputs = array();
	
	foreach($lines as $line) {
		$inputs[] = str_split($line);
	}
	
	return $inputs;
}

function CheckIfLow($up, $down, $left, $right, $number) : bool
{
	if ($up !== null && $number >= $up) {
		return false;
	}
	if ($down !== null && $number >= $down) {
		return false;
	}
	if ($left !== null && $number >= $left) {
		return false;
	}
	if ($right !== null && $number >= $right) {
		return false;
	}
	var_dump($number);
	return true;
}

function FindLowPoints($inputs, $line, $ind) : array
{
	$low_points = array();
	$lastLine = count($inputs) - 1;
	$lastNumber = count($line) - 1;

	foreach($line as $index => $number) {
		$up = ($ind > 0) ? $inputs[$ind-1][$index] : null;
		$down = ($ind < $lastLine) ? $inputs[$ind+1][$index] : null;
		$left = ($index > 0) ? $line[$index - 1] : null;
		$right = ($index < $lastNumber) ? $line[$index + 1] : null;
		
		if (CheckIfLow($up, $down, $left, $right, $number)) {
			$low_points[] = $number + 1;
		}
	}
	
	return $low_points;
}

function GetDepths($inputs) : int
{
	$answer = 0;
	
	foreach($inputs as $index => $line) {
		$answer += array_sum(FindLowPoints($inputs, $line, $index));
	}	
	
	return $answer;
}

$inputs = GetInputs();
var_dump(GetDepths($inputs));

?>