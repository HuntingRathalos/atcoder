<?php
$queryNum = trim(fgets(STDIN));
$queryArray = [];
while($line = trim(fgets(STDIN))){
  $queryArray[] = explode(' ', $line);
}
$s = [];
$s[0] = 0;
$isPrime = [];
$isPrime = array_pad($isPrime, 10**5 + 10, 1);
$isPrime[0] = 0;
$isPrime[1] = 0;
$sqrt = floor(sqrt(10**5));
for($i = 2; $i <= $sqrt; $i++){
  if($isPrime[$i] == 0){
    continue;
  }
  if(primeNumber($i) == true){
    for($k = $i * 2; $k < 10**5; $k+= $i){
      $isPrime[$k] = 0;
    }
  }
}

$a = [];
$a = array_pad($a, 10**5 + 10, 0);
for($m = 0; $m <= 10**5; $m++){
  if($m % 2 == 0){
    continue;
  }
  if($isPrime[$m] == 1 && $isPrime[($m + 1) / 2] == 1){
    $a[$m] = 1;
  }
}
for($j = 0; $j <= 10**5; $j++){
  $s[$j + 1] = $s[$j] + $a[$j];
}
$answer = 0;
for($b = 0; $b < $queryNum; $b++){
  $l = $queryArray[$b][0];
  $r = $queryArray[$b][1];
  if($l == $r){
    echo $a[$l].PHP_EOL;
    continue;
  }else{
    $answer = $s[$r] - $s[$l];
    echo $answer.PHP_EOL;
  }
}


function primeNumber($num){
  $flag = true;
  for($divideNum = 2; $divideNum < $num; $divideNum++){
    if($num % $divideNum == 0){
      $flag = false;
      break;
    }
  }
  return $flag;
}
