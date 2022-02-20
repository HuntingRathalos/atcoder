<?php
$n = fgets(STDIN);
$a = explode(' ', fgets(STDIN));
$min = 30;
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $a[$i] % 2 == 0; $j++) {
        $a[$i] /= 2;
    }
    $min = min($j, $min);
}
echo $min;
