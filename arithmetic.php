<?php

function add($a, $b)
{
    return $a + $b;
}

function subtract($a, $b)
{
    return $a - $b;
}

function multiply($a, $b)
{
    return $a * $b;
}

function divide($a, $b)
{
    return $a / $b;
}

echo add(1,2) . PHP_EOL;
echo subtract(1,4) . PHP_EOL;
echo multiply(3,4) . PHP_EOL;
echo divide(4,2) . PHP_EOL;
