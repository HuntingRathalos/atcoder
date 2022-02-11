<?php
fscanf(STDIN,"%d",$x);

// 500円のパターン
$a = (int)($x/500);
$ans = 1000 * $a;
$x %= 500;

//5円のパターン
$b = (int)($x / 5);
$ans += $b * 5; 

echo $ans;
