<?php
list($n, $y) = explode(' ', fgets(STDIN));
$r10000 = -1;
$r5000 = -1;
$r1000 = -1;
for ($a = 0; $a <= $n; $a++) {
    for ($b = 0; $a + $b <= $n; $b++) {
        $c = $n - $a - $b;
        if (10000 * $a + 5000 * $b + 1000 * $c == $y) {
            $r10000 = $a;
            $r5000 = $b;
            $r1000 = $c;
        }
    }
}
printf('%d %d %d', $r10000, $r5000, $r1000);
