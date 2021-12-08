<?php
function GetFish($school, $days) {
	for ($i = 0; $i <= $days; $i++) {
		$size = count($school);
		$growth = 0;
		
		foreach($school as $index => $fish) {
			if ($fish == 0) {
				$school[$index] = 6;
				$growth++;
			} else {
				$school[$index]--;
			}
		}
		
		for ($d = 0; $d <= $growth; $d++) {
			$school[$size] = 8;
			$size++;
		}
	}
	
	return count($school);
}
$days = 80;
$inputs = [3,4,3,1,2];
var_dump(GetFish($inputs, $days));
?>