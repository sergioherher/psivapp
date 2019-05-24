<?php 

$boletosDia     = $_POST['boletosDia'];
$boletos2Dias   = $_POST['boletos2Dias'];
$boletoCompleto = $_POST['boletoCompleto'];
$cantCamisas    = $_POST['cantCamisas'];
$cantEtiquetas  = $_POST['cantEtiquetas'];
$id_cliente = $_POST['id_cliente'];

$coookie1 = setcookie("psivapp_".$id_cliente."-boletosDia",$boletosDia,time()+3600, "/");
$coookie2 = setcookie("psivapp_".$id_cliente."-boletos2Dias",$boletos2Dias,time()+3600, "/");
$coookie3 = setcookie("psivapp_".$id_cliente."-boletoCompleto",$boletoCompleto,time()+3600, "/");
$coookie4 = setcookie("psivapp_".$id_cliente."-cantCamisas",$cantCamisas,time()+3600, "/");
$coookie5 = setcookie("psivapp_".$id_cliente."-cantEtiquetas",$cantEtiquetas,time()+3600, "/");

// 

if($coookie1 && $coookie2 && $coookie3 && $coookie4 && $coookie5) {
  $arreglo = array("respuesta" => "exito",
                   "ip_client" => "Cookie generada correctamente");
} else {
  $arreglo = array("respuesta" => "error",
                   "ip_client" => "Hubo un error al crear la cookie");
}

echo json_encode($arreglo);

?>