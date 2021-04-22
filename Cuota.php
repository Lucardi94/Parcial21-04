<?php
    class Cuota{
        /***
         * 1. Se registra la siguiente información: 
         *      - int número
         *      - float monto_cuota
         *      - float monto_interes
         *      - boolean cancelada (atributo que va a contener un valor true, si la cuota esta paga y false en caso contrario).
         * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos: número, monto_cuota y monto_interes definidos en la clase. Por defecto todas las cuotas deben ser generadas como canceladas = false.
         * 3. Los métodos de acceso de cada uno de los atributos de la clase.
         * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
         * 5. Implementar el método darMontoFinalCuota() que retorna el importe total de la cuota mas los intereses que deben ser aplicados.
         */

        //ATRIBUTOS
        private $numero;
        private $monto_cuota;
        private $monto_interes;
        private $cancelada;

        //CONSTRUCTOR
        public function __construct($num, $monCou, $monInt)
        {
            $this->numero = $num;
            $this->monto_cuota = $monCou;
            $this->monto_interes = $monInt;
            $this->cancelada = FALSE;
        }

        //METODO DE ACCESO
        public function getNumero(){
            return $this->numero;
        }
        public function getMonto_Cuota(){
            return $this->monto_cuota;
        }
        public function getMonto_Interes(){
            return $this->monto_interes;
        }
        public function getCancelada(){
            return $this->cancelada;
        }

        public function setNumero($num){
            $this->numero = $num;
        }
        public function setMonto_cuota($monCou){
            $this->monto_cuota = $monCou;
        }
        public function setMonto_interes($monInt){
            $this->monto_interes = $monInt;
        }
        public function setCancelada($can){
            $this->cancelada = $can;
        }

        //to_String
        public function canceladaTexto(){
            if ($this->getCancelada()){
                return "Si fue pagada";
            } else return "NO fue sido pagada";
        }

        public function __toString()
        {
            return "Numero: ".$this->getNumero().
            " - Monto de Cuota: ".$this->getMonto_Cuota().
            " - Monto de Interes: ".$this->getMonto_Interes().
            " - Cancelada: ".$this->canceladaTexto();
        }

        public function darMontoFinalCuota(){
            return $this->getMonto_Cuota() + $this->getMonto_Interes();
        }
    }   
    