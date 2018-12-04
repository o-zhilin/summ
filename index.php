<?php

function convernNumberToArray($i) {
  return array_map('intval', str_split(strrev($i)));
}

function summ ($a, $b) {
	$aLength = strlen($a);
	$bLength = strlen($b);
	if ($bLength > $aLength) {
		$temp = $a;
		$a = $b;
		$b = $temp;
	}

	$result = [];
	$buffer = 0;
	$a = convernNumberToArray($a);
	$b = convernNumberToArray($b);
	for ($i=0; $i < count($a); $i++) {
		
		$simpeSumm = $a[$i] + $buffer + $b[$i];
		$buffer = 0;
		if ($simpeSumm > 9) {
			$simpleSummArr = convernNumberToArray($simpeSumm);
			$buffer = $simpleSummArr[1];
			array_unshift($result, $simpleSummArr[0]);

		} else {
			array_unshift($result, $simpeSumm);
		}
	}
	if ($buffer > 0) {
		array_unshift($result, $buffer);
	}
	return implode("", $result);
}
