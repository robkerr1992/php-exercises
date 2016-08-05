<?php

$suits = ['C', 'H', 'S', 'D'];
// create an array for cards
$cards = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
// build a deck (array) of cards
// card values should be "VALUE SUIT". ex: "7 H"
// make sure to shuffle the deck before returning it
function buildDeck($suits, $cards) {
    $deck = [];
    foreach ($cards as $card){
        foreach($suits as $suit) {
            array_push($deck, "$card $suit");
        }
    }
    return $deck;
};
buildDeck($suits, $cards);


function getCardValue($card) {
    list($value, $suit) = explode(' ', $card);
    if ($value == "A") {
        return 11;
    } elseif ($value == "K" || $value == "Q" || $value == "J") {
        return 10;
    } else {
        return intval($value);
    };

};


function cardIsAce($card) {
    if (strpos($card, 'A') !== false) {
        return true;
    }
    else {
        return false;
    }
}
$hand = ["A H", "9 S", "A D"];


function getHandTotal($hand) {
    $handvalue = 0;
    foreach ($hand as $card){
        $handvalue += getCardValue($card);
    }
    $handstring = implode('&', $hand);
    if ($handvalue > 21 && strpos($handstring, 'A') !== false){
        $handvalue -= 10;

    }

    return $handvalue;
};

function echoHand($hand, $name, $hidden = false) {
    if ($hidden){
        fwrite(STDOUT, "$name: ");
        fwrite(STDOUT, "[$hand[0]] [???] ");
        fwrite(STDOUT, 'Total: ???');
    } else {
        fwrite(STDOUT, "$name: ");
        foreach ($hand as $card) {
            fwrite(STDOUT, "[$card] ");
        }
        fwrite(STDOUT, 'Total:' . getHandTotal($hand));
    };
};
echoHand($hand, 'Rob');
/**
 * Created by PhpStorm.
 * User: MacBookPro
 * Date: 7/14/16
 * Time: 8:31 PM
 */