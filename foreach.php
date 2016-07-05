<?php
$things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);
foreach ($things as $thing) {
	echo '$thing is a ' . gettype($thing) . PHP_EOL;
	if(is_array($thing)) {
		// echo '$thing is an array' . PHP_EOL;
		print_r($thing);
	}
	// elseif(is_float($thing)) {
	// 	echo "$thing is an int" . PHP_EOL;
	// }
	// elseif(is_bool($thing)) {
	// 	echo "$thing is a boolean" . PHP_EOL;
	// }
	// elseif(is_array($thing)) {
	// 	print_r($thing);
	// 	// foreach ($thing as $index => $number) {
	// 	// 	echo "$index is the index, $number is the thing" . PHP_EOL;
	// 	// }
	// 	// echo "$thing is an array" . PHP_EOL;
	// }
	// elseif(is_null($thing)) {
	// 	echo "$thing is null" . PHP_EOL;
	// }
	// elseif(is_string($thing)) {
	// 	echo "$thing is a string" . PHP_EOL;
	// }
	// else {
	// 	echo "idk bro" . PHP_EOL;
	// }
}