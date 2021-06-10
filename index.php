<?php

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // should do a check here to match $_SERVER['HTTP_ORIGIN'] to a
        // whitelist of safe domains
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    }

    require "Entidades/Usuario.php";
    include "Funciones/funciones.php";

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