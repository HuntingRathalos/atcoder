<?php
$num = trim(fgets(STDIN));

function solve ($num)
{
  $count = 0;
  for($i = 1; $i <= $num; $i++){
    if($num % $i === 0){
      $count++;
    }
  }
  if($count === 8 && $num % 2 === 1){
    return true;
  }else{
    return false;
  }
}

$answer = 0;
for($j = 1; $j <= $num; $j++){
  if(solve($j) === true){
    $answer++;
  }
}
echo $answer;

