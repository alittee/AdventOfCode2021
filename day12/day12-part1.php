<?php
function GetInputs() : array
{
	$lines = ["start-A","start-b","A-c","A-b","b-d","A-end","b-end"];
	$inputs = array();
	
	foreach($lines as $line) {
		$inputs[] = explode('-', $line);
	}
	
	return $inputs;
}

function GetOptions($inputs) : array
{
	$chars = array('start' => array(), 'end' => array());
	
	foreach($inputs as $input) {
		$char_keys = array_keys($chars);
		
		if ($input[1] !== 'start')
			$chars[$input[0]][] = $input[1];
		
		if ($input[0] !== 'start')
			$chars[$input[1]][] = $input[0];
	}
	
	return $chars;
}

function GetPaths($options, $caves, $cave, $count) : int
{
	if ($cave === 'end')
		return $count += 1;
	
	if (!ctype_upper($cave) && in_array($cave, $caves))
		return 0;
		
	if (!ctype_upper($cave) && !in_array($cave, $caves) && $cave !== 'start')
		$caves[] = $cave;
	
	foreach($options[$cave] as $char) {
		$count = GetPaths($options, $char, $caves, $count);
	}
	
	return $count;
}

$inputs = GetInputs();

$options = GetOptions($inputs);

var_dump(GetPaths($options, array(), 'start', 0));

?>