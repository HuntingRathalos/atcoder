<?php
$a = explode(" ",trim(fgets(STDIN))); //配列で標準入力を受け取り格納
sort($a); //昇順に並び替える
if($a[1]-$a[0] == $a[2]-$a[1]){ //各格納された数字の差が同一ならば
    echo 'Yes';
} else {
    echo 'No';
