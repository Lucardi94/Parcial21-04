<?php
    class Prestamo{
        /***
         * 1. Se registra la siguiente información: 
         *      - int identificación.
         *      - int código del electrodoméstico.
         *      - String fecha otorgamiento.
         *      - float monto.
         *      - int cantidad_de_cuotas
         *      - float taza de interés.
         *      - array colección de cuotas
         *      - persona referencia a la persona que solicito el préstamo.
         * 2. Método constructor que recibe como parámetros los siguientes valores: identificación, monto, cantidad de cuotas, taza de interés y la referencia a la persona que solicito el préstamo. El constructor debe asignar los valores recibidos a las variables instancias que corresponda.
         * 3. Los métodos de acceso de cada uno de los atributos de la clase.
         * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
         * 5. Implementar el método privado calcularInteresPrestamo(numCuota) que recibe por parámetro el numero de la cuota y calcula el importe del interés sobre el saldo deudor.
         *  Por ejemplo si el préstamo tiene 5 cuotas, el monto total = 50000 y el interés 0.1% entonces el monto del interés sobre saldo deudor que debe calcularse para cada una de las cuotas deben ser los siguientes:
         *       interés cuota 1: 50 000 * 0.01 = 500
         *       interés cuota 2: ( 50 000- (50 000 /5) ) * 0.01 = 400
         *       interés cuota 3: ( 50 000 - ( (50 000 /5)*2) ) * 0.01 = 300
         *       interés cuota 4: (50 000 - ( (50 000 /5)*3 )) * 0.01 = 200
         *       interés cuota 5: (50 000 - ( (50 000 /5)*4 )) * 0.01 = 100
         * 6. Implementar el método otorgarPrestamo que setea la variable instancia fecha otorgamiento, con la fecha actual (puede utilizar el valor retornado por la función de PHP getdate()) y genera cada una de las cuotas dependiendo el valor almacenado en la variable instancia “cantidad_de_cuotas” y monto. El importe total de la cuota debe ser calculado de la siguiente manera: (monto / cantidad_de_cuotas ) y el monto correspondiente al interés debe ser el valor retornado por el método calcularInteresPrestamo(numeroCuota) implementado en el inciso anterior.
         * 7. Implementar el método darSiguienteCuotaPagar método que retorna la referencia a la siguiente cuota que debe ser abonada de un préstamo, si el préstamo tiene todas sus cuotas canceladas retorna null.
         */

        // ATRIBUTOS
        private $identificador;
        private $codigoElectrodomestico;
        private $fechaOtorgamiento;
        private $monto;
        private $cantidadCuota;
        private $totalTazaInteres;
        private $colObjCuotas;
        private $objPersona;

        // CONSTRUCTOR
        public function __construct($id, $mon, $canCuo, $tazInt, $objPer) // OBS: Falta Codigo de electrodomestico en los parametros
        {
            $this->identificador = $id;
            $this->codigoElectrodomestico = null;
            $this->fechaOtorgamiento = null;
            $this->monto = $mon;
            $this->cantidadCuota = $canCuo;
            $this->totalTazaInteres = $tazInt;
            $this->colObjCuotas = array();
            $this->objPersona = $objPer;
        }

        // METODOS DE ACCESO
        public function getIdentificador(){
            return $this->identificador;
        }
        public function getCodigoElectrodomestico(){
            return $this->codigoElectrodomestico;
        }
        public function getFechaOtorgamiento(){
            return $this->fechaOtorgamiento;
        }
        public function getMonto(){
            return $this->monto;
        }
        public function getCantidadCuota(){
            return $this->cantidadCuota;
        }
        public function getTotalTazaInteres(){
            return $this->totalTazaInteres;
        }
        public function getColObjCuotas(){
            return $this->colObjCuotas;
        }
        public function getObjPersona(){
            return $this->objPersona;
        }

        public function setIdentificador($id){
            $this->identificador = $id;
        }
        public function setCodigoElectrodomestico($codEle){
            $this->codigoElectrodomestico = $codEle;
        }
        public function setFechaOtorgamiento($fecOto){
            $this->fechaOtorgamiento = $fecOto;
        }
        public function setMonto($mon){
            $this->monto = $mon;
        }
        public function setCantidadCuota($canCuo){
            $this->cantidadCuota = $canCuo;
        }
        public function setTotalTazaInteres($totInt){
            $this->totalTazaInteres = $totInt;
        }
        public function setColObjCuotas($colCuo){
            $this->colObjCuotas = $colCuo;
        }
        public function setObjPersona($objPer){
            $this->objPersona = $objPer;
        }

        // To_String
        public function cuotasTexto(){
            $txt = "";
            foreach ($this->getColObjCuotas() as $cuota){
                $txt = $txt.$cuota."\n";
            }
            return $txt;
        }
        public function tiempoTexto(){            
            $fecha = $this->getFechaOtorgamiento();
            $txt = "";
            if (!is_null($fecha)){
                $txt = $fecha["wday"]."/".$fecha["mon"]."/".$fecha["year"];
            }
            return $txt;
        }
        public function __toString()
        {
            return "Identificador: ".$this->getIdentificador().
            " - Codigo del Electrodomestico: ".$this->getCodigoElectrodomestico().
            " - Fecha de Otorgamiento: ".$this->tiempoTexto().
            " - Monto: ".$this->getMonto().
            " - Cantidad de Cuotas: ".$this->getCantidadCuota().
            " - Total Taza de Interes: ".$this->getTotalTazaInteres().
            " - Cuotas: \n".$this->cuotasTexto().
            " - Persona: ".$this->getObjPersona();
        }

        public function calcularInteresPrestamo($numCuota){
            return ($this->getMonto() - (($this->getMonto()/$this->getCantidadCuota()) * ($numCuota-1))) * $this->getTotalTazaInteres();
        }

        public function otorgarPrestamo(){
            $this->getFechaOtorgamiento(getdate());
            $colCuo = array();
            for ($i=0; $i<$this->getCantidadCuota(); $i++){
                $colCuo[$i] = new Cuota($i+1, $this->getMonto()/$this->getCantidadCuota(), $this->calcularInteresPrestamo($i+1));
            }
            $this->setColObjCuotas($colCuo);
        }

        public function darSiguienteCuotaPagar(){
            $cuotaSiguiente = null;
            $colCuo = $this->getColObjCuotas();
            $i = 0;

            while ($i < count($colCuo) && is_null($cuotaSiguiente)){
                if (!$colCuo[$i]->getCancelada()){
                    $cuotaSiguiente = $colCuo[$i];
                }
                $i++;
            }

            return $cuotaSiguiente;
        }


    }