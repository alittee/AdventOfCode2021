<?php

/*
build result board? When column or row is filled then it can be located.
*/
function Bingo($inputs, $boards) {
$winner = true;
$row = [];
$inputs = [];
$total = 0;

foreach($inputs as $index => $number) {
  $known[$index] = $number;
  foreach($boards as $row) {
    $winner = false;
    $checker = true;
    $count = 0;
    while($checker === true){
      if (in_array($row[$count], $known)) {
        if($count =< count($row)) {
          $winner = true;
          $total = array_sum($row) * $row[$count];
        }
        $count++;
      }
      else
      {
        $checker = false;
      }
    }
  }
}	
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
