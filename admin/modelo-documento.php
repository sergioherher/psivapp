<?php

include_once 'funciones/funciones.php';

$currentDir = getcwd();
$uploadDirectory = "/documentos/";

$errors = []; // Store all foreseen and unforseen errors here

$extensiones = ['pdf','doc','docx']; // Get all the file extensions
$descripcion = $_POST['descripcion_documento'];
$id_admin = $_POST['id_admin'];

$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){
    
    $directorio = "documentos/";
    
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    
    if(move_uploaded_file($_FILES['archivo_documento']['tmp_name'], $directorio . $_FILES['archivo_documento']['name'])) {
        $documento_url = $directorio.$_FILES['archivo_documento']['name'];
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
    
    $directorio = "documentos/";
    
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    
    if(move_uploaded_file($_FILES['archivo_documento']['tmp_name'], $directorio . $_FILES['archivo_documento']['name'])) {
        $documento_url = $directorio.$_FILES['archivo_documento']['name'];
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
    
    try {
        $stmt = $conn->prepare('DELETE FROM documentos WHERE id = ? ');
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
    header("Location:lista-documentos.php");
    die(json_encode($respuesta));
}

