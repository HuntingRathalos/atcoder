<?php
fscanf(STDIN,"%d%d%d",$a,$b,$c);
if((pow($a,2)+pow($b,2)) <pow($c,2)){ 
    echo 'Yes';
} else {
    echo 'No';
}
