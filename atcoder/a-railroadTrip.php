<?php
$line = explode(' ', trim(fgets(STDIN)));
$N = $line[0];
$M = $line[1];
$destination = explode(' ', trim(fgets(STDIN)));
$price = [];
while($array = trim(fgets(STDIN))){
  $price[] = explode(' ', $array);
}
$s = array_fill(1, $N, 0);
for($n = 0; $n < count($destination) - 1; $n++){
  $a = $destination[$n];
  $b = $destination[$n + 1];
  if($a < $b){
    $s[$a] += 1;
    $s[$b] -= 1;
  }else{
    $s[$b] += 1;
    $s[$a] -= 1;
  }
}

for($i = 1; $i <= $N; $i++){
  if($i == 1){
    continue;
  }
  $s[$i] += $s[$i - 1];
}

$answer = 0;
for($k = 1; $k < $N; $k++){
  $answer += min($price[$k - 1][0] * $s[$k], $price[$k - 1][2] + $price[$k - 1][1] * $s[$k]);
}
echo $answer.PHP_EOL;
