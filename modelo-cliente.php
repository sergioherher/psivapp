<?php

include_once 'includes/funciones/bd_conexion.php';
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$password  = $_POST['password'];
$email = $_POST['email_cliente'];

if($_POST['registro'] == 'nuevo'){
    if($usuario == "") {
        header("location:registrar_cliente.php?vacio=1&campo=usuario");
        die();
    }

    if(!preg_match("/^[a-z0-9]+$/i",  $usuario)) {
        header("location:registrar_cliente.php?invalido=1&campo=usuario");
        die();
    }

    if ($nombre == "") {
        header("location:registrar_cliente.php?vacio=1&campo=nombre");
        die();
    }
    if ($apellido == "") {
        header("location:registrar_cliente.php?vacio=1&campo=apellido");
        die();
    } 
    if ($password == "") {
        header("location:registrar_cliente.php?vacio=1&campo=password");
        die();
    }
    if ($email == "") {
        header("location:registrar_cliente.php?vacio=1&campo=email");
        die();
    }

    $opciones = array(
        'cost' => 12
    );
    $password_hashed = password_hash($password, PASSWORD_DEFAULT, $opciones);

    try {
        $stmt = $conn->prepare("SELECT id FROM clientes WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        if($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if($existe) {
                header("location:registrar_cliente.php?existe=1");
                die(json_encode($respuesta));
            } 
        }

        $stmt = $conn->prepare("INSERT INTO clientes (usuario, nombre, apellido, password, email) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $usuario, $nombre, $apellido, $password_hashed, $email);
        $stmt->execute();
        $id_cliente = $stmt->insert_id;
        if($id_cliente > 0) {
            session_start();
            $_SESSION['id_cliente'] = $id_cliente;
            $_SESSION['usuario_cliente'] = $usuario;
            $_SESSION['nombre_cliente'] = $nombre;
            $_SESSION['apellido_cliente'] = $apellido;
            $_SESSION['email_cliente'] = $email;
            $respuesta = array(
                'respuesta' => 'exito',
                'id_cliente' => $id_cliente
            );
            
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    header("location:registro.php");
    die(json_encode($respuesta));
}

if($_POST['registro'] == 'ingresar'){
    try {
        $stmt = $conn->prepare("SELECT * FROM clientes WHERE usuario = ?;");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id, $usuario, $nombre, $apellido, $password_cliente, $email);

        if($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if($existe) {
                if(password_verify($password, $password_cliente)) {
                    session_start();
                    $_SESSION['id_cliente'] = $id;
                    $_SESSION['usuario_cliente'] = $usuario;
                    $_SESSION['nombre_cliente'] = $nombre;
                    $_SESSION['apellido_cliente'] = $apellido;
                    $_SESSION['email_cliente'] = $email;
                    header("location:registro.php");
                    die(json_encode($respuesta));
                    $respuesta = array(
                        'respuesta' => 'exitoso',
                        'usuario' => $usuario
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    header("location:login.php?existe=1");
    die(json_encode($respuesta));
}

if($_POST['registro'] == 'recuperar_password'){

    try {
        if(empty($_POST['password']) ) {
            $stmt = $conn->prepare("UPDATE admins SET usuario = ?, nombre = ?, nivel = ?, editado = NOW() WHERE id_admin = ? ");
            $stmt->bind_param("ssi", $usuario, $nombre, $id_registro, $nivel);
        } else {
            $opciones = array(
                'cost' => 12
            );
            
            $hash_password = password_hash($password, PASSWORD_DEFAULT, $opciones);
            $stmt = $conn->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ?, nivel = ?, editado = NOW() WHERE id_admin = ? ');
            $stmt->bind_param("sssii", $usuario, $nombre, $hash_password, $id_registro, $nivel);
        }
        
        

        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    
    die(json_encode($respuesta));
    
}


















