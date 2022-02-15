<?php
fscanf(STDIN,"%d%d%d",$a,$b,$w);

$w *= 1000;

//最小値
$min = ceil($w/$b);
//最大値
$max = floor($w/$a);

if($min > $max){

    echo 'UNSATISFIABLE';
    exit();
}

echo $min." ".$max;
