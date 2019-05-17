<?php


include_once 'funciones/funciones.php';
$usuario = $_POST['usuario'];
$nombre  = $_POST['nombre'];
$password = $_POST['password'];
$nivel = $_POST['nivel'];
$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){
    $opciones = array(
        'cost' => 12
    );
    $password_hashed = password_hash($password, PASSWORD_DEFAULT, $opciones);

    try {
        $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, password, nivel, editado) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssi", $usuario, $nombre, $password_hashed, $nivel);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if($id_registro > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_registro
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
    
    die(json_encode($respuesta));
}

if($_POST['registro'] == 'actualizar'){

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

if($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];
    
    try {
        $stmt = $conn->prepare('DELETE FROM admins WHERE id_admin = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}


















