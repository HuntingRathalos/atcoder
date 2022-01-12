<?php
$line = explode(' ', trim(fgets(STDIN)));
$N = $line[0];
$K = $line[1];
$scheduleArray = [];
$dp = [];
while($a = trim(fgets(STDIN))){
  $array = explode(' ', $a);
  $scheduleArray[$array[0] - 1] = $array[1];
}
for($i = 0; $i < $N; $i++){
  if(empty($scheduleArray[$i])){
    $scheduleArray[$i] = 0;
  }else{
    continue;
  }
}
for($f = 0; $f < $N + 1; $f++){
  for($g = 1; $g <= 3; $g++){
    for($h = 1; $h <= 3; $h++){
      $dp[$f][$g][$h] = 0;
    }
  }
}
for($n = 0; $n < $N; $n++){
  for($a = 1; $a <=3; $a++){
    for($b = 1; $b <=3; $b++){
      if($scheduleArray[$n] > 0 && $scheduleArray[$n] != $a){
        continue;
      }
      for($c = 1; $c <= 3; $c++){
        if($n >= 2 && $a == $b && $b == $c){
          continue;
        }else{
          $dp[$n + 1][$a][$b] += $dp[$n][$b][$c];
          $dp[$n + 1][$a][$b] %= 10000;
        }
      }
    }
  }
}
$answer = 0;
for($d = 1; $d <= 3; $d++){
  for($e = 1; $e <= 3; $e++){
    $answer += $dp[$N][$d][$e];
    $answer %= 10000;
  }
}
echo $answer.PHP_EOL;
