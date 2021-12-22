<?php
Class Day12 {
	public $caves = array();
	public $count;
	public $options;
	
	public function __construct($data)	{
		$inputs = $this->GetInputs($data);
		$this->options = $this->GetOptions($inputs);
		$this->count = 0;
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
    
    if ($this->caves[$cave] > 2) {
      $this->caves[$cave]--;
      return false;
    }
    
		if ($this->caves[$cave] < 2)
			return true;
	  
		foreach($this->caves as $char => $visits) {
			$checker += ($visits >= 2) ? 1 : 0 ;
			if ($visits > 2)
				$this->caves[$char]--;
		}
		
		if ($checker > 1) {
			$this->caves[$cave] -= 1;
			return false;
		}
			
		return true;
	}

	public function GetPaths($cave)
	{
	  
		if ($cave === 'end') {
		  $this->count += 1;
			return;
		}
	  
		if (!ctype_upper($cave) && !$this->CheckTwice($cave))
			return;
		
		foreach($this->options[$cave] as $char) {
			$this->GetPaths($char);
		}
		
		if (!ctype_upper($cave) && $cave !== 'start')
		  $this->caves[$cave]--;
		
		return;
	}
}

$day12 = new Day12(["mj-TZ","start-LY","TX-ez","uw-ez","ez-TZ","TH-vn","sb-uw","uw-LY","LY-mj","sb-TX","TH-end","end-LY","mj-start","TZ-sb","uw-RR","start-TZ","mj-TH","ez-TH","sb-end","LY-ez","TX-mt","vn-sb","uw-vn","uw-TZ"]);
$day12->GetPaths('start');

var_dump($day12->count);

?>
