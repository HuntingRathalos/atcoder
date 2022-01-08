<?php
$line = explode(' ', trim(fgets(STDIN)));
$vettex = $line[0];
$query = $line[1];
$graph = [];
$pxArray = [];
$answer = [];
for($k = 1;$k < $vettex + 1; $k++){
  $graph[$k] = [];
  $answer[$k] = 0;
}
for($i = 1;$i < $vettex; $i++){
  $edge = explode(' ', trim(fgets(STDIN)));
  array_push($graph[$edge[0]], $edge[1]);
  array_push($graph[$edge[1]], $edge[0]);
}
for($j = 0;$j < $query; $j++){
  $array =  explode(' ', trim(fgets(STDIN)));
  $answer[$array[0]] += $array[1];
  $pxArray[] = $array;
}
$dfs = new Dfs($vettex, $query, $graph, $pxArray, $answer);
$dfs->dfs(1, -1);
$numArray = $dfs->getAnswer();
foreach($numArray as $key =>$value){
  if($key == count($numArray)){
    echo $value.PHP_EOL;
  }else{
    echo $value." ";
  }
}
Class Dfs{
  private $vertex;
  private $query;
  private $graph = [];
  private $pxArray = [];
  private $seen = [];
  private $answer;

  public function __construct($vettex, $query, $graph, $pxArray, $answer){
    $this->vertex = $vettex;
    $this->query = $query;
    $this->graph = $graph;
    $this->pxArray = $pxArray;
    $this->answer = $answer;
  }
  public function getAnswer(){
    return $this->answer;
  }
  public function dfs(int $oneVertex, int $parantVertex){
    for($z = 0; $z < count($this->graph[$oneVertex]); $z++){
      if($this->graph[$oneVertex][$z] != $parantVertex){
        $this->answer[$this->graph[$oneVertex][$z]] += $this->answer[$oneVertex];
        self::dfs($this->graph[$oneVertex][$z],$oneVertex);
      }
    }
  }
}

