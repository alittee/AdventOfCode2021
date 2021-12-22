<?php

Class Day13
{
	public $inputs = array();
	public $entry;
	public $x_folds = array();
	public $y_folds = array();
	private $width = 0;
	private $height = 0;
	
	public function __construct($file_name, $folds_name) {
		$this->GetInputs($file_name);
		$this->GetFolds($folds_name);
	}
	
	private function GetInputs($file_name)
	{
		$file = fopen($file_name, "r") or die("Unable to open file!");
		$lines = explode("\n", fread($file, filesize($file_name)));
		fclose($file);
		
		$x = array();
		$y = array();
		
		foreach($lines as $line) {
			$dot = explode(',', $line);
			$x[] = $dot[0];
			$y[] = $dot[1];
		}
		
		$this->width = max($x) + 1;
		$this->height = max($y) + 1;
		$fill = array_fill(0, $this->width, 0);
		
		$this->inputs = array_fill(0, $this->height, $fill);
		
		foreach($lines as $line) {
			$dot = explode(',', $line);
			$this->inputs[$dot[1]][$dot[0]] = 1;
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
		
		sort($this->x_folds);
		sort($this->y_folds);
	}
	
	private function GetCords($x, $y)
	{
		return array('x' => $x, 'y' => $y);
	}
	
	public function Part1() : int 
	{
		// maintains doubled up dots
		$dots = array();
		
		foreach($this->y_folds as $fold) {
			$slice = array_splice($this->inputs, $fold);
		}
		
		return count($dots);
	}
	
}

$day13 = new Day13('day13-inputs.txt', 'day13-folds.txt');

var_dump($day13->Part1());
?>