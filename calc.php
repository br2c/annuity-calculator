<?php

$S = 300;
$P_yearly = 6;
$N = 12;

$P = $P_yearly/12/100;
$M = $S * $P / (1 - pow(1 + $P, -1 * $N));

$Sn_print = $S;
$Sn = $S;
$An = 0;

echo "n\tSn\tM\tMsn\tMpn\n";

for ($n = 1; $n <= $N; $n++) {
    $Mpn = $Sn * $P;
    $Msn = $M - $Mpn - $An;
    $An = round($Msn, 2) - $Msn;
    $Sn = $Sn - $Msn;
    
    $print = [
        $n,
        number_format($Sn_print, 2, '.', ''),
        number_format($M, 2, '.', ''),
        number_format($Msn, 2, '.', ''),
        number_format(round($M, 2) - round($Msn, 2), 2, '.', ''),
    ];

    $Sn_print = $Sn_print - round($Msn, 2);

    echo implode("\t", $print) . "\n";
}

