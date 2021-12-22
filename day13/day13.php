<?php

Class Day13
{
	public $inputs = array();
	public $entry;
	public $x_folds = array();
	public $y_folds = array();
	
	public function __construct($file_name, $folds_name) {
		$this->GetInputs($file_name);
		$this->GetFolds($folds_name);
	}
	
	private function GetInputs($file_name)
	{
		$file = fopen($file_name, "r") or die("Unable to open file!");
		$lines = explode("\n", fread($file, filesize($file_name)));
		fclose($file);
	
		foreach($lines as $line) {
			$input = explode(',', $line);
			$this->inputs[] = array('x' => $input[0], 'y' => $input[1]);
		}
	}
	
	private function GetFolds($file_name)
	{
		$file = fopen($file_name, "r") or die("Unable to open file!");
		$lines = explode("\n", fread($file, filesize($file_name)));
		fclose($file);
		
		foreach($lines as $line) {
			$fold = explode('=', $line);
			
			if ($fold[0] == 'x') {
				$this->x_folds[] = $fold[1];
			} else {
				$this->y_folds[] = $fold[1];
			}
		}
	}
	
	private function GetCords($x, $y)
	{
		return array('x' => $x, 'y' => $y);
	}
	
	public function Part1() : int 
	{
	
	}
	
}

$day13 = new Day13('day13-inputs.txt', 'day13-folds.txt');

var_dump($day13->inputs);
?>