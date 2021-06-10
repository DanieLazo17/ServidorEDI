<?php

    function mostrarValor($parametro="Prueba"){
        echo "<br>";
        echo $parametro;
        return 1;
    }

    function leerArchivo($nombreArchivo){

        $archivo = fopen($nombreArchivo,"r");

        $contrasenaEnArchivo = fread($archivo,filesize($nombreArchivo));

        fclose($archivo);

        return $contrasenaEnArchivo;
    }

    function compararContrasena($contrasenaEnArchivo, $contrasenaIngresada){

        $estado = false;

        if($contrasenaEnArchivo == $contrasenaIngresada){
            $estado = true;
        }

        return $estado;
    }

    function leerArchivoUsuarios(){

        $archivo = fopen('Subidas/usuarios.json',"r");
        $usuarios = fread($archivo,filesize('Subidas/usuarios.json'));
        fclose($archivo);

        return $usuarios;
    }

    function escribirArchivoUsuarios($usuarioAgregado){

        $archivo = fopen('Subidas/usuarios.json',"w");
        fwrite($archivo, $usuarioAgregado);
        fclose($archivo);
    }

    function buscarUsuario($nombreUsuario){

        $estado = false;

        $usuarios = leerArchivoUsuarios();

        $usuariosArray = json_decode($usuarios);
        //var_dump($usuariosArray);

        foreach($usuariosArray as $usuarioGenerico){

            if($usuarioGenerico->{"usuario"} == $nombreUsuario){
                $estado = true;
                return $estado;
            }
            
            /*
            $usuarioPrueba = new Usuario();
            foreach($usuarioGenerico as $atr => $valorAtr){

                $usuarioPrueba->{$atr} = $valorAtr;
            }
            //var_dump($usuarioPrueba);
            if($usuarioPrueba->GetUsuario() == $nombreUsuario){
                    
                $estado = true;
                return $estado;
            }
            */
        }

        return $estado;
    }

    function agregarUsuario($usuario, $contrasena){

        $usuarios = leerArchivoUsuarios();
        //var_dump($usuarios);

        $usuariosArray = json_decode($usuarios);

        $tempUsuario = new Usuario();

        $tempUsuario->SetUsuario($usuario);
        $tempUsuario->SetContrasena($contrasena);

        array_push($usuariosArray, $tempUsuario);
        //var_dump($usuariosArray);

        $usuarioAgregado = json_encode($usuariosArray);

        escribirArchivoUsuarios($usuarioAgregado);
    }

?>