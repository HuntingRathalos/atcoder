<?php
$line = explode(' ', trim(fgets(STDIN)));
$vettex = $line[0];
$query = $line[1];
$graph = [];
$pxArray = [];
$seen = [];
$answer = [];
for($k = 1;$k < $vettex; $k++){
  $graph[$k] = [];
}
for($i = 1;$i < $vettex; $i++){
  $edge = explode(' ', trim(fgets(STDIN)));
  array_push($graph[$edge[0]], $edge[1]);
}
for($j = 0;$j < $query; $j++){
  $array =  explode(' ', trim(fgets(STDIN)));
  $pxArray[] = $array;
}
for($n = 0; $n < $query; $n++){
  dfs($graph, $pxArray[0], $seen)
}
function dfs(array $graph, int $oneVertex, array $seen, array $answer, $x){
  $seen[$oneVertex] == true;
  $answer[$oneVertex] +=
  for($z = 0; $z = count($graph[$oneVertex]); $z++){
    if($seen[$z] ==true){
      continue;
    }else{
      dfs($graph, $z, $seen);
    }
  }
}
