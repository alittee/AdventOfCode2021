<?php

function GetInputs() : array
{
	$file_name = "day10-inputs.txt";
	$file = fopen($file_name, "r") or die("Unable to open file!");
	$lines = explode("\n", fread($file, filesize($file_name)));
	fclose($file);
	
	$inputs = array();
	
	foreach($lines as $line) {
		$inputs[] = str_split($line);
	}
	
	return $inputs;
}

function CheckCorrupted($line) : array
{
	$openChars = array();
	$corrupted = false;
	
	foreach($line as $char) {
		switch($char) {
			case '(':
			case '[':
			case '{':
			case '<':
				$openChars[] = $char;
				break; 
			case ')':
				if (end($openChars) !== '(') {
					$corrupted = true;
				} else {
				  array_pop($openChars);
				}
				break; 
			case ']':
			  if (end($openChars) !== '[') {
					$corrupted = true;
				} else {
				  array_pop($openChars);
				}
				break;
			case '}':
			  if (end($openChars) !== '{') {
					$corrupted = true;
				} else {
				  array_pop($openChars);
				}
				break;
			case '>':
        if (end($openChars) !== '<') {
					$corrupted = true;
				} else {
				  array_pop($openChars);
				}
				break;      
		}
	}

	return ($corrupted === true) ? array(): $openChars;
}

function CheckRow($lines) : int 
{
	$incomplete = array();
	$answer = 0;
	
	foreach($lines as $index => $line) {
		$char = CheckCorrupted($line);
		if (count($char) > 0) {
		  $incomplete[] = $char;
		}
	}
	
	$answer += $incomplete[')'] * 3;
	$answer += $incomplete[']'] * 57;
	$answer += $incomplete['}'] * 1197;
	$answer += $incomplete['>'] * 25137;
	
	return $answer;
}

$inputs = GetInputs();
var_dump(CheckRow($inputs));

?>

