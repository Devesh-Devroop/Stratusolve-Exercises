<?php 
$json = file_get_contents('php://input');
$data = json_decode($json);
//$data1=array("test"=> "9");
$val = reset($data);
//$arrData = array_values($data);
//echo ($data->input);
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
$cond = $val;
for($i = 0; $i < $cond; $i++){
    echo' '.Fibonacci($i);
    //return var_dump(Fibonacci($i));
}

/*for($i = 0; $i < $cond; $i++){
    if(Fibonacci($i)<= $cond){
        echo Fibonacci($i)." - ";
    }
    else
        return 0;

}*/