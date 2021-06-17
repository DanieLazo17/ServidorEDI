<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "OPTIONS") {
        die();
    }

    require "Entidades/Usuario.php";
    include "Funciones/funciones.php";

    if( isset($_POST['usuario']) && isset($_POST['contra']) ){

        $nombre = $_POST['usuario'];
        $contrasena = $_POST['contra'];
 
        if( buscarNombreUsuario($nombre, $contrasena)){
            echo 'perfil.html';
        }
        else{
            echo 'Usuario o contraseña incorrecta';
        }
    }

    /*
    if( isset($_POST['usuario']) && isset($_POST['contra']) ){

        $nombre = $_POST['usuario'];
        $contrasena = $_POST['contra'];
        
        if( compararContrasena( leerArchivo('Subidas/' . $nombre . '.txt'), $contrasena ) ){
            echo 'perfil.html';
        }
        else{
            echo 'Contraseña incorrecta';
        }
    }
    */

    if( isset($_POST['usuarioNuevo']) ){

        $usuario_nuevo = $_POST['usuarioNuevo'];

        if( buscarUsuario($usuario_nuevo) ){
            echo true;
        }
        else{
            echo false;
        }
    }

    if( isset($_POST['nuevoUsuario']) && isset($_POST['nuevaContra']) ){

        $nuevoUsuario = $_POST['nuevoUsuario'];
        $nuevaContra = $_POST['nuevaContra'];

        agregarUsuario($nuevoUsuario, $nuevaContra);
        echo "Usuario creado correctamente";
    }

    if( isset($_POST['nuevoUsuario']) && isset($_FILES['nuevaFoto'])){

        $usuario_nuevo = $_POST['nuevoUsuario'];

        $nombreFoto = 'Subidas/' . $usuario_nuevo . substr($_FILES['nuevaFoto']['name'], -4);
        move_uploaded_file($_FILES['nuevaFoto']['tmp_name'], $nombreFoto);
    }

?>