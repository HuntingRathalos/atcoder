<?php
define('MAX_N', 500);
define('MAX_M', 500);

$input = explode(' ', trim(fgets(STDIN)));
$note_count = $input[0];
$remaining_time = $input[1];

$w = array_fill(0, MAX_N, 0);
$v = array_fill(0, MAX_M, 0);

$tmp1 = array_fill(0, MAX_N + 1, 0);
$tmp2 = array_fill(0, MAX_M + 1, 0);

$dp = array($tmp1, $tmp2);

for ($k=0; $k < $note_count; $k++) {
  $input = explode(' ', trim(fgets(STDIN)));
  $w[$k] = $input[1];
  $v[$k] = $input[0];
}

for ($j = 0; $j <= $remaining_time; $j++) {
  $dp[$note_count][$j] = 0;
}

for ($i = $note_count - 1; $i >= 0; $i--) {
  for ($j = 0; $j <= $remaining_time; $j++) {
    if ($j < $w[$i]) {
      $dp[$i][$j] = $dp[$i + 1][$j];
    } else {
      $dp[$i][$j] = max($dp[$i + 1][$j], $dp[$i + 1][$j - $w[$i]] + $v[$i]);
    }
  }
}

echo $dp[0][$remaining_time]."\n";
