<?php

include_once 'funciones/funciones.php';

$extensiones = ['pdf','doc','docx'];

if($_POST['registro'] == 'nuevo'){

    $descripcion = $_POST['descripcion_documento'];
    $id_admin = $_POST['id_admin'];
    
    $directorio = "documentos/";
    
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    
    if(move_uploaded_file($_FILES['archivo_documento']['tmp_name'], $directorio . $_FILES['archivo_documento']['name'])) {
        $documento_url = $_FILES['archivo_documento']['name'];
        $documento_resultado = "Se subió correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    
    try {
        $stmt = $conn->prepare('INSERT INTO documentos (url, nombre, id_admin) VALUES (?, ?, ?) ');
        $stmt->bind_param("ssi", $documento_url, $descripcion, $id_admin);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado,
                'resultado_documento' => $documento_resultado
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
    header("Location:lista-documentos.php");
    die(json_encode($respuesta));
    
}

if($_POST['registro'] == 'actualizar'){
    
    $descripcion = $_POST['descripcion_documento'];
    $id_admin = $_POST['id_admin'];

    $id_registro = $_POST['id_registro'];
    
    $directorio = "documentos/";
    
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    
    if(move_uploaded_file($_FILES['archivo_documento']['tmp_name'], $directorio . $_FILES['archivo_documento']['name'])) {
        $documento_url = $_FILES['archivo_documento']['name'];
        $documento_resultado = "Se subió correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    
    try {
        if($_FILES['archivo_documento']['size'] > 0 ) {
            
            // con imagen
            $stmt = $conn->prepare('UPDATE documentos SET url = ?, nombre = ?, id_admin = ? WHERE id = ? ');
            $stmt->bind_param("ssii", $documento_url, $descripcion, $id_admin,  $id_registro);
               
        } else {
            // sin imagen
            $stmt = $conn->prepare('UPDATE documentos SET nombre = ?, id_admin = ? WHERE id = ? ');
            $stmt->bind_param("sii", $descripcion, $id_admin, $id_registro);
        }
        $estado = $stmt->execute();

        if($estado == true) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
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
    header("Location:lista-documentos.php");
    
    die(json_encode($respuesta));
    
}

if($_POST['registro'] == 'eliminar'){

    $id_borrar = $_POST['id'];

    $directorio = "documentos/";

    $stmt = $conn->prepare('SELECT * FROM documentos WHERE id = ? ');
    $stmt->bind_param('i', $id_borrar);
    $stmt->execute();
    $stmt->bind_result($id, $url, $nombre, $id_admin);

    if($stmt->affected_rows) {
        $existe = $stmt->fetch();
        if($existe) {
            unlink($directorio.$url);
            $respuesta1 = array(
                'respuesta1' => 'exitoso',
                'observacion' => "Archivo eliminado"
            );
        } else {
            $respuesta1 = array(
                'respuesta1' => 'error'
            );
        }
    }

    $stmt->close();
    
    try {
        $stmt = $conn->prepare('DELETE FROM documentos WHERE id = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta2 = array(
                'respuesta2' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta2 = array(
                'respuesta2' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta2 = array(
            'respuesta2' => $e->getMessage()
        );
    }

    $respuesta = array_merge($respuesta1, $respuesta2);

    $stmt->close();
    $conn->close();
    die(json_encode($respuesta));
}

