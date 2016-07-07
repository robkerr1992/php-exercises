<?php

// TODO: Create your inspect() function here

function inspect($inspectThis) {
    if (is_null($inspectThis))
    {
        return "The variable has a value of NULL.\n";
    }
    elseif ($inspectThis === [])
    {
        return "The variable is an empty Array.\n";
    }
    elseif (gettype($inspectThis) == 'array')
    {
        return "The variable is an Array.\n";
    }
    elseif (is_bool($inspectThis))
    {
        if ($inspectThis == false)
        {
            return "The boolean has a value of false.\n";
        }
        else
        {
            return "The boolean has a value of true.\n";
        }
    }
    elseif ($inspectThis === "")
    {
        return "The string is an empty string.\n";
    }
    else
    {
        return "The " .  gettype($inspectThis) .  " has a value of $inspectThis.\n";
    }

}

// Do not modify these variables!
$string1 = "I'm a little teapot";
$string2 = '';
$array1 = [];
$array2 = [1, 2, 3];
$bool1 = true;
$bool2 = false;
$num1 = 0;
$num2 = 0.0;
$num3 = 12;
$num4 = 14.4;
$null = NULL;

// TODO: After each echo statement, use inspect() to output the variable's type and its value

echo 'Inspecting $num1: ' . inspect($num1);
echo 'Inspecting $num2: ' . inspect($num2);
echo 'Inspecting $num3: ' . inspect($num3);
echo 'Inspecting $num4: ' . inspect($num4);
echo 'Inspecting $null: ' . inspect($null);
echo 'Inspecting $bool1: ' . inspect($bool1);
echo 'Inspecting $bool2: ' . inspect($bool2);
echo 'Inspecting $string1: ' . inspect($string1);
echo 'Inspecting $string2: ' . inspect($string2);
echo 'Inspecting $array1: ' . inspect($array1);
echo 'Inspecting $array2: ' . inspect($array2);