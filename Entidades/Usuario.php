<?php
    class Usuario {
  
        public $usuario;
        public $contrasena;

        public function __construct(){
            
        }

        public function SetUsuario($usuario){
            
            $this->usuario = $usuario;
        }

        public function SetContrasena($contrasena){
            
            $this->contrasena = $contrasena;
        }

        public function GetUsuario(){
            
            return $this->usuario;
        }

        public function GetContrasena(){
            
            return $this->contrasena;
        }

    }
?>