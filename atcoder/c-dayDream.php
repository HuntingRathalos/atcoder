<?php
$s = strrev(trim(fgets(STDIN)));
$divide = ['dream', 'dreamer', 'erase', 'eraser'];
foreach ($divide as $k => $v) {
    $divide[$k] = strrev($v);
}
$can = true;
for ($i = 0; $i < strlen($s);) {
    $can2 = false;
    foreach ($divide as $v) {
        if (strpos($s, $v, $i) === $i) {
            $can2 = true;
            $i += strlen($v);
        }
    }
    if (! $can2) {
        $can = false;
        break;
    }
}
echo $can ? 'YES' : 'NO';
