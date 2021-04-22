<?php
    include 'Financiera.php';
    include 'Prestamo.php';
    include 'Cuota.php';
    include 'Persona.php';

    $financiera = new Financiera("Money","Av. Arg 1234");
    /*$financiera->setDenominacion("Pepita");
    $financiera->setDireccion("Av Siempre viva 123");
    $financiera->setColPrestamo(array(new Prestamo(1, 50000, 5, 0.1, new Persona("Pepe","Florez",99888777, "Bs As 12" , "dir@mail.com" , 299444567, 40000)), new Prestamo(1, 50000, 5, 0.1, new Persona("Pepe","Florez",99888777, "Bs As 12" , "dir@mail.com" , 299444567, 40000))));
    echo $financiera;*/

    $prestamo1 = new Prestamo(1, 50000, 5, 0.1, new Persona("Pepe","Florez",99888777, "Bs As 12" , "dir@mail.com" , 299444567, 40000));
    $prestamo2 = new Prestamo(2, 10000, 4, 0.1, new Persona("Luis","Suarez",99666777, "Bs As 123" , "dir@mail.com" , 2994455, 4000));
    $prestamo3 = new Prestamo(3, 10000, 2, 0.1, new Persona("Luis","Suarez",99666777, "Bs As 123" , "dir@mail.com" , 2994455, 4000));

    $financiera->incorporarPrestamo($prestamo1);
    $financiera->incorporarPrestamo($prestamo2);
    $financiera->incorporarPrestamo($prestamo3);

    //echo $financiera;

    $financiera->otorgarPrestamoSiCalifica();
    //echo $financiera;

    $objCuota = $financiera->informarCuotaPagar(2);
    if (!is_null($objCuota)){
        echo $objCuota;
        echo $objCuota->darMontoFinalCuota();
        $objCuota->setCancelada(true);
    } else echo "No tienes cuotas pequeño yugi";

    $objCuotaDos = $financiera->informarCuotaPagar(2);
    echo $objCuotaDos;