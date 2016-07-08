<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];

$query = 'Tina';

function search($searchTerm, $arrayToSearch)
{
    $result = array_search($searchTerm, $arrayToSearch);
    if ($result !== false)
    {
        echo "true\n";
        return true;
    };
};
search($query, $names);

$i = 0;
$count = 0;
foreach($names as $name){
    if (array_search($name, $compare) !== false){
        $count++;

    }
//    if ($name == $compare[$i]){
//        $count++;
//        echo "Success!\n";
//    } elseif ($i == (count($compare)-1)){
//        echo "$count Matching Indices\n";
//    }
//    $i++;
};
echo "$count\n";