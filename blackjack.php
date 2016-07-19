<?php
// create an array for suits
$suits = ['C', 'H', 'S', 'D'];
// create an array for cards
$cards = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
// build a deck (array) of cards
// card values should be "VALUE SUIT". ex: "7 H"
// make sure to shuffle the deck before returning it
function buildDeck($suits, $cards)
{
    $deck = [];
    foreach ($cards as $card) {
        foreach ($suits as $suit) {
            array_push($deck, "$card $suit");
        }
    }
    shuffle($deck);
    return $deck;
}

;
// determine if a card is an ace
// return true for ace, false for anything else
function cardIsAce($card)
{
    if (strpos($card, 'A') !== false) {
        return true;
    } else {
        return false;
    }
}

;
// determine the value of an individual card (string)
// aces are worth 11
// face cards are worth 10
// numeric cards are worth their value
function getCardValue($card)
{
    if (cardIsAce($card)) {
        return 11;
    } elseif (strpos($card, 'K') !== false || strpos($card, 'Q') !== false || strpos($card, 'J') !== false) {
        return 10;
    } else {
        list($value, $suit) = explode(' ', $card);
        return intval($value);
    };

}

;
// get total value for a hand of cards
// don't forget to factor in aces
// aces can be 1 or 11 (make them 1 if total value is over 21)
function getHandTotal($hand)
{
    $handvalue = 0;
    foreach ($hand as $card) {
        $handvalue += getCardValue($card);
    };
    $handstring = implode('&', $hand);
    for ($i = 0; $i < substr_count($handstring, 'A'); $i++) {
        if ($handvalue > 21 && strpos($handstring, 'A') !== false) {
            $handvalue -= 10;
        };
    };
    return $handvalue;
}

;
// draw a card from the deck into a hand
// pass by reference (both hand and deck passed in are modified)
function drawCard(&$hand, &$deck)
{
    array_push($hand, array_shift($deck));
}

;

// Dealer: [4 C] [???] Total: ???
// or:
// Player: [J D] [2 D] Total: 12
function echoHand($hand, $name, $hidden = false)
{
    if ($hidden) {
        fwrite(STDOUT, "$name: ");
        fwrite(STDOUT, "[$hand[0]] [???] ");
        fwrite(STDOUT, 'Total: ' . getCardValue($hand[0]) . " is showing.\n");
    } else {
        fwrite(STDOUT, "$name: ");
        foreach ($hand as $card) {
            fwrite(STDOUT, "[$card] ");
        }
        fwrite(STDOUT, 'Total: ' . getHandTotal($hand) . "\n");
    };
}

;
fwrite(STDOUT, 'How many chips would you like? ');
$playerChips = trim(fgets(STDIN));
$deck = buildDeck($suits, $cards);

do {
    // build the deck of cards
//    $deck = ["K H", "A S", "K C", "6 H", "A S", "10 H", "10 D", "10 C"];
    //var_dump($deck);

    // initialize a dealer and player hand
    $dealer = [];
    $player = [];
    $playerSplit = [];
    // dealer and player each draw two cards
    fwrite(STDOUT, "You have $playerChips chips.\n");
    fwrite(STDOUT, 'How much would you like to bet? ');
    $playerBet = intval(trim(fgets(STDIN)));
    fwrite(STDOUT, "Player has bet $playerBet\n");
    drawCard($player, $deck);
    drawCard($dealer, $deck);
    drawCard($player, $deck);
    drawCard($dealer, $deck);
    //var_dump($player);
    //var_dump($dealer);
    // echo the dealer hand, only showing the first card
    echoHand($dealer, 'Dealer', true);
    // echo the player hand
    echoHand($player, 'Rob');
    $playerTotal = getHandTotal($player);
    $dealerTotal = getHandTotal($dealer);
    $userInput = "";
    $continue = true;
    $doubleDown = false;

    if ($playerTotal == 21) {     ///////////// checks if player has blackjack
        fwrite(STDOUT, "Blackjack!!!!\n");
        $playerChips += ($playerBet * 1.5);
        $continue = false;
    } elseif (cardIsAce($dealer[0])) {   //// ask if they want insurance///////////
        fwrite(STDOUT, 'Would you like to buy insurance (Y)es or (N)o? ');
        $userInput = strtolower(trim(fgets(STDIN)));
        $dealerTotal = getHandTotal($dealer);
        if ($userInput == 'y') {
            fwrite(STDOUT, "Insurance has been purchased.\n");
            $playerChips -= ($playerBet / 2);
            fwrite(STDOUT, "Player has $playerChips chips.\n");
            if ($dealerTotal == 21) {
                fwrite(STDOUT, "Dealer has 21. You are wise like wizard.\n");
                $continue = false;

            } else {
                fwrite(STDOUT, "No Blackjack.\n");
            };
        } else {
            fwrite(STDOUT, "No Insurance.\n");
            if ($dealerTotal == 21) {
                fwrite(STDOUT, "Dealer has 21.\n");
                $playerChips -= $playerBet;
                $continue = false;

            } else {
                fwrite(STDOUT, "No Blackjack.\n");
            };
        };
    };

    $userInput = '';

    if ($playerTotal == 10 || $playerTotal == 11) {    /////////// double down script /////////////////
        fwrite(STDOUT, 'Would you like to double down? This will double your bet. (Y)es or (N)o? ');
        $userInput = strtolower(trim(fgets(STDIN)));
        if ($userInput == 'y') {
            $playerBet += $playerBet;
            drawCard($player, $deck);
            $continue = false;
            $doubleDown = true;
            echoHand($player, 'Player');
        }

    };


    /////////////checks and asks if player whats to split
    if (substr($player[0], 0, 2) == substr($player[1], 0, 2)) {
        fwrite(STDOUT, "Would you like to split your " . trim(substr($player[0], 0, 2)) . "'s (Y)es or (N)o? ");
        $userInput = strtolower(trim(fgets(STDIN)));
        if ($userInput == 'y') {
            array_push($playerSplit, array_pop($player));
            fwrite(STDOUT, "Action Chuck Lineberry!! First hand, Moneybags:\n");

            echoHand($playerSplit, 'Player');
            $splitTotal = getHandTotal($playerSplit);
            while ($userInput != 's' && $splitTotal < 21) {
                $splitTotal = getHandTotal($playerSplit);
                if ($splitTotal == 21) {
                    fwrite(STDOUT, "21!!!\n");
                    break;
                } elseif ($splitTotal > 21) {
                    fwrite(STDOUT, "Player has $splitTotal.\n");
                    fwrite(STDOUT, "What's up, Busto Douglas.\n");
                    $playerChips -= $playerBet;
                    fwrite(STDOUT, "Player has $playerChips chips.\n");
                    break;
                };

                fwrite(STDOUT, '(H)it or (S)tay? ');
                $userInput = trim(strtolower(fgets(STDIN)));

                if ($userInput == 'h') {
                    drawCard($playerSplit, $deck);
                    echoHand($playerSplit, 'Player');
                };


            };

        } else {
            fwrite(STDOUT, "Whatever, Nit.\n");
        };

        fwrite(STDOUT, "Heads up, Cowboy:\n");
        echoHand($player, 'Player');
    };


    //// allow player to "(H)it or (S)tay?" till they bust (exceed 21) or stay
    $userInput = "";

    while (($userInput != 's' && $playerTotal < 21) && $continue) {
        $playerTotal = getHandTotal($player);
        if ($playerTotal == 21) {
            fwrite(STDOUT, "21!!!\n");
            break;
        } elseif ($playerTotal > 21) {
            fwrite(STDOUT, "Player has $playerTotal.\n");
            fwrite(STDOUT, "What's up, Busto Douglas.\n");
            $playerChips -= $playerBet;
            break;
        };

        fwrite(STDOUT, '(H)it or (S)tay? ');
        $userInput = trim(strtolower(fgets(STDIN)));

        if ($userInput == 'h') {
            drawCard($player, $deck);
            echoHand($player, 'Player');
        };

    };

    $playerTotal = getHandTotal($player);
    echoHand($dealer, 'Dealer');
    $dealerHandString = implode('&', $dealer);


    //// show the dealer's hand (all cards)
    if ($playerTotal < 21 || ($doubleDown && $playerTotal < 21)) {
        while ($dealerTotal < 17 || (($dealerTotal <= 17) && (substr_count($dealerHandString, 'A') > 0))) {
            drawCard($dealer, $deck);
            echoHand($dealer, 'Dealer');
            $dealerTotal = getHandTotal($dealer);
        };
        fwrite(STDOUT, "Player: $playerTotal.\n");
        fwrite(STDOUT, "Dealer: $dealerTotal.\n");
        if ($dealerTotal > 21) {
            fwrite(STDOUT, "Dealer has busted. Such chips, many wins.\n");
            $playerChips += $playerBet;
        } elseif ($dealerTotal < $playerTotal) {
            fwrite(STDOUT, "Player triumphs!\n");
            $playerChips += $playerBet;
        } elseif ($dealerTotal == $playerTotal) {
            fwrite(STDOUT, "Push! Try again.\n");
        } elseif ($dealerTotal > $playerTotal && $continue) {
            fwrite(STDOUT, "Waxahachied.\n");
            fwrite(STDOUT, "He split your wig, Son.\n");
            fwrite(STDOUT, "Dealer is victorious. Womp womp.\n");
            $playerChips -= $playerBet;
        };

    } elseif ($playerTotal == 21 || ($playerTotal == 21 && $doubleDown)) {
        fwrite(STDOUT, "Player: $playerTotal.\n");
        fwrite(STDOUT, "Dealer: $dealerTotal.\n");
        fwrite(STDOUT, "Winner, winner chicken dinner!!\n");
        $playerChips += $playerBet;
    };

    if ($playerSplit != [] && $splitTotal < 21) {
        fwrite(STDOUT, "Split: $splitTotal");
        fwrite(STDOUT, "Dealer: $dealerTotal.\n");
        if ($dealerTotal > 21) {
            fwrite(STDOUT, "Dealer has busted. Such chips. Many wins.\n");
            $playerChips += $playerBet;
        } elseif ($dealerTotal < $splitTotal) {
            fwrite(STDOUT, "Player triumphs!\n");
            $playerChips += $playerBet;
        } elseif ($dealerTotal == $splitTotal) {
            fwrite(STDOUT, "Push! Try again.\n");
        } elseif ($dealerTotal > $splitTotal) {
            fwrite(STDOUT, "Waxahachied.\n");
            fwrite(STDOUT, "He split your wig, Son.\n");
            fwrite(STDOUT, "Dealer is victorious. Womp womp.\n");
            $playerChips -= $playerBet;
        };

    } elseif ($playerSplit != [] && $splitTotal == 21) {
        fwrite(STDOUT, "Split: $splitTotal.\n");
        fwrite(STDOUT, "Dealer: $dealerTotal.\n");
        fwrite(STDOUT, "21, Player. Operation Split is a success.\n");
        $playerChips += $playerBet;
    };

    if (count($deck) < 10) {
        $deck = [];
        $deck = buildDeck($suits, $cards);
        fwrite(STDOUT, "Deck is low on cards. Shuffling....\n");

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