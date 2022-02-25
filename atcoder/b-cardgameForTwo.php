<?php
$n = fgets(STDIN);
$a = explode(' ', fgets(STDIN));
rsort($a);
$p = 0;
for ($i = 0; $i < $n; $i++) {
    if ($i % 2 === 0) {
        $p += $a[$i];
    } else {
        $p -= $a[$i];
    }
}
echo $p;
