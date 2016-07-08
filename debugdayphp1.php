<?php
$friends = [
    [
        'name' => 'Oliver',
        'books' => [
            'Ansible for DevOps',
            'Servers for hackers',
        ]
    ],
    [
        'name' => 'Barry',
        'books' => [
            'Working effectively with unit tests',
            '50 quick ideas for your tests',
        ],
    ],
    [
        'name' => 'Jessica',
        'books' => [
            'Understanding the 4 rules of simple design',
            'Principles of package design',
        ],
    ],
    [
        'name' => 'Clark',
        'books' => [
            'Selling test driven projects',
        ],
    ]
];

function searchByName($friends, $name) {
    $filtered = [];
    foreach ($friends as $friend) {
        var_dump(strpos($friend['name'], $name));
//        var_dump($name);
        if (strpos($friend['name'], $name) !== false) {
            $filtered[] = $friend;
        }
    }
    return $filtered;

}

do {
    echo '1. Show friends books', PHP_EOL;
    echo '2. Search by name', PHP_EOL;
    echo '3. Exit', PHP_EOL;
    $option = fgets(STDIN);

    switch ($option) {
        case 1:
            // TODO: Implement this one later...
            break;
        case 2:
            //It's not returning an array with the names that are similar to $name
            echo 'Please enter a name: ';
            $name = trim(fgets(STDIN));
            var_dump(searchByName($friends, $name));
            break;
    }
} while ($option != 3);
/**
 * Created by PhpStorm.
 * User: MacBookPro
 * Date: 7/8/16
 * Time: 9:03 AM
 */