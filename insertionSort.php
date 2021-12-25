<?php
    $n = trim(fgets(STDIN));
    $array = explode(" ",trim(fgets(STDIN)));

    for($i = 2 ;$i < $n + 1;$i++){
        $test = array_splice($array , 0, $i);
        sort($test);
        $array = array_merge($test,$array);
        $count = 1;
        foreach($array as $value){
            if($count != $n){
                echo $value." ";
            } else {
                echo $value."\n";
            }
            $count++;
        }
    }
