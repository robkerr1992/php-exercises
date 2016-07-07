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
echo "Hello, we're going to calculate your total grade average.\n";
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


    } while (prompt("Moar subjects Y or N? ") != 'N' && 'n');

} while (prompt("Another student Y or N? ") != 'N' && 'n');

//print_r($students);

echo "======\n======\n======\n======\n";
foreach($students as $student => $subjects)
{
    $total = average($subjects);
    echo "This is what $student got:\n";

    foreach($subjects as $subject => $grade)
    {
        echo "$grade in $subject\n";
    }
    echo "$student has an average of $total\n";
};








