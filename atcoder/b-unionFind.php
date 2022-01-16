<?php
$line = explode(' ', trim(fgets(STDIN)));
$N = $line[0];
$Q = $line[1];
class UnionFind{
  public $par = [];

  public function createPar($N){
    for($i = 0; $i < $N; $i++){
      $this->par[$i] = $i;
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
$UF = new UnionFind();
$UF->createPar($N);
while($array = trim(fgets(STDIN))){
  $a = explode(' ', $array);
  $x = $a[1];
  $y = $a[2];
  if($a[0] == 0){
    $UF->unite($x, $y);
  }else{
    if($UF->same($x, $y) == true){
      echo "Yes".PHP_EOL;
    }else{
      echo "No".PHP_EOL;
    }
  }
}
