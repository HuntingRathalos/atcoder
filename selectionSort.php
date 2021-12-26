<?php
    $n = trim(fgets(STDIN));
    $array1 = explode(" ",trim(fgets(STDIN)));
    $array2 = array();

    for($i = 0;$i < $n- 1;$i++){
        $min = min($array1);
        $key = array_search($min,$array1);
        $test = $array1[0];
        array_push($array2,$min);
        $array1[$key] = $test;
        $array1 = array_splice($array1 , -$n + ($i +1));
        foreach($array2 as $value){
            echo $value." ";
        }
        $array_count = count($array1);
        $count = 1;
        foreach($array1 as $value){
            if($array_count != $count){
                echo $value." ";
            } else {
                echo $value."\n";
            }
            $count++;
        }
    }
