<?php 
    class Persona {
        /***
         * 1. Se registra la siguiente información: 
         *      - String nombre.
         *      - String apellido.
         *      - int dni.
         *      - String direccion.
         *      - String mail.
         *      - int telefono.
         *      - float neto.
         * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la clase.
         * 3. Los métodos de acceso de cada uno de los atributos de la clase.
         * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
         */

        //ATRIBUTOS
        private $nombre;
        private $apellido;
        private $dni;
        private $direccion;
        private $mail;
        private $telefono;
        private $neto;

        //CONSTRUCTOR
        public function __construct($nom, $ape, $dn, $dir, $mai, $tel, $net)
        {
            $this->nombre = $nom;
            $this->apellido = $ape;
            $this->dni = $dn;
            $this->direccion = $dir;
            $this->mail = $mai;
            $this->telefono = $tel;
            $this->neto = $net;
        }

        //METODOS DE ACCESO

        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getDNI(){
            return $this->dni;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getMail(){
            return $this->mail;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function getNeto(){
            return $this->neto;
        }

        public function setNombre($nom){
            $this->nombre = $nom;
        }
        public function setApellido($ape){
            $this->apellido = $ape;
        }
        public function setDNI($dn){
            $this->dni = $dn;
        }
        public function setDireccion($dir){
            $this->direccion = $dir;
        }
        public function setMail($mai){
            $this->mail = $mai;
        }
        public function setTelefono($tel){
            $this->telefono = $tel;
        }
        public function setNeto($net){
            $this->neto = $net;
        }

        //to_String
        public function __toString()
        {
            return "Nombre: ".$this->getNombre().
            " - Apellido: ".$this->getApellido().
            " - DNI: ".$this->getDNI().
            " - Direccion: ".$this->getDireccion().
            " - Mail: ".$this->getMail().
            " - Telefono: ".$this->getTelefono().
            " - Neto: ".$this->getNeto();
        }

    }