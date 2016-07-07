<?php
function throwError($badVariable){
    fwrite(STDERR, "Nice try, Tiger. $badVariable is not valid.\n");
}

function add($a, $b)
{
    if(!is_numeric($a))
    {
        throwError($a);
        exit(1);
    }
    elseif (!is_numeric($b))
    {
        throwError($b);
        exit(1);
    }
    return $a + $b;
}

function subtract($a, $b)
{
    if(!is_numeric($a))
    {
        throwError($a);
        exit(1);
    }
    elseif (!is_numeric($b))
    {
        throwError($b);
        exit(1);
    }
    return $a - $b;
}

function multiply($a, $b)
{
    if(!is_numeric($a))
    {
        throwError($a);
        exit(1);
    }
    elseif (!is_numeric($b))
    {
        throwError($b);
        exit(1);
    }
    return $a * $b;
}

function divide($a, $b)
{
    if(!is_numeric($a))
    {
        throwError($a);
        exit(1);
    }
    elseif (!is_numeric($b) || $b == 0)
    {
        throwError($b);
        exit(1);
    }
    return $a / $b;
}

echo add('1','5') . PHP_EOL;
echo subtract('1',4) . PHP_EOL;
echo multiply(3, 0) . PHP_EOL;
echo divide(4,0) . PHP_EOL;
