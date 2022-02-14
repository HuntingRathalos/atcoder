<?php
fscanf(STDIN,"%d%d",$m,$h);

if($h%$m==0){
    echo 'Yes';
} else {
    echo 'No';
}
