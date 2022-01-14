<?php
$line = explode(' ', trim(fgets(STDIN)));
$w = $line[0] - 1;
$h = $line[1] - 1;
$n = $w + $h;
$array = [];
$mod = 1000000007;

$a = factorial($n, $mod);
$b = factorial($h, $mod);
$c = factorial(abs($n - $h), $mod);
$d = ($b * $c) % $mod;
$answer = 0;
$answer = $a * modPow($d, $mod - 2, $mod) % $mod;
echo $answer.PHP_EOL;
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
