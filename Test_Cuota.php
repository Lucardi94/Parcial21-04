<?php
include 'Cuota.php';
include 'Persona.php';

$cuota = new Cuota(1, 1000, 99);
echo $cuota;

$cuota->setNumero(7);
$cuota->setMonto_cuota(9999);
$cuota->setMonto_interes(3);
$cuota->setCancelada(TRUE);

echo "\n".$cuota;
echo "\n".$cuota->darMontoFinalCuota();