<?php
$line = explode(' ', trim(fgets(STDIN)));
$townNum = $line[0];
$dayNum = $line[1];
$distanceArray = [];
$movementArray = [];
for($n = 0; $n < $townNum - 1; $n++){
  $distanceArray[] = trim(fgets(STDIN));
}
for($k = 0; $k < $dayNum; $k++){
  $a = trim(fgets(STDIN));
  $movementArray[$k] = $a;
}
$s = [];
$s[0] = 0;
for($i = 0; $i < $townNum - 1; $i++){
  $s[$i + 1] = $s[$i] + $distanceArray[$i];
}

$answer = 0;
$cur = 0;
for($j = 0; $j < $dayNum; $j++){
  $next = $cur + $movementArray[$j];
  $answer += abs($s[$next] - $s[$cur]);
  $cur = $next;
  $answer %= 100000;
  // if($j == 0){
  //   $move1 = 0;
  //   $move2 = $movementArray[$j + 1];
  // }else{
  //   $move1 = $movementArray[$j];
  //   $move2 = $movementArray[$j + 1];
  //   $move3 = $movementArray[$j - 1];
  // }
  // if($move2 > 0){
  //   $answer += $s[$move1 + $move2] - $s[$move1];
  // }else{
  //   $answer += $s[$move1 + $move3] - $s[abs($move2)];
  // }
}
echo $answer.PHP_EOL;
