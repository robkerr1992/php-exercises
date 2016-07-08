<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];

$query = 'Tina';

//function search($searchTerm, $arrayToSearch)
//{
//    $result = array_search($searchTerm, $arrayToSearch);
//    if ($result !== false)
//    {
//        echo "true\n";
//        return true;
//    };
//    return false;
//};
//search($query, $names);
//
//$i = 0;
//
//
//$count = 0;
//foreach($names as $name){
//    if (array_search($name, $compare) !== false){
//        $count++;
//
//    }
////    if ($name == $compare[$i]){
////        $count++;
////        echo "Success!\n";
////    } elseif ($i == (count($compare)-1)){
////        echo "$count Matching Indices\n";
////    }
////    $i++;
//};
//echo "$count\n";


function combine_arrays($array1, $array2){
    $newarray = [];
    for ($i = 0; $i < count($array1); $i++){
        if($array1[$i] == $array2[$i]){
            array_push($newarray, $array1[$i]);

        } else {

            array_push($newarray, $array1[$i], $array2[$i]);
        }

    }
    return($newarray);

}
print_r(combine_arrays($names, $compare));