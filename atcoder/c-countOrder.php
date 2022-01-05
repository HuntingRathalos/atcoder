<?php
$num = trim(fgets(STDIN));
$pArray = explode(' ', trim(fgets(STDIN)));
$qArray = explode(' ', trim(fgets(STDIN)));
$array = [];
for($i = 1; $i <= $num; $i++){
  $array[] = $i;
}
$mainArray = permutation($array, $num);
sort($mainArray);

foreach($mainArray as $key => $sortArray){
  $pflag = 1;
  $qflag = 1;

  for($j = 0; $j < $num; $j++){
    if($sortArray[$j] == $pArray[$j]){
      continue;
    }else{
      $pflag = 0;
      break;
    }
  }
  for($k = 0; $k < $num; $k++){
    if($sortArray[$k] == $qArray[$k]){
      continue;
    }else{
      $qflag = 0;
      break;
    }
  }

  if($pflag === 1){
    $a = $key + 1;
  }
  if($qflag === 1){
    $b = $key + 1;
  }
}
echo abs($a - $b);
function permutation(array $arr, int $r): ?array
{
    // 重複した値を削除して，数値添字配列にする
    $arr = array_values(array_unique($arr));

    $n = count($arr);
    $result = []; // 最終的に二次元配列にして返す

    // nPr の条件に一致していなければ null を返す
    if($n < 1 || $n < $r){ return null; }

    if($r === 1){
        foreach($arr as $item){
            $result[] = [$item];
        }
    }

    if($r > 1){
        // $item が先頭になる順列を算出する
        foreach($arr as $key => $item){
            // $item を除いた配列を作成
            $newArr = array_filter($arr, function($k) use($key) {
                return $k !== $key;
            }, ARRAY_FILTER_USE_KEY);
            // 再帰処理 二次元配列が返ってくる
            $recursion = permutation($newArr, $r - 1);
            foreach($recursion as $one_set){
                array_unshift($one_set, $item);
                $result[] = $one_set;
            }
        }
    }

    return $result;
}
