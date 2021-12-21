<?php
Class Day12 {
	public $caves = array();
	public $count = 0;
	public $options;
	
	public function __construct($data)	{
		$inputs = $this->GetInputs($data);
		$this->options = $this->GetOptions($inputs);
	}

	public function GetInputs($lines) : array
	{
		$inputs = array();
	
		foreach($lines as $line) {
			$inputs[] = explode('-', $line);
		}
	
		return $inputs;
	}

	public function GetOptions($inputs) : array
	{
		$chars = array('start' => array(), 'end' => array());
	
		foreach($inputs as $input) {		
			if ($input[1] !== 'start')
				$chars[$input[0]][] = $input[1];
		
			if ($input[0] !== 'start')
				$chars[$input[1]][] = $input[0];
		}
	
		return $chars;
	}

	private function CheckTwice($cave) : bool
	{
		$checker = 0;
			 
		if ($cave === 'start')
			return true;
		
		$keys = array_keys($this->caves);
		
		if (in_array($cave, $keys)) {
			$this->caves[$cave] += 1;
		} else {
			$this->caves[$cave] = 1;
		}

		if ($this->caves[$cave] < 2)
			return true;
	
		foreach($this->caves as $char => $visits) {
			$checker += ($visits === 2) ? 1 : 0 ;
			if ($visits > 2)
				$this->caves[$char]--;
		}
		
		if ($checker > 1) {
			$this->caves[$cave] -= 1;
			return false;
		}
			
		return true;
	}

	public function GetPaths($cave) : int
	{
		if ($cave === 'end')
			return $this->count += 1;
	
		if (!ctype_upper($cave) && !$this->CheckTwice($cave))
			return $this->count;
			
		var_dump($cave);
		
		foreach($this->options[$cave] as $char) {
			$this->count = $this->GetPaths($char);
		}
		
		
	}
}

$day12 = new Day12(["start-A","start-b","A-c","A-b","b-d","A-end","b-end"]);

$answer = $day12->GetPaths('start');

var_dump($answer);

?>
