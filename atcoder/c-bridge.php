<?php
$line = explode(' ', trim(fgets(STDIN)));
$N = $line[0];
$M = $line[1];
$UF = new UnionFind();
$coordinate = [];
while($array = trim(fgets(STDIN))){
  $coordinate[] = explode(' ', $array);
}
$answer = 0;
for($i = 0; $i < $M; $i++){
  $UF->createPar($N);
  for($j = 0; $j < $M; $j++){
    if($i == $j){
      continue;
    }
    $a = $coordinate[$j];
    $x = $a[0];
    $y = $a[1];
    $UF->unite($x, $y);
  }
  $num = 0;
  for($k = 0; $k < $N; $k++){
    if($UF->root($k + 1) == $k + 1){
      $num++;
    }
  }
  if($num > 1){
    $answer++;
  }
}
echo $answer.PHP_EOL;
class UnionFind{
  public $par = [];

  public function createPar($N){
    for($i = 0; $i < $N; $i++){
      $this->par[$i + 1] = $i + 1;
    }
  }
  public function root($x){
    if($this->par[$x] == $x){
      return $x;
    }else{
      return $this->par[$x] = self::root($this->par[$x]);
    }
  }
  public function unite($x, $y){
    $rx = self::root($x);
    $ry = self::root($y);
    if($rx == $ry){
      return;
    }else{
      $this->par[$rx] = $ry;
    }
  }
  public function same($x, $y){
    $rx = self::root($x);
    $ry = self::root($y);
    if($rx == $ry){
      return true;
    }else{
      return false;
    }
  }
}
