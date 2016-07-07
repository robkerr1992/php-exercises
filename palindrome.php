<?php
function palindrome($string) {
    $nospaceString = str_replace(' ', '', $string);
    $reverseString = strrev($nospaceString);
    if ($nospaceString == $reverseString) {
        echo "We found a palindrome! $string!";
    };
};
palindrome("a man a plan a canal panama");
/**
 * Created by PhpStorm.
 * User: MacBookPro
 * Date: 7/6/16
 * Time: 9:37 PM
 */