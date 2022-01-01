<?php
$count = trim(fgets(STDIN));
$num = trim(fgets(STDIN));

$answer = 0;
  for($j = 0; $j < 10; $j++){
    $string = '';

    if(strstr($num, (string)$j) !== false){
      $string = strstr($num, (string)$j);
      $string = substr($string, 1);

      for($k = 0; $k < 10; $k++){
        if(strstr($string, (string)$k) !==false){
          $string2 = strstr($string, (string)$k);
          $string2 = substr($string2, 1);

          for($n = 0; $n < 10; $n++){
            if(strstr($string2, (string)$n) !==false){
              $answer++;
            }
          }
        }else{
          continue;
        }
      }
    }else{
      continue;
    }
  }

echo $answer;
