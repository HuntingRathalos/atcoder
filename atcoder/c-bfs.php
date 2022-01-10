<?php
$line1 = explode(' ', trim(fgets(STDIN)));
$line = $line1[0];
$row = $line1[1];
$line2 = explode(' ', trim(fgets(STDIN)));
$sx = $line2[1];
$sy = $line2[0];
$line3= explode(' ', trim(fgets(STDIN)));
$gx = $line3[1];
$gy = $line3[0];
$mazeArray = [];
$dist = [];
for($i = 0; $i < $line;  $i++){
  $dist[] = array_fill(0, (int)$row, -1);
}
$dist[$sy - 1][$sx - 1] = 0;

while($array = trim(fgets(STDIN))){
  $mazeArray[] = str_split($array, 1);
}
$bfsObj = new Maze($line, $row, $mazeArray, $dist);
$bfsObj->bfs($sy, $sx);
$d = $bfsObj->dist();

echo $bfsObj->getDist($gy, $gx).PHP_EOL;

Class Maze {
  private $line;
  private $row;
  private $mazeArray;
  private $dx = [0, 1, 0, -1];
  private $dy = [1, 0, -1, 0];
  private $que = [];
  private $dist;

  public function __construct($line, $row, $mazeArray, $dist)
  {
    $this->line = $line;
    $this->row = $row;
    $this->mazeArray = $mazeArray;
    $this->dist = $dist;
  }
  public function getDist($l, $r){
    return $this->dist[$l - 1][$r - 1];
  }
  public function dist(){
    return $this->dist;
  }
  public function bfs($l, $r){
    array_push($this->que, [$l - 1, $r - 1]);

    while(!empty($this->que)){
      $coordinate =  array_shift($this->que);
      $y = $coordinate[0];
      $x = $coordinate[1];
      for($j = 0; $j < 4; $j++){
        $next_y = $y + $this->dy[$j];
        $next_x = $x + $this->dx[$j];

        if($next_y < 0 || $next_y >= $this->line || $next_x < 0 || $next_x >= $this->row){
          continue;
        }
        if($this->mazeArray[$next_y][$next_x] == '#'){
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
