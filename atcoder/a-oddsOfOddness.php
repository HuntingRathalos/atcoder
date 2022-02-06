<?php
fscanf(STDIN, "%d", $n);
if ($n % 2 === 0) {
    $oddNum = $n / 2;
    echo $oddNum / $n;
} else if($n % 2 === 1) {
    $oddNum = intdiv($n, 2) + 1;
    echo $oddNum / $n;
}
