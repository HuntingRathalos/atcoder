<?php
// $num = trim(fgets(STDIN));
// $numArray = explode(' ', trim(fgets(STDIN)));
// $dp = [];
// for($i = 0;$i < $num + 1; $i++){
//   $dp[] = array_fill(0, 21, 0);
// }
// $dp[1][$numArray[0]] = 1;

// for($j = 1; $j < $num; $j++){
//   for($w = 0; $w < 21; $w++){
//     if($w - $numArray[$j] >= 0){
//       $dp[$j + 1][$w] += $dp[$j][$w - $numArray[$j]];
//     }
//     if($w + $numArray[$j] <= 20){
//       $dp[$j + 1][$w] += $dp[$j][$w + $numArray[$j]];
//     }
//   }
// }
// echo $dp[$num - 1][$numArray[$num - 1]];
// var_dump($dp);

// 第一項に符号がないから、最初の項を選ぶ箇所で初期化する
// 何も選ばない箇所を初期化するのではない

// 何も選ばない場合がない（＋かーは絶対する）ので、$dp[$j - 1][$w]を足すのではなく、$dp[$j][$w]を足すようにする。
$num = trim(fgets(STDIN));
$numArray = explode(' ', trim(fgets(STDIN)));
$dp = [];
for($i = 0;$i < $num + 1; $i++){
  $dp[] = array_fill(0, 21, 0);
}
$dp[0][$numArray[0]] = 1;

for($j = 1; $j < $num; $j++){
  for($w = 0; $w < 21; $w++){
    if($w - $numArray[$j] >= 0){
      $dp[$j][$w] += $dp[$j - 1][$w - $numArray[$j]];
    }
    if($w + $numArray[$j] <= 20){
      $dp[$j][$w] += $dp[$j - 1][$w + $numArray[$j]];
    }
  }
}
echo $dp[$num - 2][$numArray[$num - 1]].PHP_EOL;

// 間違い
// $num = trim(fgets(STDIN));
// $numArray = explode(' ', trim(fgets(STDIN)));
// $dp = [];
// for($i = 0;$i < $num + 1; $i++){
//   $dp[] = array_fill(0, 21, 0);
// }
// $dp[1][$numArray[0]] = 1;

// for($j = 1; $j < $num; $j++){
//   for($w = 0; $w < 21; $w++){
//     if($w - $numArray[$j] >= 0){
//       $dp[$j + 1][$w] = $dp[$j][$w - $numArray[$j]] + $dp[$j][$w];
//     }
//     if($w + $numArray[$j] <= 20){
//       $dp[$j + 1][$w] += $dp[$j][$w + $numArray[$j]] + $dp[$j][$w];
//     }
//   }
// }
// echo $dp[$num - 2][$numArray[$num - 1]];
// var_dump($dp);
