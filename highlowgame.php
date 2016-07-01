<?php
$random = mt_rand(1, 100);
$attempts = 0;
// echo "$random" . PHP_EOL;

do {
	fwrite(STDOUT, "What is your guess between 1 and 100? ");
	$userInput = trim(fgets(STDIN));
	if ($userInput>$random){
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

