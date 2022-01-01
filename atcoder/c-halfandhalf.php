<?php
fscanf(STDIN, "%d %d %d %d %d", $priceA, $priceB, $priceAB, $numA, $numB);
$answer = 0;

if($priceA + $priceB < 2 * $priceAB){
  $answer = $priceA * $numA + $priceB * $numB;
}else{
  if($numA < $numB){
   $answer = min(2 * $priceAB * $numA + 2 * $priceAB * ($numB - $numA), 2 * $priceAB * $numA + $priceB * ($numB - $numA));
  }else{
   $answer = min(2 * $priceAB * $numB + 2 * $priceAB * ($numA - $numB), 2 * $priceAB * $numB + $priceA * ($numA - $numB));
  }
}
echo $answer;
