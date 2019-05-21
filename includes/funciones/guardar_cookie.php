<?php 

$boletosDia     = $_POST['boletosDia'];
$boletos2Dias   = $_POST['boletos2Dias'];
$boletoCompleto = $_POST['boletoCompleto'];
$cantCamisas    = $_POST['cantCamisas'];
$cantEtiquetas  = $_POST['cantEtiquetas'];
$nombre         = $_POST['nombre'];
$apellido       = $_POST['apellido'];
$email          = $_POST['email'];

$coookie1 = setcookie("psivapp_opciones_registro-boletosDia",$boletosDia,time()+3600, "/");
$coookie2 = setcookie("psivapp_opciones_registro-boletos2Dias",$boletos2Dias,time()+3600, "/");
$coookie3 = setcookie("psivapp_opciones_registro-boletoCompleto",$boletoCompleto,time()+3600, "/");
$coookie4 = setcookie("psivapp_opciones_registro-cantCamisas",$cantCamisas,time()+3600, "/");
$coookie5 = setcookie("psivapp_opciones_registro-cantEtiquetas",$cantEtiquetas,time()+3600, "/");
$coookie6 = setcookie("psivapp_opciones_registro-nombre",$nombre,time()+3600, "/");
$coookie7 = setcookie("psivapp_opciones_registro-apellido",$apellido,time()+3600, "/");
$coookie8 = setcookie("psivapp_opciones_registro-email",$email,time()+3600, "/");

// 

if($coookie1 && $coookie2 && $coookie3 && $coookie4 && $coookie5 && $coookie6 && $coookie7 && $coookie8) {
  $arreglo = array("respuesta" => "exito",
                   "ip_client" => "Cookie generada correctamente");
} else {
  $arreglo = array("respuesta" => "error",
                   "ip_client" => "Hubo un error al crear la cookie");
}

echo json_encode($arreglo);

?>