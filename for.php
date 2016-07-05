<?php

fwrite(STDOUT, 'Where do you want to start?');
$num1 = (int) fgets(STDIN);
fwrite(STDOUT, 'Where do you want to stop?');
$num2 = (int) fgets(STDIN);
// echo $num1 . $num2;


for ($i = $num1; $i <= $num2 ; $i++) { 
	echo $i . PHP_EOL;
}