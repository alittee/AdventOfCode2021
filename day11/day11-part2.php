<?php

function GetInputs() : array
{
	$file_name = "day11-inputs.txt";
	$file = fopen($file_name, "r") or die("Unable to open file!");
	$lines = explode("\n", fread($file, filesize($file_name)));
	fclose($file);
	
	$inputs = array();
	
	foreach($lines as $line) {
		$inputs[] = str_split($line);
	}
	
	return $inputs;
}

function GetNeighbour($inputs, $line, $position) : array
{
	return array('line' => $line, 'position' => $position, 'count' => $inputs[$line][$position]);
}

function GetNeighbours($inputs, $line, $position, $width, $height) : array
{
	$neighbours = array();

	// top
	if ($line > 0)
		$neighbours[] = GetNeighbour($inputs, $line - 1, $position);

	// top left
	if ($line > 0 && $position > 0)
		$neighbours[] = GetNeighbour($inputs, $line - 1, $position - 1);
		
	// top right 
	if ($line > 0 && $position < $width)
		$neighbours[] = GetNeighbour($inputs, $line - 1, $position + 1);
	
	// left
	if ($position > 0)
		$neighbours[] = GetNeighbour($inputs, $line, $position - 1);
	
	// right
	if ($position < $width)
		$neighbours[] = GetNeighbour($inputs, $line, $position + 1);
	
	// down
	if ($line < $height)
		$neighbours[] = GetNeighbour($inputs, $line + 1, $position);
	
	// down left 
	if ($line < $height && $position > 0)
		$neighbours[] = GetNeighbour($inputs, $line + 1, $position - 1);
	
	// down right
	if ($line < $height && $position < $width)
		$neighbours[] = GetNeighbour($inputs, $line + 1, $position + 1);
		
	return $neighbours;
}

function ProcessStep($inputs, $flashing, $count) :array
{
	$new_flashing = array();
	
	$height = count($inputs) - 1;
	$width = count($inputs[0]) - 1;
	
	foreach($inputs as $line => $input) {
		foreach($input as $position => $number) {
			$flash =  array('line' => $line, 'position' => $position);
			if (IsFlashing($number) && !in_array($flash, $flashing)) {
				$new_flashing[] = $flash;
				$flashing[] = $flash;
			}
		}
	}
	
	foreach($new_flashing as $flash) { 
		foreach(GetNeighbours($inputs, $flash['line'], $flash['position'], $width, $height) as $neighbour) {
			$inputs[$neighbour['line']][$neighbour['position']] += 1;
		}
	}
	
	if (count($new_flashing) === 0)
		return array('inputs' => $inputs, 'answer' => $count);
	
	$count += count($new_flashing);
	
	return ProcessStep($inputs, $flashing, $count);
}

function IsFlashing($number) : bool
{
	return ($number > 9);
}

function StartStepping($inputs) : int
{
	$steps = 0;
	$answer = 0;
	
	while($answer !== 100) {
		$flashing = array();
		
		foreach($inputs as $line => $input) {
			foreach($input as $position => $number) {
				$inputs[$line][$position] += 1;
			}
		}
		
		$numbers = ProcessStep($inputs, $flashing, 0);
		
		$answer = $numbers['answer'];
		$inputs = $numbers['inputs'];
		
		foreach($inputs as $line => $input) {
			foreach($input as $position => $number) {
				if (IsFlashing($number))
					$inputs[$line][$position] = 0;
			}
		}
		
		$steps++;
	}

	return $steps;
}


$inputs = GetInputs();
$answer = StartStepping($inputs);
var_dump($answer);
?>

