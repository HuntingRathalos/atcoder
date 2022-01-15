<?php
$line = explode(' ', trim(fgets(STDIN)));
$M = $line[0];
$N = $line[1];
$K = trim(fgets(STDIN));
$section = [];
$researchArray = [];
for($m = 0; $m < $M; $m++){
  $section[] = str_split(trim(fgets(STDIN)), 1);
}
for($k = 0; $k < $K; $k++){
  $researchArray[] = explode(' ', trim(fgets(STDIN)));
}
$J = [];
$O = [];
$I = [];
for($c = 0; $c < $M; $c++){
  $J[] = array_fill(0, $N, 0);
}
for($d = 0; $d < $M; $d++){
  $O[] = array_fill(0, $N, 0);
}
for($e = 0; $e < $M; $e++){
  $I[] = array_fill(0, $N, 0);
}
for($a = 0; $a < $M; $a++){
  for($b = 0; $b < $N; $b++){
    if($section[$a][$b] =='J'){
      $J[$a][$b] = 1;
    }elseif($section[$a][$b] == 'O'){
      $O[$a][$b] = 1;
    }else{
      $I[$a][$b] = 1;
    }
  }
}
$sJ = [];
for($p = 0; $p < $M; $p++){
  $sJ[] = array_fill(0, $N, 0);
}
$sJ[0][0] = $J[0][0];
$sJ[1][0] = $J[1][0];
$sJ[0][1] = $J[0][1];
$sO = [];
for($q = 0; $q < $M; $q++){
  $sO[] = array_fill(0, $N, 0);
}
$sO[0][0] = $O[0][0];
$sO[1][0] = $O[1][0];
$sO[0][1] = $O[0][1];
$sI = [];
for($r = 0; $r < $M; $r++){
  $sI[] = array_fill(0, $N, 0);
}
$sI[0][0] = $I[0][0];
$sI[1][0] = $I[1][0];
$sI[0][1] = $I[0][1];
for($i = 0; $i < $M; $i++){
  for($j = 0; $j < $N; $j++){
    $sJ[$i + 1][$j + 1] = $sJ[$i][$j + 1] + $sJ[$i + 1][$j] - $sJ[$i][$j] + $J[$i][$j];
    $sO[$i + 1][$j + 1] = $sO[$i][$j + 1] + $sO[$i + 1][$j] - $sO[$i][$j] + $O[$i][$j];
    $sI[$i + 1][$j + 1] = $sI[$i][$j + 1] + $sI[$i + 1][$j] - $sI[$i][$j] + $I[$i][$j];
  }
}
var_dump($sJ);
for($z = 0; $z < $K; $z++){
  $y1 = $researchArray[$z][0];
  $x1 = $researchArray[$z][1];
  $y2 = $researchArray[$z][2];
  $x2 = $researchArray[$z][3];
  $jnum = $sJ[$y2][$x2] - $sJ[$y1 - 1][$x2] - $sJ[$y2][$x1] + $sJ[$y1 - 1][$x1];
  $onum = $sO[$y2][$x2] - $sO[$y1 - 1][$x2] - $sO[$y2][$x1] + $sO[$y1 - 1][$x1];
  $inum = $sI[$y2][$x2] - $sI[$y1 - 1][$x2] - $sI[$y2][$x1] + $sI[$y1 - 1][$x1];
  echo $jnum.' '.$onum.' '.$inum.PHP_EOL;
  var_dump($sJ[$y2][$x2]);
}
