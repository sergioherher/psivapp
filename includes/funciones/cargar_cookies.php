<?php

$nombre_cookie_boletosDia = "psivapp_".$_SESSION['id_cliente']."-boletosDia";
$nombre_cookie_boletos2Dias = "psivapp_".$_SESSION['id_cliente']."-boletos2Dias";
$nombre_cookie_boletoCompleto = "psivapp_".$_SESSION['id_cliente']."-boletoCompleto";
$nombre_cookie_cantCamisas = "psivapp_".$_SESSION['id_cliente']."-cantCamisas";
$nombre_cookie_cantEtiquetas = "psivapp_".$_SESSION['id_cliente']."-cantEtiquetas";


if(isset($_COOKIE[$nombre_cookie_boletosDia])) {
	$boletosDia = $_COOKIE[$nombre_cookie_boletosDia];
} else {
	$boletosDia = 0;
}

if(isset($_COOKIE[$nombre_cookie_boletos2Dias])) {
	$boletos2Dias = $_COOKIE[$nombre_cookie_boletos2Dias];
} else {
	$boletos2Dias = 0;
}

if(isset($_COOKIE[$nombre_cookie_boletoCompleto])) {
	$boletoCompleto = $_COOKIE[$nombre_cookie_boletoCompleto];
} else {
	$boletoCompleto = 0;
}

if(isset($_COOKIE[$nombre_cookie_cantCamisas])) {
	$cantCamisas = $_COOKIE[$nombre_cookie_cantCamisas];
} else {
	$cantCamisas = 0;
}

if(isset($_COOKIE[$nombre_cookie_cantEtiquetas])) {
	$cantEtiquetas = $_COOKIE[$nombre_cookie_cantEtiquetas];
} else {
	$cantEtiquetas = 0;
}

?>