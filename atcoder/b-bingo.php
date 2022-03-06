<?php
$card = []; //ビンゴカード
for($i=0;$i<3;$i++){
    $row=explode(" ",trim(fgets(STDIN))); //各カードの番号
    array_push($card,$row); //配列末尾に追加
}

//判定用。穴の空いてないビンゴカードをイメージ。
$mch[0]= [false,false,false];
$mch[1]= [false,false,false];
$mch[2]= [false,false,false];

fscanf(STDIN,"%d",$n); //発表される数字の個数

for($i=0;$i<$n;$i++){
    fscanf(STDIN,"%d",$b); //発表された数値
    for($j=0;$j<3;$j++){ //↑があるかチェック
        for($k=0;$k<3;$k++){
            if($card[$k][$j]==$b){
                $mch[$k][$j] = true;
            }
        }
    }
}

$bingo = false;

for($i=0;$i<3;$i++){ //縦のビンゴか判定
    if($mch[$i][0] && $mch[$i][1] && $mch[$i][2]){
        $bingo = true;
    }
}
for($i=0;$i<3;$i++){ //横のビンゴか判定
    if($mch[0][$i] && $mch[1][$i] && $mch[2][$i]){
        $bingo = true;
    }
}
for($i=0;$i<3;$i++){ //斜めのビンゴか判定
    if($mch[0][0] && $mch[1][1] && $mch[2][2]){
        $bingo = true;
    }
}
for($i=0;$i<3;$i++){ //斜め(2)のビンゴか判定
    if($mch[0][2] && $mch[1][1] && $mch[2][0]){
        $bingo = true;
    }
}

if($bingo == true){
    echo 'Yes';
} else {
    echo 'No';
}
