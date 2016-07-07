<?php
$i=1;
foreach(range(2520,925810) as $number)
{
    for($i = 1; $i <= 20; $i++)
    {
        if($number % $i == 0)
        {
            if ($i==16)
            {
                echo "$number\n";
            };
        continue;
        } else {
            break;
        };
    };
};

/**
 * Created by PhpStorm.
 * User: MacBookPro
 * Date: 7/6/16
 * Time: 8:59 PM
 */