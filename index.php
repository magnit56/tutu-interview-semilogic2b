<?php

function getMaxCost($m1, $p1, $m2, $p2, $maxM) {
    if ($maxM < $m1 && $maxM < $m2) {
        return 0;
    }
    if ($maxM >= $m1 && $maxM < $m2) {
        return $m1 * $p1 + getMaxCost($m1, $p1, $m2, $p2, $maxM - $m1);
    }
    if ($maxM < $m1 && $maxM >= $m2) {
        return $m2 * $p2 + getMaxCost($m1, $p1, $m2, $p2, $maxM - $m2);
    }
    if ($maxM >= $m1 && $maxM >= $m2) {
        return max($m1 * $p1 + getMaxCost($m1, $p1, $m2, $p2, $maxM - $m1), $m2 * $p2 + getMaxCost($m1, $p1, $m2, $p2, $maxM - $m2));
    }
}

$line = trim(fgets(STDIN));
[$m1, $p1, $m2, $p2, $maxM] = explode(' ', $line);
print_r(getMaxCost($m1, $p1, $m2, $p2, $maxM));
