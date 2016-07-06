<?php

// Set the default timezone
date_default_timezone_set('America/Chicago');

// Get Day of Week as number
// 1 (for Monday) through 7 (for Sunday)
$dayOfWeek = date('N');

switch($dayOfWeek) {
    case 1:
        echo 'monday';
        break;
    case 2:
        echo 'tuesday';
        break;
    case 3:
        echo 'wednesday';
        break;
    case 4:
        echo 'thursday';
        break;
    case 5:
        echo 'friday';
        break;
    case 6:
        echo 'saturday';
        break;
    case 7:
        echo 'sunday';
        break;
}