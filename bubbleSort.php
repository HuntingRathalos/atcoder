<?php
    $n = trim(fgets(STDIN));
    $array = explode(" ",trim(fgets(STDIN)));
    for($i = 0;$i < $n- 1;$i++){
        for($j = $n - 1;$j >= 0;$j--){
            $a = $array[$j];
            $b = $array[$j - 1];
            if($a < $b){
                $array[$j - 1] = $a;
                $array[$j] = $b;
            }
        }

        $array_count = count($array);
        $count = 1;
        foreach($array as $value){
            if($array_count != $count){
                echo $value." ";
            } else {
                echo $value."\n";
            }
            $count++;
        }
    }
