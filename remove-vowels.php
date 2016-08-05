<?php

$takeMeVowels = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

foreach($takeMeVowels as $key => $letter){
    switch ($letter) {
        case 'a' :
            unset($takeMeVowels[$key]);
            break;
        case 'e' :
            unset($takeMeVowels[$key]);
            break;
        case 'i' :
            unset($takeMeVowels[$key]);
            break;
        case 'o' :
            unset($takeMeVowels[$key]);
            break;
        case 'u' :
            unset($takeMeVowels[$key]);
            break;
        case 'y' :
            unset($takeMeVowels[$key]);
            break;
    }

}
var_dump($takeMeVowels);

/**
 * Created by PhpStorm.
 * User: MacBookPro
 * Date: 7/14/16
 * Time: 9:04 AM
 */