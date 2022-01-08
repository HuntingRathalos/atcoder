<?php
$line = explode(' ', trim(fgets(STDIN)));
$height = $line[0];
$width = $line[1];
$mainArray = [];

while($array = trim(fgets(STDIN))){
  $mainArray[] = str_split($array);
}
$sw = 0;
$sh = 0;
$gw = 0;
$gh = 0;

for($i = 0; $i < $height; $i++){
  for($j = 0; $j < $width; $j++){
    if($mainArray[$i][$j] == 's'){
      $sh = $i;
      $sw = $j;
    }elseif($mainArray[$i][$j] == 'g'){
      $gh = $i;
      $gw = $j;
    }
  }
}
$maze = new Maze($height, $width, $mainArray);
$maze->dfs($sh, $sw);
$mazeArray = $maze->getSeen();
var_dump($mazeArray);
// $judge = $maze->isGoal();
// var_dump($judge);
// if($judge){
//   echo 'Yes'.PHP_EOL;
// }else{
//   echo 'No'.PHP_EOL;
// }

Class Maze {
  private $height;
  private $width;
  private $mainArray;
  private $seen = [];
  private $isGoal = false;

  public function __construct($height, $width, $mainArray)
  {
    $this->height = $height;
    $this->width = $width;
    $this->mainArray = $mainArray;
  }
  public function isGoal(){
    return $this->isGoal;
  }
  public function getSeen(){
    return $this->seen;
  }
  public function dfs($h, $w){
    $dx = [0, 1, 0, -1];
    $dy = [1, 0, -1, 0];


    if($h < 0 || $h >= $this->height || $w < 0 || $w >= $this->width){
      return;
    }
    if($this->mainArray[$h][$w] == '#'){
      return;
    }
    if(isset($seen[$h][$w])){
      return;
    }

    $this->seen[$h][$w] = true;

    self::dfs($h + 1, $w); //returnされるまでこの処理が続く
    self::dfs($h - 1, $w);
    self::dfs($h, $w + 1);
    self::dfs($h, $w - 1);
    
  }
}

