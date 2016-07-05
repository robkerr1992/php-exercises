<?php
$min = 1;
$max = 100;
// echo "$random" . PHP_EOL;
if ($argc >= 3){
	if (is_numeric($argv[1]) && is_numeric($argv[2]) && $argv[1] < $argv[2]) {
	$min = $argv[1];
	$max = $argv[2];
	} else {
		fwrite(STDERR, 'You need to use numbers, fool.');
	}
}

$attempts = 0;
$random = mt_rand($min, $max);
do {
	fwrite(STDOUT, "Press zero to exit. What is your guess between $min and $max ?");
	$userInput = trim(fgets(STDIN));
	if ($userInput == 0) {
		exit('You have exited!' . PHP_EOL);
	}
	
	elseif ($userInput>$random){
		echo 'Lower!', PHP_EOL;
		$attempts++;
	}
	elseif ($userInput<$random){
		echo 'Higher!', PHP_EOL;
		$attempts++;
	}


	elseif ($userInput == $random){
		$attempts++;
		echo "Winner! $attempts attempts were made.", PHP_EOL;

	}

} while ($userInput != $random);

