<?php
$line = explode(' ',trim(fgets(STDIN)));
$numberPeople = $line[0];
$numberSongs = $line[1];

$mainArray = [];
$answer = [];
while($array = trim(fgets(STDIN))){
  array_push($mainArray, explode(' ',$array));
}
for($i = 0; $i < $numberSongs; $i++){
  for($j = 0; $j < $numberSongs; $j++){
    $count = 0;

    for($k = 0; $k < $numberPeople; $k++){
      $count += max($mainArray[$k][$i], $mainArray[$k][$j]);
      if($k == $numberPeople -1){
        $answer[] = $count;
      }
    }
  }
}
echo max($answer);
