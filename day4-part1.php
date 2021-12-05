<?php

/*
build result board? When column or row is filled then it can be located.
*/
function Bingo($inputs, $boards) {
	foreach($inputs as $number) {
		foreach($boards as $board) {
			var_dump(CheckBoard($number, $board));
		}
	}	
}

function CheckBoard($number, $board) {
	/*
	create row array
	create column array
	check both
	add results
	check if winner
	*/
	
}

function CheckRow($number, $row) {

}


function GetInputs() {
	$file = fopen("day4-inputs.txt", "r") or die("Unable to open file!");
	$inputs = fgets($file);
	fclose($file);

	return explode(',', $inputs);
}

function GetBoards() {
	$max = 5;
	$row = 0;
	$board = 0;
	
	$file = fopen("day4-boards.txt", "r") or die("Unable to open file!");
	$array = explode("\n", fread($file, filesize("day4-boards.txt")));
	fclose($file);
	
	$board_length = count($array) / 6;
	
	$boards = array_fill(0, $board_length, 0);
	
	while(count($array) > $row) {
		$boards[$board] = array_slice($array, $row, $max);
		
		foreach($boards[$board] as $index => $data) {
			$str = ltrim(str_replace("  ", " ", $data));
			$boards[$board][$index] = explode(" ", $str);
		}
		
		$row += 6;
		$board++;
	}
	
	return $boards;
}

$inputs = GetInputs();
$boards = GetBoards();

Bingo($inputs, $boards);
?>