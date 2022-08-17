<?php
//FIBONACCI ITERATIVE
function Fib($number){
    $number1 = 0;
    $number2 = 1;
    $i = 0; // counter

    while($i < $number){
        echo ' '.$number1; // print the value of the number
        $number3 = $number2 + $number1; // create a variable that contains the sum of the previous 2 terms
        $number1 = $number2;//re-assign number1 to the next number(num2)
        $number2 = $number3;//re-assign number2 to number3 (sum of the previous 2 terms)
        $i++;// increment accordingly
    }
}
$number = 10;
Fib($number);

//FIBONACCI RECURSIVE
function Fibonacci($num){
    if($num == 0){
        return 0;
    }
    elseif($num==1){
        return 1;
    }
    else
        return (Fibonacci($num-1)+Fibonacci($num-2)); // from num = 2, it returns the next value added with the curent value
    
}
// $num = 10;
for($i = 0; $i < 10; $i++){
    echo' '.Fibonacci($i);
    //return var_dump(Fibonacci($i));
}