<?php
$filename = 'contacts.txt';

$contents = trim(file_get_contents($filename));
$contacts = explode("\n", $contents);
var_dump(array_search("Jack Blank ", $contacts));
do {
    fwrite(STDOUT, "1. View contacts.\n2. Add a new contact.\n3. Search a contact by name.\n4. Delete an existing contact.\n5. Exit.\nEnter an option (1, 2, 3, 4 or 5):\n");
    $userInput = fgets(STDIN);

#1///displays contacts to users/////////////////////////////////////////////////////////////////////////////////////////
    if ($userInput == 1) {
        $contents = trim(file_get_contents($filename));
        $contacts = explode("\n", $contents);
        fwrite(STDOUT, "Name | Phone Number\n---------------\n");
        foreach ($contacts as $contact) {
            list($part1, $part2) = explode('|', $contact);
//            var_dump($part1);
            $part1 = str_pad($part1, 20);
            $part2 = substr($part2, 1, 3) . "-" . substr($part2, 4, 3) . "-" . substr($part2, 7, 4);
            $part2 = str_pad($part2, 14," ", STR_PAD_LEFT);
//            var_dump($part2);
            $contact = $part1 . "|" . $part2;
            fwrite(STDOUT, "$contact\n");
        }
        fwrite(STDOUT, "\n");
#2////adds new contacts to contact.txt file/////////////////////////////////////////////////////////////////////////////
    } else if ($userInput == 2) {
        fwrite(STDOUT, "What is the name of the contact you want to add? ");
        $contactName = trim(fgets(STDIN));
        fwrite(STDOUT, "Is $contactName an existing contact Y/N? ");
        $userInput = trim(fgets(STDIN));
        if ($userInput == "Y" && 'y') {
            fwrite(STDOUT, "Would you like to override existing contact information Y/N? ");
            $userInput = trim(fgets(STDIN));
            if ($userInput == 'Y' && 'y') {
                fwrite(STDOUT, "What is $contactName's number? ");
                $newcontactNumber = trim(fgets(STDIN));
                $contents = trim(file_get_contents($filename));
                $contacts = explode("\n", $contents);
                foreach ($contacts as &$contact){
                    if (strpos($contact, $contactName) !== false) {
                        $contact = "$contactName | $newcontactNumber\n";
                        var_dump($contact);

                        fwrite(STDOUT, "$contactName has been updated\n");
                    }
                }
                $contactString = implode("\n", $contacts);
                $handle = fopen($filename, 'w');
                fwrite($handle, $contactString);
                fclose($handle);
//                var_dump($contacts);
            } else {
                fwrite(STDOUT,"Cool, nevermind...\n");
            }

        } else {
            fwrite(STDOUT, "Making some friends...nice. What is $contactName's number? ");
            $newcontactNumber = trim(fgets(STDIN));
            $handle = fopen($filename, 'a');
            fwrite($handle, "$contactName | $newcontactNumber\n");
            fclose($handle);
            fwrite(STDOUT, "Added $contactName to contacts.\n");
        }

#3//////searches for contacts.txt file for the search term and returns all contacts with the appropriate substring////////
    } else if ($userInput == 3) {
        $contents = trim(file_get_contents($filename));
        $contacts = explode("\n", $contents);
        fwrite(STDOUT, "What would you like to search for? ");
        $searchTerm = trim(fgets(STDIN));
        foreach ($contacts as $contact) {
            if (strpos($contact, $searchTerm) !== false) {
                list($part1, $part2) = explode('|', $contact);
//            var_dump($part1);
                $part1 = str_pad($part1, 20);
                $part2 = substr($part2, 1, 3) . "-" . substr($part2, 4, 3) . "-" . substr($part2, 7, 4);
                $part2 = str_pad($part2, 14," ", STR_PAD_LEFT);
//            var_dump($part2);
                $contact = $part1 . "|" . $part2;
                fwrite(STDOUT, "$contact\n");
            }
        }
#4//////searches for contacts.txt file for the search term and deletes all contacts with the appropriate substring////////////////////////////////////////////////////////////////////
    } else if ($userInput == 4) {
        $contents = trim(file_get_contents($filename));
        $contacts = explode("\n", $contents);
        fwrite(STDOUT, "Who would you like to delete? ");
        $deleteTerm = trim(fgets(STDIN));
        foreach ($contacts as $contact) {
            if (strpos($contact, $deleteTerm) !== false) {
                $index = array_search($contact, $contacts);
                fwrite(STDOUT, "Deleting: $contact\n");

                unset($contacts[$index]);
                $contactString = implode("\n", $contacts);
                $handle = fopen($filename, 'w');
                fwrite($handle, $contactString);
                fclose($handle);
            }
        }

    }
} while ($userInput != 5);
/**
 * Created by PhpStorm.
 * User: R.O.B.
 * Date: 7/12/16
 * Time: 12:00 PM
 */