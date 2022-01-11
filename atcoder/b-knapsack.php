<?php
$line = explode(' ', trim(fgets(STDIN)));
$num = $line[0];
$condition = $line[1];
$weight = $line[2];
$itemArray = [];
$conditionArray = [];
$dp1 = [];
for($i = 0; $i <$num; $i++){
  $itemArray[] = explode(' ', trim(fgets(STDIN)));
}
for($j = 0; $j < $condition; $j++){
  if($condition == 0){
    break;
  }else{
    $array = explode(' ', trim(fgets(STDIN)));
    array_push($conditionArray, $array[0], $array[1]);
    $conditionArray = array_values(array_unique($conditionArray));
  }
}
for($w = 0; $w < $num + 1; $w++){
  $dp1[] = array_fill(0, $weight + 1, 0);
  $dp2 = $dp1;
}
$conditionWeight = 0;
$conditionValue = 0;
for($k = 0; $k < count($conditionArray); $k++){
  $itemNum = $conditionArray[$k] - 1;
  $conditionWeight += $itemArray[$itemNum][0];
  $conditionValue += $itemArray[$itemNum][1];
}
$remainWeight = $weight - $conditionWeight;
for($t = 0; $t < $num; $t++){
  // ２個目のループは以下(<=)にする
  for($s = 0; $s <= $remainWeight; $s++){
    $W = $itemArray[$t][0];
    $V = $itemArray[$t][1];
    if($s >= $W){
      $dp1[$t + 1][$s] = max($dp1[$t][$s - $W] + $V, $dp1[$t][$s]);
    }else{
      $dp1[$t + 1][$s] = $dp1[$t][$s];
    }
  }
}
for($a = 0; $a < $num; $a++){
  for($b = 0; $b <= $weight; $b++){
    for($c = 0; $c < count($conditionArray); $c++){
      if($conditionArray[$c] == $a){
        $dp2[$a + 1][$b] = $dp2[$a][$b];
        continue;
      }
      $W = $itemArray[$a][0];
      $V = $itemArray[$a][1];
      if($b >= $W){
        $dp2[$a + 1][$b] = max($dp2[$a][$b - $W] + $V, $dp2[$a][$b]);
      }else{
        $dp2[$a + 1][$b] = $dp2[$a][$b];
      }
    }
  }
}
if($conditionWeight > $weight){
  echo '0'.PHP_EOL;
}else{
  echo max($dp1[$num][$remainWeight] + $conditionValue, $dp2[$num][$weight]) . PHP_EOL;
}

