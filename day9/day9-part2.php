<?php

function GetInputs() : array
{
	$file = fopen("day9-inputs.txt", "r") or die("Unable to open file!");
	$lines = explode("\n", fread($file, filesize("day9-inputs.txt")));
	fclose($file);
	
	$inputs = array();
	
	foreach($lines as $line) {
		$inputs[] = array_map('intval', str_split($line));
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

	return true;
}

function NotChecked($checked, $neighbour) : bool
{
	$checking = true;
	
	foreach($checked as $each) {
		if ($each === $neighbour) {
			$checking = false;
		}
	}
	
	return $checking;
}

function FindBasin($inputs, $line, $position, $neighbours, $checked) : int
{	
	$height = count($inputs) - 1;
	$width = count($inputs[0]) - 1;
	$current = array('line' => $line, 'position' => $position);
	
	// Down
	if ($line < $height && $inputs[$line + 1][$position] != 9) {
		$neighbour = array('line' => $line + 1, 'position' => $position);
		(NotChecked($checked, $neighbour)) ? $neighbours[] = $neighbour: '';
	}

	// Up
	if ($line > 0 && $inputs[$line - 1][$position] !== 9) {
		$neighbour = array('line' => $line - 1, 'position' => $position);
		(NotChecked($checked, $neighbour)) ? $neighbours[] = $neighbour: '';
	}
	
	// Right	
	if ($position < $width && $inputs[$line][$position + 1] !== 9) {
		$neighbour = array('line' => $line, 'position' => $position + 1);
		(NotChecked($checked, $neighbour)) ? $neighbours[] = $neighbour: '';
	}

	// Left
	if ($position > 0 && $inputs[$line][$position - 1] !== 9) {
		$neighbour = array('line' => $line, 'position' => $position - 1);
		(NotChecked($checked, $neighbour)) ? $neighbours[] = $neighbour: '';
	}
	
	if (NotChecked($checked, $current)) {
		$checked[] = $current;
	}
	
	if (count($neighbours) === 0)  {
		return count($checked);
	}
	
	$next = array_shift($neighbours); 

	return FindBasin($inputs, $next['line'], $next['position'], $neighbours, $checked);
}

function FindLowPoints($inputs, $line, $line_index, $low_points) : array
{
	$lastLine = count($inputs) - 1;
	$lastNumber = count($line) - 1;
	
	foreach($line as $position => $number) {
		$up = ($line_index > 0) ? $inputs[$line_index - 1][$position] : null;
		$down = ($line_index < $lastLine) ? $inputs[$line_index + 1][$position] : null;
		$left = ($position > 0) ? $line[$position - 1] : null;
		$right = ($position < $lastNumber) ? $line[$position + 1] : null;
		
		if (CheckIfLow($up, $down, $left, $right, $number) === true) {
			$low_points[$line_index][$position] = $number;
		}
	}
	
	return $low_points;
}

function GetDepths($inputs) : int
{
	$low_points = array();
	$basins = array();
	
	foreach($inputs as $index => $line) {
		$low_points = FindLowPoints($inputs, $line, $index, $low_points);
	}	
	
	foreach($low_points as $line => $points) {
		foreach($points as $position => $point) {
			$basins[] = FindBasin($inputs, $line, $position, array(), array(), 1);
		}
	}

	rsort($basins);
	return array_product(array_slice($basins, 0, 3));
}

$inputs = GetInputs();
var_dump(GetDepths($inputs));

?>