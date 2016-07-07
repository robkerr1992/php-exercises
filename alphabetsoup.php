<?php
function alphabetSoup($string) {
    $i=0;
    $wordArray = explode(" ", $string);
    foreach($wordArray as $word) {
        $i++;
        $letters = str_split($word);
        sort($letters);
        $word = implode("", $letters);
        if ($i == sizeof($wordArray)){
            echo "$word\n";
            break;
        };
        echo $word . " ";
    };
};
alphabetSoup("i'm a mountain bike lol");
/**
 * Created by PhpStorm.
 * User: MacBookPro
 * Date: 7/6/16
 * Time: 8:14 PM
 */