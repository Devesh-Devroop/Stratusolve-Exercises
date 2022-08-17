<?php
//Working addAll()
function addAll(array $numbers){
$sum = 0;

for($i = 0; $i < count($numbers);$i++){
    $sum = (($numbers[$i]) * ($i+1)) + $sum;

    }echo "The sum of all the iterations is: ".' '.$sum."<br>";
    foreach($numbers as $key=>$val){
        unset($numbers[$key]);
    }
    echo "The size of the input array is: "." ".count($numbers);



}

$test = array(1,2,3,4,9);
addAll($test);
//////////////////////////////

/////////////////////////////////////// Below is the correct one for iterative.

function addAll($numbers){
    $total = 0;
    $i = 0;
    while($i<count($numbers) || count($numbers)>0){
        if(count($numbers)==0){
            return 1;
        }
        elseif(count($numbers)!=0){
            $total = $total + array_sum($numbers);
            array_shift($numbers);
        }
        $i++;

    }//addAll use previous values to get next values
    echo $total;
    return $total;

}

$test = array(1,2,3,4);
addAll($test);