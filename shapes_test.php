<?php

require_once 'square.php';

$tj = new square(5);
$tj2 = new rectangle(5, 20);
echo $tj2->area();
echo $tj->perimeter();