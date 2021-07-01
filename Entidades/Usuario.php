<?php
    class Usuario {
  
        public $nombre;
        public $contrasena;

        public function __construct(){
            
        }

        public function setNombre($nombre){
            
            $this->nombre = $nombre;
        }

        public function setContrasena($contrasena){
            
            $this->contrasena = $contrasena;
        }

        public function getNombre(){
            
            return $this->nombre;
        }

        public function getContrasena(){
            
            return $this->contrasena;
        }

    }
?>