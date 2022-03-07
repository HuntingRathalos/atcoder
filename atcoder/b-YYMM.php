<?php
fscanf(STDIN,"%s",$s);
$char = '';
$arr = [];

for($i=0;$i<4;$i++){ // 全部で4桁と決まっているので4回ループ
    $char = substr($s,$i,1); // substrで$sの１文字を抜く
    array_push($arr,$char); //$arrに$charを追加する
}

$f_half = $arr[0].$arr[1]; //前半の二桁
$s_half = $arr[2].$arr[3]; //後半の二桁

$flg = 0; //判定用

//年は99あであり得るが、月は0~12なので月基準で判定
if($f_half>0 && $f_half<=12){ // 0以上12以下なら前半は月と言える
    $flg += 1;
}
if($s_half>0 && $s_half<=12){ // 0以上12以下なら後半は月と言える
    $flg += 2;
}

if($flg == 0){
    echo 'NA'; // 前半後半どちらも月とは言えない場合 (9999とか)
} elseif ($flg == 1){
    echo 'MMYY'; // 前半が月なら後半は年 で確定
} elseif ($flg == 2){
    echo 'YYMM'; // 後半が月なら前半は年 で確定
} else {
    echo 'AMBIGUOUS'; // どっちの可能性もある場合 (1111とか)
}
