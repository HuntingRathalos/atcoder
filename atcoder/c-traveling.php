<?php
fscanf(STDIN, "%d", $ln);
$t = [0];
$x = [0];
$y = [0];

for ($i=1; $i<=$ln; $i++) {
  fscanf(STDIN, "%d %d %d", $a, $b, $c);
  $t[$i] = $a;
  $x[$i] = $b;
  $y[$i] = $c;
}

$result = true;

for ($i=0; $i<$ln; $i++) {
  $dt = $t[$i+1] - $t[$i];
  $dist = abs($x[$i+1] - $x[$i]) + abs($y[$i+1] - $y[$i]);
  if ($dt < $dist) {
    $result = false;
    break;
  }
  if ($dt % 2 !== $dist % 2) {
    $result = false;
    break;
  }
}

echo $result ? 'Yes' : 'No';
