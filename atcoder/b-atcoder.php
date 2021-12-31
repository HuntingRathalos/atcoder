<?php
$string = trim(fgets(STDIN));
$stringArray = str_split($string);

  $count = 0;
  $flag = true;
  $maxArray = [];
  for($j = 0; $j < count($stringArray); $j++){
    $target = $stringArray[$j];
    if($flag === false){
      $maxArray[] = $count;
      $count = 0;
    }
    if($target === 'A' || $target === 'C' || $target === 'G' || $target === 'T'){
      $flag = true;
      $count++;
    }else{
      $flag = false;
    }
  }
  if($flag === true){
    $maxArray[] = $count;
  }elseif(count($stringArray) === 1 && $flag === false){
    $maxArray[] = 0;
  }elseif($flag === false){
    $maxArray[] = $count;
  }

rsort($maxArray);
echo $maxArray[0];
