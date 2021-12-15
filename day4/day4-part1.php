<?php

/*
build result board? When column or row is filled then it can be located.
*/
function Bingo($inputs, $boards) {
	$winning_board = null;
	$known = array();
	$index = 0;
	
	while($winning_board == null) {
		$known[$index] = (int) $inputs[$index];
		$count = 0;
		foreach($boards as $board) {
			foreach($board as $rows) {
				$checker = true;
				foreach($rows as $row) {
					if(!in_array($row, $known)) {
						$checker = false;
					}
				}
			
				if($checker === true) {
					$winning_board = array_slice($board, 0, 5);
					break;
				}
			}
			if (!is_null($winning_board)) {
				break;
			}
		}
		$index++;
	}
	
	return GetTotal($winning_board, $known);
}

function GetTotal($board, $inputs) {
	$sub_total = 0;
	foreach($board as $row) {
		foreach($row as $number) {
			if (!in_array($number, $inputs)) {
				$sub_total += $number;
			}
		}
	}
	
	return $sub_total * end($inputs);
}

function GetInputs() {
	$file = fopen("day4-inputs.txt", "r") or die("Unable to open file!");
	$inputs = fgets($file);
	fclose($file);
	$stuff = explode(',', $inputs);
	
	return $stuff;
}

function GetRows($board) {
	foreach($board as $index => $data) {
		$str = ltrim(str_replace("  ", " ", $data));
		$board[$index] = explode(" ", $str);
	}
	
	return $board;
}

function GetColumns($board) {
	$count = count($board);
	$columns = array_fill(0, $count, 0);
	
	for($i = 0; $i < $count; $i++) {
		$col = array_fill(0, $count, 0);
		foreach($board as $index => $row) {
			$col[$index] = $board[$index][$i];
		}
		$columns[$i] = $col;
	}

	return $columns;
}

function GetBoards() {
	$max = 5;
	$row = 0;
	$board_index = 0;
	
	$file = fopen("day4-boards.txt", "r") or die("Unable to open file!");
	$array = explode("\n", fread($file, filesize("day4-boards.txt")));
	fclose($file);
	
	$board_length = count($array) / 6;
	
	$boards = array_fill(0, $board_length, 0);
	
	while(count($array) > $row) {
		$boards[$board_index] = array_slice($array, $row, $max);
				
		$row += 6;
		$board_index++;
	}

	foreach($boards as $index => $board) {
		$rows = GetRows($board);
		$cols = GetColumns($rows);
		$boards[$index] = array_merge($rows, $cols);
		
	}

	return $boards;
}

$inputs = GetInputs();
$boards = GetBoards();

var_dump(Bingo($inputs, $boards));
?>
