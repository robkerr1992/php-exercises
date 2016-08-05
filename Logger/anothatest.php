<?php

$count = 2;
for ($i=0; $i < 2; $i++) {
for ($j=0; $j < 2; $j++) {
echo $i . $j . PHP_EOL;
if ($j == 1) {
break $count;
}
}
}