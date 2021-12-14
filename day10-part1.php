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

function CheckCorrupted($line) : bool
{
	$openChars = array();
	
	foreach($line as $char) {
		switch($char) {
			case '(':
				$openChar[] = $char;
				break; 
			case ')':
				if (end($openChars) !== ')') {
					
				}
				break; 
			case '[':
				break;
			case ']':
				break;
			case '{':
				break;
			case '}':
				break;
			case '<':
				break;
			case '>':
				break;      
		}
	}
}

function CheckRow($lines) : int 
{
	$corrupt = array();
	foreach($lines as $line) {
		if (count($line) % 2 == 0 && CheckCorrupted($line)) {
			$corrupt[] = $line;
		}
	}
	
	return 0;
}

$inputs = GetInputs();
var_dump(CheckRow($inputs));

?>