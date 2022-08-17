<?php
$itemsArr = array("Baseball Bat" => "John","Golf ball" => "Stan", "Tennis Racket" => "John" );
function groupByOwners($itemsArr){
// Will have to use foreach loop to step through every item
    $groupArray = array();
    foreach($itemsArr as $object => $owner){
        $groupArray[$owner][] = $object;

    }
    echo json_encode($groupArray);
    // echo '<pre>';
    // var_dump($groupArray);
    // echo '</pre>';
    
    
}
groupByOwners($itemsArr);