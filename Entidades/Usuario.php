<?php
    class Usuario {
  
        public $usuario;
        public $contrasena;

        public function __construct(){
            
        }

        public function setUsuario($usuario){
            
            $this->usuario = $usuario;
        }

        public function setContrasena($contrasena){
            
            $this->contrasena = $contrasena;
        }

        public function getUsuario(){
            
            return $this->usuario;
        }

        public function getContrasena(){
            
            return $this->contrasena;
        }

    }
?>