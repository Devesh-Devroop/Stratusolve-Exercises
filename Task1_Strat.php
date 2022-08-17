<?php
//Working addAll()
// function addAll(array $numbers){
// $sum = 0;

// for($i = 0; $i < count($numbers);$i++){
//     $sum = (($numbers[$i]) * ($i+1)) + $sum;
//     //array_splice($numbers,0);
//     //echo var_dump($numbers);
//     }echo $sum;



// }

// $test = array(1,2,3,4);
// addAll($test);
//////////////////////////////
// Second part//
//Works perfect
// function addAll(array $numbers){
//     //$numbers = array(1,1,1,1,1);
//     $empty = array();
//     $sum = 0;
//     for($i = 0; $i<count($numbers) || count($numbers) > 0;$i++){
//         $sum = array_sum($numbers) + $sum;
        
//         echo "The sum of the array is :".' '.$sum.'<br>';
//         if(count($numbers) > 0){
//             array_shift($numbers);
//             echo "Count is: ".' '.count($numbers).'<br>';
//         }
        

//     }echo "The sum of the array is :".' '.$sum.'<br>';
// }    
// $numbers = array(1,2,3,4);
// addAll($numbers);   

///////////////////////////////////////

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