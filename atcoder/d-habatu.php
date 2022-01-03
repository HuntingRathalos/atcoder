<?php
$line = explode(' ',trim(fgets(STDIN)));
$people = $line[0];
$relations = $line[1];
$mainArray = [];
$friend = [];

for($i = 0; $i < 100; $i++){
  $friend[] = array_fill(0, 100, 0);
}

for($n = 0; $n < $relations; $n++){
  $mainArray[] = explode(' ', trim(fgets(STDIN)));
  $x = $mainArray[$n][0] - 1;
  $y = $mainArray[$n][1] - 1;

  $friend[$x][$y] = 1;
  $friend[$y][$x] = 1;
}


for($bit = 0; $bit < (1<<$people); $bit++){
  $flag = 1;
  $faction = [];
  for($j = 0; $j < $people; $j++){
    if($bit & (1<<$j)){
      $faction[] = $j;
    }
  }
  if(count($faction) == 0 || count($faction) == 1){
    $answer[] = count($faction);
    continue;
  }

  $combination = combination($faction, 2);
  foreach($combination as $combArray){
    $one = $combArray[0];
    $two = $combArray[1];
    if($friend[$one][$two] !== 1){
      $flag = 0;
      continue;
    }
  }

  if($flag == 1){
    $answer[] = count($faction);
  }
}
echo max($answer);

function combination(array $arr, int $r): ?array
{
    // 重複した値を削除して，数値添字配列にする
    $arr = array_values(array_unique($arr));

    $n = count($arr);
    $result = []; // 最終的に二次元配列にして返す

    // nCr の条件に一致していなければ null を返す
    if($r < 0 || $n < $r){ return null; }

    if($r === 1){
        foreach($arr as $item){
            $result[] = [$item];
        }
    }

    if($r > 1){
        // n - r + 1 回ループ
        for($i = 0; $i < $n-$r+1; $i++){
            // $sliced は $i + 1 番目から末尾までの要素
            $sliced = array_slice($arr, $i + 1);
            // 再帰処理 二次元配列が返ってくる
            $recursion = combination($sliced, $r - 1);
            foreach($recursion as $one_set){
                array_unshift($one_set, $arr[$i]);
                $result[] = $one_set;
            }
        }
    }

    return $result;
}



