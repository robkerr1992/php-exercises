<?php

echo 'Welcome to Codeup!' . PHP_EOL;
echo 'This is my first PHP script!' . PHP_EOL;
$itsHot = true;
$youreOutside = false;

if ($itsHot && $youreOutside)
{
	echo "sweat" . PHP_EOL;

} 
else if (!$itsHot && !$youreOutside)
{
	echo "enjoy the cookies" . PHP_EOL;

} 
else 
{
	echo "enjoy the ac" . PHP_EOL;
}

var_dump((true || false) ? 'it was true' : 'it was false');