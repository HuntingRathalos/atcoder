<?php
  fscanf(STDIN, "%d %d", $a, $b);
$ans =0;
$ans = $a - 2*$b;
if($ans >= 0) {
 echo $ans;
} else {
 echo 0;
}
