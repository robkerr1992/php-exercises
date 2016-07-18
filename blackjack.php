<?php
// create an array for suits
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
    shuffle($deck);
    return $deck;
};
// determine if a card is an ace
// return true for ace, false for anything else
function cardIsAce($card) {
    if (strpos($card, 'A') !== false) {
        return true;
    }
    else {
        return false;
    }
};
// determine the value of an individual card (string)
// aces are worth 11
// face cards are worth 10
// numeric cards are worth their value
function getCardValue($card) {
    if (cardIsAce($card)) {
        return 11;
    } elseif (strpos($card, 'K') !== false || strpos($card, 'Q') !== false || strpos($card, 'J') !== false || strpos($card, '10') !== false) {
        return 10;
    } else {
        list($value, $suit) = explode(' ',$card);
        return intval($value);
    };

};
// get total value for a hand of cards
// don't forget to factor in aces
// aces can be 1 or 11 (make them 1 if total value is over 21)
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
// draw a card from the deck into a hand
// pass by reference (both hand and deck passed in are modified)
function drawCard(&$hand, &$deck) {
    array_push($hand, array_shift($deck));
};
// print out a hand of cards
// name is the name of the player
// hidden is to initially show only first card of hand (for dealer)
// output should look like this:
// Dealer: [4 C] [???] Total: ???
// or:
// Player: [J D] [2 D] Total: 12
function echoHand($hand, $name, $hidden = false) {
    if ($hidden){
        fwrite(STDOUT, "$name: ");
        fwrite(STDOUT, "[$hand[0]] [???] ");
        fwrite(STDOUT, "Total: ???\n");
    } else {
        fwrite(STDOUT, "$name: ");
        foreach ($hand as $card) {
            fwrite(STDOUT, "[$card] ");
        }
        fwrite(STDOUT, 'Total:' . getHandTotal($hand) . "\n");
    };
};

function insurance($hand) {


};

$playerChips = 1000;
do {


    // build the deck of cards
    //$deck = ["A H","4 S","K H","7 H","3 S","3 H"];
    $deck = buildDeck($suits, $cards);
    //var_dump($deck);

    // initialize a dealer and player hand
    $dealer = [];
    $player = [];
    // dealer and player each draw two cards
    fwrite(STDOUT, "You have $playerChips chips.\n");
    fwrite(STDOUT, 'How much would you like to bet? ');
    $playerBet = intval(trim(fgets(STDIN)));
    fwrite(STDOUT, "Player has bet $playerBet\n");
    drawCard($dealer, $deck);
    drawCard($dealer, $deck);
    drawCard($player, $deck);
    drawCard($player, $deck);
    //var_dump($player);
    //var_dump($dealer);
    // echo the dealer hand, only showing the first card
    echoHand($dealer,'Dealer', true);
    // echo the player hand
    echoHand($player,'Rob');
    $playerTotal = getHandTotal($player);
    $dealerTotal = getHandTotal($dealer);
    $userInput = "";
    $continue = true;
    //// ask if they want insurance///////////
    if (cardIsAce($dealer[0])) {
        fwrite(STDOUT, 'Would you like to buy insurance (Y)es or (N)o? ');
        $insurance = strtolower(trim(fgets(STDIN)));
        $dealerTotal = getHandTotal($dealer);
        if ($insurance == 'y') {
            fwrite(STDOUT, "Insurance has been purchased.\n");
            if ($dealerTotal == 21) {
                fwrite(STDOUT, "Dealer has 21. Good purchase.\n");
                $continue = false;

            } else {
                fwrite(STDOUT, "No Blackjack.\n");
            };
        } else {
            fwrite(STDOUT, "Insurance has NOT been purchased.\n");
            if ($dealerTotal == 21) {
                fwrite(STDOUT, "Dealer has 21.\n");
                $continue = false;

            } else {
                fwrite(STDOUT, "No Blackjack.\n");
            };
        };
    };
    //// allow player to "(H)it or (S)tay?" till they bust (exceed 21) or stay
    while (($userInput != 's' && $playerTotal < 21) && ($continue == true)) {
        $playerTotal = getHandTotal($player);
        if ($playerTotal == 21) {
            fwrite(STDOUT, "Winner Winner Chicken Dinner!!\n");
            $playerChips += $playerBet;
            break;
        } elseif ($playerTotal > 21) {
            fwrite(STDOUT, "His Name was Busto Douglas.\n");
            $playerChips -= $playerBet;
            break;
        };
        fwrite(STDOUT, '(H)it or (S)tay? ');
        $userInput = trim(strtolower(fgets(STDIN)));
        if ($userInput == 'h') {
            drawCard($player, $deck);
            echoHand($player, 'Rob');
        };

    };
    $playerTotal = getHandTotal($player);
    echoHand($dealer,'Dealer');
    //// show the dealer's hand (all cards)
    if ($playerTotal < 21) {
        while ($dealerTotal < 17) {
            drawCard($dealer, $deck);
            echoHand($dealer, 'Dealer');
            $dealerTotal = getHandTotal($dealer);
        };
        if ($dealerTotal > 21) {
            fwrite(STDOUT, "Dealer has Busted. Such Cards, Many Wins.\n");
            $playerChips += $playerBet;
        } elseif ($dealerTotal < $playerTotal) {
            fwrite(STDOUT, "Winner! Winner! Fair and Square.\n");
            $playerChips += $playerBet;
        } elseif ($dealerTotal == $playerTotal) {
            fwrite(STDOUT, "Push! Try Again.\n");
        } else {
            fwrite(STDOUT, "Dealer Wins!\n");
            $playerChips -= $playerBet;
        }
    };
} while ($playerChips > 0);
// todo
// todo (all comments below)
// at this point, if the player has more than 21, tell them they busted
// otherwise, if they have 21, tell them they won (regardless of dealer hand)
// if neither of the above are true, then the dealer needs to draw more cards
// dealer draws until their hand has a value of at least 17
// show the dealer hand each time they draw a card
// finally, we can check and see who won
// by this point, if dealer has busted, then player automatically wins
// if player and dealer tie, it is a "push"
// if dealer has more than player, dealer wins, otherwise, player wins
/**
 * Created by PhpStorm.
 * User: MacBookPro
 * Date: 7/14/16
 * Time: 8:10 PM
 */