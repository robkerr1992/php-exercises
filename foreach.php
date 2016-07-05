<?php
$things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);
foreach ($things as $key => $value) {
	if(is_int($value)) {
		echo "$value is an int" . PHP_EOL;
	}
	elseif(is_float($value)) {
		echo "$value is an int" . PHP_EOL;
	}
	elseif(is_bool($value)) {
		echo "$value is a boolean" . PHP_EOL;
	}
	elseif(is_array($value)) {
		echo "$value is an array" . PHP_EOL;
	}
	elseif(is_null($value)) {
		echo "$value is null" . PHP_EOL;
	}
	elseif(is_string($value)) {
		echo "$value is a string" . PHP_EOL;
	}
}