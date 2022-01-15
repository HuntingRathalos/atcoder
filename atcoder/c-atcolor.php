<?php
$num = trim(fgets(STDIN));
$range = [];
while($array = trim(fgets(STDIN))){
  $range[] = explode(' ', $array);
}
$empArray = [];
$tmpArray = array_fill(0, 10**6 + 1, 0);
for($i = 0; $i < $num; $i++){
  $a = $range[$i][0];
  $b = $range[$i][1];
  $tmpArray[$a] += 1;
  if($b < count($tmpArray) - 1){
    $tmpArray[$b + 1] -= 1;
  }
}

for($j = 0; $j <= 10**6; $j++){
  if($j == 0){
    continue;
  }
  $tmpArray[$j] += $tmpArray[$j - 1];
}

echo max($tmpArray).PHP_EOL;
