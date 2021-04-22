<?php 
include 'Persona.php';

$persona = new Persona("Luis","Suarez",99666777, "Bs As 123" , "dir@mail.com" , 2994455, 4000);

$persona->setNombre("Lucardi");
$persona->setApellido("Perez");
$persona->setDNI(11001100);
$persona->setDireccion("Av siempre viva 1111");
$persona->setMail("larucha@gmail.com");
$persona->setTelefono(145678);
$persona->setNeto(9999);

echo "\n".$persona;