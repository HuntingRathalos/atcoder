<?php
    $n = trim(fgets(STDIN));
    if($n % 5 == 0 && $n % 3 == 0){
        echo "FizzBuzz";
    } elseif($n % 3 == 0){
        echo "Fizz";
    } elseif($n % 5 == 0){
        echo "Buzz";
    } else {
        echo $n;
    }
