<?php
$distanceSum = trim(fgets(STDIN));
$shopNum = trim(fgets(STDIN));
$orderNum = trim(fgets(STDIN));
for($i = 0; $i < $shopNum - 1; $i++){
  $positionArray[] = trim(fgets(STDIN));
}
array_unshift($positionArray, 0);
array_push($positionArray, $distanceSum);

while($array = trim(fgets(STDIN))){
  $addressArray[] = $array;
}
sort($positionArray);

foreach($addressArray as $address){
  $searchArray[] = (int)binary_search($positionArray, $address);
}

$answer = 0;
foreach($searchArray as $key => $value){
  $answer += min($positionArray[$value] - $addressArray[$key],$addressArray[$key] - $positionArray[$value - 1]);
}

echo $answer . PHP_EOL;
function binary_search(array $array, $target){
  $low = 0;
  $high = count($array) - 1;
  if($target == 0){
    return 1;
  }
  while($low <= $high){
    if($high - $low == 1){
      return $high;
    }
    $mid = floor(($low + $high) / 2);

    if($array[$mid] == $target){
      return $mid;
    }
    if($array[$mid] > $target){
      $high = $mid;
    }else{
      $low = $mid;
    }
  }

  return $high;
}

