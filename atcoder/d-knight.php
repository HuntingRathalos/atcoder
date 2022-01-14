<?php
$line = explode(' ', trim(fgets(STDIN)));
$x = $line[0];
$y = $line[1];
$mod = 1000000007;
// $n + 2 * $m = $x;
// 2 * $n + $m = $y;
// 3 * $n + 3 * $m = $x + $y;
// $n + $m = ($x + $y) / 3;
$array = getNM($x, $y);
if($array == 0){
  echo "0".PHP_EOL;
}else{
  $n = $array[0];
  $h = $array[1];

  $a = factorial($n, $mod);
  $b = factorial($h, $mod);
  $c = factorial(abs($n - $h), $mod);
  $d = ($b * $c) % $mod;
  $answer = 0;
  $answer = $a * modPow($d, $mod - 2, $mod) % $mod;
  echo $answer.PHP_EOL;
}

function getNM($x, $y){
  if(($x + $y) % 3 != 0){
    return 0;
  }
  $n = (-$x + 2 * $y) / 3;
  $m = (2 * $x - $y) / 3;
  if($n < 0 || $m < 0){
    return 0;
  }
  return [$n + $m, $n];
}

function factorial($num, $mod){
  $fact = 1;
  for($f = 2; $f <=$num; $f++){
    $fact = ($fact * $f) % $mod;
  }
  return $fact;
}
function modPow($num, $index, $mod){
  if($index == 1){
    return $num % $mod;
  }
  if($index % 2 == 1){
    $e = ($num * modPow($num, $index - 1, $mod));
    return $e % $mod;
  }else{
    $t = modPow($num, $index / 2, $mod);
    return ($t * $t) % $mod;
  }
}
