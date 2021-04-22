<?php
    class Financiera{
        /***
         * 1. Se registra la siguiente información: 
         *      - String denominación.
         *      - String dirección.
         *      - Array colección de prestamos otorgados.
         * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase denominación, dirección.
         * 3. Los métodos de acceso para cada una de las variables instancias de la clase.
         * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
         * 5. Implementar el método incorporarPrestamo que recibe por parámetro un nuevo préstamo.
         * 6. Implementar el método otorgarPrestamoSiCalifica, método que recorre la lista de prestamos que no han sido generadas sus cuotas. Por cada préstamo, se corrobora que su monto dividido la cantidad_de_cuotas no supere el 40 % del neto del solicitante, si la verificación es satisfactoria se invoca al método otorgarPrestamo.
         * 7. Implementar el método informarCuotaPagar(idPrestamo) que recibe por parámetro la identificación del préstamo, se busca el préstamo en la colección de prestamos y si es encontrado se obtiene la siguiente cuota a pagar. El método debe retornar la referencia a la cuota. Utilizar para su implementación el método darSiguienteCuotaPagar
         */

        // ATRIBUTOS
        private $denominacion;
        private $direccion;
        private $colPrestamo;

        // CONSTRUCTOR
        public function __construct($den, $dir){
            $this->denominacion = $den;
            $this->direccion = $dir;
            $this->colPrestamo = array();
        }

        // METODOS DE ACCESO
        public function getDenominacion(){
            return $this->denominacion;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getColPrestamo(){
            return $this->colPrestamo;
        }

        public function setDenominacion($den){
            $this->denominacion = $den;
        }
        public function setDireccion($dir){
            $this->direccion = $dir;
        }
        public function setColPrestamo($colPre){
            $this->colPrestamo = $colPre;
        }

        //To_String
        public function prestamoTexto(){
            $txt = "";
            foreach ($this->getColPrestamo() as $prestamo){
                $txt = $txt.$prestamo."\n";
            }
            return $txt;
        }

        public function __toString()
        {
            return "Denominacion ".$this->getDenominacion().
            " - Direccion ".$this->getDireccion().
            " - Coleccion de Prestamos \n".$this->prestamoTexto();
        }

        public function incorporarPrestamo($prestamo){
            $colPre = $this->getColPrestamo();
            array_push($colPre, $prestamo);
            $this->setColPrestamo($colPre);
        }

        public function otorgarPrestamoSiCalifica(){
            $colPre = $this->getColPrestamo();
            for ($i=0; $i<count($colPre);$i++){
                if ($colPre[$i]->getMonto()/$colPre[$i]->getCantidadCuota() <= $colPre[$i]->getObjPersona()->getNeto() * 0.4){
                    $colPre[$i]->otorgarPrestamo();
                }
            }
            $this->setColPrestamo($colPre);
        }

        public function informarCuotaPagar($idPrestamo){
            $colPre = $this->getColPrestamo();
            $encontro = false;
            $i = 0;

            while ($i<count($colPre) && !$encontro){
                if ($colPre[$i]->getIdentificador() == $idPrestamo){
                    return $colPre[$i]->darSiguienteCuotaPagar();
                }
                $i++;
            }
        }
    }