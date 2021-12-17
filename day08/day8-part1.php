<?php

function GetInputs() : array 
{
	$file = fopen("day8-inputs.txt", "r") or die("Unable to open file!");
	$lines = explode("\n", fread($file, filesize("day8-inputs.txt")));
	fclose($file);
	$inputs = array();
	
	foreach ($lines as $line) {
		$input = explode('|', $line);
		$inputs[] = explode(' ', ltrim($input[1]));
	} 
	
	return $inputs;
}

function GetCodes($codes) : int
{
	$digits = array();
	$answer = 0;
	$known = [2,3,4,7];
	
	foreach($codes as $segment) {
		foreach ($segment as $code) {
			if (in_array(strlen($code), $known)) {
				$answer++;
			}
		}
	}
	
	return $answer;
}

$inputs = GetInputs();

var_dump(GetCodes($inputs));
?>