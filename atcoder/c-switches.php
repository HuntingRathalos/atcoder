<?php
$line = explode(' ',trim(fgets(STDIN)));
$n = $line[0];
$m = $line[1];
$mainArray = [];

for($k = 0; $k < $m; $k++){
  $mainArray[] = explode(' ', trim(fgets(STDIN)));
  array_shift($mainArray[$k]);
}

$p = explode(' ',trim(fgets(STDIN)));
$answer = 0;

for($bit = 0; $bit < (1<<$n); $bit++){
  $ok = 0;

  for($i = 0; $i < $m; $i++){
    $count = 0;

    foreach($mainArray[$i] as $switch){
      if($bit & (1<<($switch - 1))){
        $count++;
      }
    }
    if($count % 2 == $p[$i]){
      $ok++;
    }
  }
  if($ok == $m){
    $answer++;
  }
}
echo $answer;
