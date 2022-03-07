<?php
fscanf(STDIN,"%s",$s);
$char = '';
$arr = [];

for($i=0;$i<4;$i++){
    $char = substr($s,$i,1);
    array_push($arr,$char);
}

$f_half = $arr[0].$arr[1];
$s_half = $arr[2].$arr[3];

$flg = 0;

if($f_half>0 && $f_half<=12){
    $flg += 1;
}
if($s_half>0 && $s_half<=12){
    $flg += 2;
}

if($flg == 0){
    echo 'NA';
} elseif ($flg == 1){
    echo 'MMYY';
} elseif ($flg == 2){
    echo 'YYMM';
} else {
    echo 'AMBIGUOUS'; 
}
