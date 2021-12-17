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
	return { 'line' => $line, 'position' => $position, 'count' => $inputs[$line][$position], 'flashing' = false };
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
	if ($line > 0 && $position < $width) {
		$neighbours[] = GetNeighbour($inputs, $line - 1, $position + 1);
	
	// left
	if ($position > 0)
		$neighbours[] = GetNeighbour($inputs, $line, $position + 1);
	
	// right
	if ($position < $width)
		$neighbours[] = GetNeighbour($inputs, $line, $position - 1);
	
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

function GetFlashing($inputs, $line, $position, $flashing) : array
{
	$height = count($inputs) - 1;
	$width = count($inputs[0]) - 1;
	
	if ($line === $height && $width === $position) {
		return $inputs;
	}
	
	// get neighbours
	$neighbours = GetNeighbours($inputs, $line, $position, $height, $width);	
	
	// check if current is flashing
	
	// if yes add to neighbours
	
	if ($position === $width) {
		$position = 0;
		$line++;
	} else {
		$position++;
	}
	
	return GetFlashing($inputs, $line, $position, $flashing, $count);
}

function StartStepping($inputs, $steps) {
	$flashing = 0;
	
	for($i = 0; $i < $steps; $++) {
		$numbers = array();
		foreach($inputs as $line => $input) {
			foreach($input as $position => $number) {
				$numbers[$line][$position] = $number + 1;
			}
		}
		var_dump($numbers);
		$flashing += GetFlashing($numbers, 0, 0, array(), 0);
		
	}
	
	return $flashing;
}


$inputs = GetInputs();
var_dump(StartStepping($inputs, 100));

?>

