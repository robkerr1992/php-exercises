<?php

$bytwos = 2;

do {
	$bytwos*=$bytwos;
	echo "$bytwos" . PHP_EOL;
	
} while ($bytwos < 1000000);