<?php

function parseContacts($filename)
{
    $filename = 'contacts.txt';
    $contents = trim(file_get_contents($filename));
//    $handle = fopen($filename, 'r');  ^^^^^^same as line above^^^^^^^
//    $contents = trim(fread($handle, filesize($filename))); ^^^^^^^^^^^^^^^^^^
//    fclose($handle); ^^^^^^^^^^^^^^
    $contacts = explode("\n", $contents);
    foreach ($contacts as $contact) {
        $information = explode("|", $contact);
        $information[1] = substr($information[1], 0, 3) . "-" . substr($information[1], 3, 3) . "-" . substr($information[1], 6, 4);
        $person = [
            'name' => $information[0],
            'phone number' => $information[1]
        ];
        $finalArray[] = $person;


    }


    return $finalArray;
}

var_dump(parseContacts('contacts.txt'));
