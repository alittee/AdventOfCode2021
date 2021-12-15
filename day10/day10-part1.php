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

function CheckCorrupted($line) : string
{
	$openChars = array();
	$corrupted = null;
	
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
					$corrupted = $char;
				} else {
				  array_pop($openChars);
				}
				break; 
			case ']':
			  if (end($openChars) !== '[') {
					$corrupted = $char;
				} else {
				  array_pop($openChars);
				}
				break;
			case '}':
			  if (end($openChars) !== '{') {
					$corrupted = $char;
				} else {
				  array_pop($openChars);
				}
				break;
			case '>':
        if (end($openChars) !== '<') {
					$corrupted = $char;
				} else {
				  array_pop($openChars);
				}
				break;      
		}
		
		if ($corrupted !== null) {
		  break;
		}
	}

	return (!is_null($corrupted)) ? $corrupted: '';
}

function CheckRow($lines) : int 
{
	$corrupt = array();
	$answer = 0;
	
	foreach($lines as $index => $line) {
		$char = CheckCorrupted($line);
		if ($char !== '') {
		  $corrupt[$char] += 1;
		}
	}
	
	$answer += $corrupt[')'] * 3;
	$answer += $corrupt[']'] * 57;
	$answer += $corrupt['}'] * 1197;
	$answer += $corrupt['>'] * 25137;
	
	return $answer;
}

$inputs = GetInputs();
var_dump(CheckRow($inputs));

?>

