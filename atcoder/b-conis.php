<?php
$a = fgets(STDIN);
$b = fgets(STDIN);
$c = fgets(STDIN);
$x = fgets(STDIN);
$result = 0;
for ($i = 0; $i <= $a; $i++) {
    for ($j = 0; $j <= $b; $j++) {
        for ($k = 0; $k <= $c; $k++) {
            if (500 * $i + 100 * $j + 50 * $k == $x) {
                $result++;
            }
        }
    }
}
echo $result;
