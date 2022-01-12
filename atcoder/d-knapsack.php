<?php
$line = explode(' ', trim(fgets(STDIN)));
$num = $line[0];
$weight = $line[1];
$itemArray = [];
$dp = [];
while($array = trim(fgets(STDIN))){
  $itemArray[] = explode(' ', $array);
}
// for($w = 0; $w < $num + 1; $w++){
//   $dp[] = array_fill(0, $weight + 1, 0);
// }
for($k = 0; $k < $weight + 1; $k++){
  $dp[0][$k] = 0;
}
for($i = 0; $i < $num; $i++){
  for($j = 0; $j <= $weight; $j++){
    $W = $itemArray[$i][1];
    $V = $itemArray[$i][0];
    if($j >= $W){
      $dp[$i + 1][$j] = max($dp[$i][$j - $W] + $V, $dp[$i][$j]);
    }else{
      $dp[$i + 1][$j] = $dp[$i][$j];
    }
  }
}
echo $dp[$num][$weight];
// i項目といったら一個前のi-1項目のみ注視する
