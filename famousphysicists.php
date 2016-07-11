<?php
$physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';

function humanizedlist($string, $alphabetical = false)
{
    $famousFakePhysicists = "";
    $physicists = explode(', ', $string);
    $last = end($physicists);
//    var_dump($last);

    if ($alphabetical == true){
        sort($physicists);
    }


    foreach ($physicists as &$physicist) {
        if ($physicist == $last) {
            $physicist = "and " . $physicist . ".";
        }
        $famousFakePhysicists = implode(", ", $physicists);

    }
//    var_dump($physicists);
    return $famousFakePhysicists;

}


$famousFakePhysicists =  humanizedlist($physicistsString, true);



echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}\n";

/**
 * Created by PhpStorm.
 * User: MacBookPro
 * Date: 7/11/16
 * Time: 10:06 AM
 */