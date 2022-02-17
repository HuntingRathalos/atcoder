<?php
fscanf(STDIN, "%d", $ln);
$d = [];
for ($i=0; $i < $ln; $i++) {
  fscanf(STDIN, "%d", $k);
  $d[$k] = true;
}
echo count($d);
