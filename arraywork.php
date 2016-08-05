<?php

$commaArray = ['e', 'a', 'g', 'c', 'i', 'd', 'f', 'b', 'h'];
function sortItOutBruh($array)
{
    foreach ($array as &$letter) {
        $letter = ord($letter) - 96;
    }
    $newArray = [];
    for ($i = 1; sizeof($newArray) < sizeof($array); $i++) {
        $pushme = array_search($i, $array);
        array_push($newArray, $array[$pushme]);
    }
    foreach ($newArray as &$number) {
        $number = chr($number + 96);
    }
    return ($newArray);
};


function sortArray($array){
    for($i=0; $i < count($array); $i++){
        for($j = $i+1 ; $j < count($array); $j++) {
            if($array[$i] > $array[$j]) {
                $holder = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $holder;
            }
        }
    }
    return $array;
}


$unsorted = $commaArray;
$sorted = [];
foreach($commaArray as $i => $letters){
    $min = min($unsorted);
    $sorted[] = $min;
    $index = array_search($min, $unsorted);
    unset($unsorted[$index]);
}

print_r($sorted);
//print_r(sortItOutBruh($commaArray));

//print_r(sortArray($commaArray));
/**
 * Created by PhpStorm.
 * User: MacBookPro
 * Date: 7/12/16
 * Time: 9:03 AM
 */