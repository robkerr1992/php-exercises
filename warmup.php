<?php

$names = array('TJ', 'Anthony', 'Rob', 'Eddie');
echo sizeof($names), PHP_EOL;
for ($i=0; $i < sizeof($names); $i++) { 
	echo $names[$i], PHP_EOL;
}