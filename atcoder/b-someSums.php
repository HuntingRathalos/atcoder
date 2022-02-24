<?php
function sum($n) {
    $s = 0;
    while ($n > 0) {
        $s += $n % 10;
        $n /= 10;
    }
    return $s;
}

list($n, $a, $b) = explode(' ', fgets(STDIN));
$total = 0;
for ($i = 1; $i <= $n; $i++) {
    $s = sum($i);
    if ($s >= $a && $s <= $b) {
        $total += $i;
    }
}
echo $total;
