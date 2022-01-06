<?php
$num = trim(fgets(STDIN));
$aArray = explode(' ', trim(fgets(STDIN)));
$bArray = explode(' ', trim(fgets(STDIN)));
$cArray = explode(' ', trim(fgets(STDIN)));

sort($aArray);
sort($bArray);
sort($cArray);

$answer = 0;
$flag = '';
for($i = 0; $i < $num; $i++){
  $afirst = $aArray[0];
  $alast = $aArray[$num - 1];
  $cfirst = $cArray[0];
  $clast = $cArray[$num - 1];
  if($bArray[$i] >$alast){
    $a = $num;
  }else{
    $a = LowerBoundT($aArray, $bArray[$i]);
  }
  if($bArray[$i] < $cfirst){
    $c = $num;
  }else{
    $c = $num - UpperBoundT($cArray, $bArray[$i]);
    if($c > $num){
      $c = $num;
    }
  }
  $answer += $a * $c;
}

echo $answer. PHP_EOL;
// function binary_search(array $array, $target){
//   $low = 0;
//   $high = count($array) - 1;

//   while($low <= $high){
//     $mid = floor(($low + $high) / 2);

//     if($high - $low == 1){
//       return $low;
//     }

//     if($array[$mid] > $target){
//       $high = $mid;
//     }else{
//       $low = $mid;
//     }
//   }
//   return $low;
// }
// function binary_search2(array $array, $target){
//   $low = 0;
//   $high = count($array) - 1;

//   while($low <= $high){
//     $mid = floor(($low + $high) / 2);

//     if($high - $low == 1){
//       return $low;
//     }

//     if($array[$mid] >= $target){
//       $high = $mid;
//     }else{
//       $low = $mid;
//     }
//   }
//   return $low;
// }
function UpperBoundT( $list, $value )
{
    $count = count($list);
    $first = 0;
    while( 0 < $count ){
        $count2 = (int)($count / 2);
        // 配列の左端に配列の半分を足す、左端＋右端÷２ではない
        $mid = $first + $count2;
        if($list[$mid] <= $value){
            $first = ++$mid;
            $count -= $count2 + 1;
        }else{
            $count = $count2;
        }
    }
    return $first;
}
function LowerBoundT( $list, $value)
    {
        $count = count($list);
        $first = 0;
        while( 0 < $count ){
            $count2 = (int)($count / 2);
            $mid = $first + $count2;
            if($list[$mid] < $value){
                $first = ++$mid;
                $count -= $count2 + 1;
            }else{
                $count = $count2;
            }
        }
        return $first;
    }
