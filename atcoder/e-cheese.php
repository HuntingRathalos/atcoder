<?php
$line = explode(' ', trim(fgets(STDIN)));
$height = $line[0];
$width = $line[1];
$factory = $line[2];
$mazeArray = [];
$coordinateArray = [];
while($array = trim(fgets(STDIN))){
  $mazeArray[] = str_split($array, 1);
}
for($i = 0; $i < $height; $i++){
  for($j = 0; $j < $width; $j++){
    for($k = 1; $k <= $factory; $k++){
      if($mazeArray[$i][$j] == 'S'){
        $coordinateArray['S'] =[$i, $j];
      }
      if($mazeArray[$i][$j] == $k){
        $coordinateArray[$k] = [$i, $j];
      }
    }
  }
}

$time = 0;
$mazeObj = new Maze($height, $width, $mazeArray);
for($n = 0; $n <=$factory - 1; $n++){
  $mazeObj->resetDist();
  $sY = $coordinateArray['S'][0];
  $sX = $coordinateArray['S'][1];

  if($n == 0){
    $mazeObj->bfs($sY, $sX);
    $time += $mazeObj->getDist($coordinateArray[1][0], $coordinateArray[1][1]);
    continue;
  }
  $sy = $coordinateArray[$n][0];
  $sx = $coordinateArray[$n][1];
  $gy = $coordinateArray[$n + 1][0];
  $gx = $coordinateArray[$n + 1][1];
  $mazeObj->bfs($sy, $sx);
  $firstTime = $mazeObj->getDist($gy, $gx);
  $mazeObj->bfs($sY, $sX);
  $secondTime = $mazeObj->getDist($gy, $gx);
  $time += min($firstTime, $secondTime);
}
echo $time.PHP_EOL;
Class Maze {
  private $height;
  private $width;
  private $mazeArray;
  private $dx = [0, 1, 0, -1];
  private $dy = [1, 0, -1, 0];
  private $que = [];
  private $dist = [];

  public function __construct($height, $width, $mazeArray)
  {
    $this->height = $height;
    $this->width = $width;
    $this->mazeArray = $mazeArray;
  }
  public function dist(){
    return $this->dist;
  }
  public function getDist($l, $r){
    return $this->dist[$l][$r];
  }
  public function resetDist(){
    for($z = 0; $z < $this->height; $z++){
      for($m = 0; $m < $this->width; $m++){
        $this->dist[$z][$m] = -1;
      }
    }
  }
  public function bfs($l, $r){
    array_push($this->que, [$l, $r]);
    $this->dist[$l][$r] = 0;

    while(!empty($this->que)){
      $coordinate =  array_shift($this->que);
      $y = $coordinate[0];
      $x = $coordinate[1];
      for($j = 0; $j < 4; $j++){
        $next_y = $y + $this->dy[$j];
        $next_x = $x + $this->dx[$j];

        if($next_y < 0 || $next_y >= $this->height || $next_x < 0 || $next_x >= $this->width){
          continue;
        }
        if($this->mazeArray[$next_y][$next_x] == 'X'){
          continue;
        }
        if($this->dist[$next_y][$next_x] == -1){
          array_push($this->que, [$next_y, $next_x]);
          $this->dist[$next_y][$next_x] = $this->dist[$y][$x] + 1;
        }
      }
    }
  }
}
