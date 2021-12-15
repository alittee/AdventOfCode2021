<?php

function GetInputs() : array
{
	$file_name = "day10-inputs.txt";
	$file = fopen($file_name, "r") or die("Unable to open file!");
	$lines = explode("\n", fread($file, filesize($file_name)));
	//$lines = ["[({(<(())[]>[[{[]{<()<>>","[(()[<>])]({[<{<<[]>>(","{([(<{}[<>[]}>{[]{[(<()>","(((({<>}<{<{<>}{[]{[]{}","[[<[([]))<([[{}[[()]]]","[{[{({}]{}}([{[{{{}}([]","{<[[]]>}<{[{[{[]{()[[[]","[<(<(<(<{}))><([]([]()","<{([([[(<>()){}]>(<<{{","<{([{{}}[<[[[<>{}]]]>[]]"];
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
	$complete = array();
	$answer = 0;
	
	foreach($lines as $index => $line) {
		$char = CheckCorrupted($line);
		if (count($char) > 0) {
			$incomplete[] = $char;
		}
	}

	
	foreach($incomplete as $line) {
	  	$count = 0;		
		foreach(array_reverse($line) as $char) {
			$count *= 5;
		  	switch($char) {
				case '(':
					$count += 1;
					break;
				case '[':
					$count += 2;
					break;
				case '{':
					$count += 3;
					break;
				case '<':
					$count += 4;
					break;
		  	}
	  	}
	  
	  	$complete[] = $count;
	}
	rsort($complete);
	
	$answer = count($complete) / 2;
	
	var_dump($complete);
	return $complete[$answer];
}

$inputs = GetInputs();
var_dump(CheckRow($inputs));

?>

