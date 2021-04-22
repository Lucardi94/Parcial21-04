<?php
include 'Prestamo.php';
include 'Cuota.php';
include 'Persona.php';

$prestamo = new Prestamo(1, 50000, 5, 0.1, new Persona("Pepe","Florez",99888777, "Bs As 12" , "dir@mail.com" , 299444567, 40000));

$prestamo->setIdentificador(99);
$prestamo->setCodigoElectrodomestico(123321);
$prestamo->setFechaOtorgamiento(getdate());
$prestamo->setMonto(10000);
$prestamo->setCantidadCuota(10);
$prestamo->setTotalTazaInteres(0.5);
$prestamo->setColObjCuotas(array(new Cuota(1, 1000, 99), new Cuota(2, 1000, 99), new Cuota(3, 1000, 99)));
$prestamo->setObjPersona(new Persona("Luis","Suarez",99666777, "Bs As 123" , "dir@mail.com" , 2994455, 4000));

echo "\n".$prestamo;
echo "\n".$prestamo->calcularInteresPrestamo(3);
echo "\n".$prestamo->calcularInteresPrestamo(1);
echo "\n".$prestamo->calcularInteresPrestamo(2);

$prestamoDos = new Prestamo(1, 50000, 5, 0.1, new Persona("Pepe","Florez",99888777, "Bs As 12" , "dir@mail.com" , 299444567, 40000));
$prestamoDos->otorgarPrestamo();
$prestamoDos->getColObjCuotas()[0]->setCancelada(TRUE);
$prestamoDos->getColObjCuotas()[1]->setCancelada(TRUE);
$prestamoDos->getColObjCuotas()[2]->setCancelada(TRUE);
$prestamoDos->getColObjCuotas()[3]->setCancelada(TRUE);

echo $prestamoDos->darSiguienteCuotaPagar();






