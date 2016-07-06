<?php

function prompt($message)
{
    fwrite(STDOUT, $message);
    return trim(fgets(STDIN));
};

function average($array)
{
    $total = 0;
    $count = 0;
    foreach($array as $number)
    {
        $total += $number;
        $count++;
    };
    return ($total / $count);
};



$students = [];

$i = 0;
do
{
    $subjects = [];
    $name = prompt("What is your name? ");

    do {
        //    $grades = [];
        $subject = prompt("What is the subject? ");
        //    do { // if you want to add multiple grades per subject
        $grades = prompt("What is your grade? ");
        //    } while (prompt('Moar grades Y or N?') == 'Y');

        $subjects[$subject] = $grades;
        $students[$name] = $subjects;


    } while (prompt('Moar subjects Y or N? ') != 'N');

} while (prompt('Another Student Y or N? ') != 'N');

//print_r($students);


foreach($students as $student => $subjects)
{
    $total = average($subjects);

    foreach($subjects as $subject => $grade)
    {
        echo "$student got a $grade in $subject" . PHP_EOL;
    }
    echo "$student averaged a $total" . PHP_EOL;
};








