<?php


foreach (range(1, 10) as $i) {
    echo $i . "\n";
    if ($i % 2 == 1) {
        continue;
    }
    echo "^ that is an even number.\n";
}