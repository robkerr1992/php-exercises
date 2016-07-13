<?php
$filename = 'contacts.txt';


do {
    fwrite(STDOUT, "1. View contacts.\n2. Add a new contact.\n3. Search a contact by name.\n4. Delete an existing contact.\n5. Exit.\nEnter an option (1, 2, 3, 4 or 5):\n");
    $userInput = fgets(STDIN);


    if ($userInput == 1) {
        $contents = trim(file_get_contents($filename));
        $contacts = explode("\n", $contents);
        fwrite(STDOUT, "Name | Phone Number\n---------------\n");
        foreach ($contacts as $contact) {
            fwrite(STDOUT, "$contact\n");
        }
        fwrite(STDOUT, "\n");

    } else if ($userInput == 2) {
        fwrite(STDOUT, "What is the name of the contact you want to add? ");
        $newcontact = trim(fgets(STDIN));
        fwrite(STDOUT, "What is $newcontact's number? ");
        $newcontactNumber = trim(fgets(STDIN));
        $handle = fopen($filename, 'a');
        fwrite($handle, "$newcontact | $newcontactNumber\n");
        fclose($handle);
        fwrite(STDOUT, "Added $newcontact to contacts.\n");


    } else if ($userInput == 3) {
        $contents = trim(file_get_contents($filename));
        $contacts = explode("\n", $contents);
        fwrite(STDOUT, "What would you like to search for? ");
        $searchTerm = trim(fgets(STDIN));
        foreach ($contacts as $contact) {
            if (strpos($contact, $searchTerm) !== false) {
                fwrite(STDOUT, "$contact\n");
            }
        }

    } else if ($userInput == 4) {
        $contents = trim(file_get_contents($filename));
        $contacts = explode("\n", $contents);
        fwrite(STDOUT, "Who would you like to delete? ");
        $deleteTerm = trim(fgets(STDIN));
        foreach ($contacts as $contact) {
            if (strpos($contact, $deleteTerm) !== false) {
                $index = array_search($contact, $contacts);
                fwrite(STDOUT, "Deleted $contact\n");
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