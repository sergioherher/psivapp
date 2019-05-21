<?php

if(isset($_COOKIE["psivapp_opciones_registro-boletosDia"])) {
	$boletosDia = $_COOKIE["psivapp_opciones_registro-boletosDia"];
} else {
	$boletosDia = 0;
}

if(isset($_COOKIE["psivapp_opciones_registro-boletos2Dias"])) {
	$boletos2Dias = $_COOKIE["psivapp_opciones_registro-boletos2Dias"];
} else {
	$boletos2Dias = 0;
}

if(isset($_COOKIE["psivapp_opciones_registro-boletoCompleto"])) {
	$boletoCompleto = $_COOKIE["psivapp_opciones_registro-boletoCompleto"];
} else {
	$boletoCompleto = 0;
}

if(isset($_COOKIE["psivapp_opciones_registro-cantCamisas"])) {
	$cantCamisas = $_COOKIE["psivapp_opciones_registro-cantCamisas"];
} else {
	$cantCamisas = 0;
}

if(isset($_COOKIE["psivapp_opciones_registro-cantEtiquetas"])) {
	$cantEtiquetas = $_COOKIE["psivapp_opciones_registro-cantEtiquetas"];
} else {
	$cantEtiquetas = 0;
}

if(isset($_COOKIE["psivapp_opciones_registro-nombre"])) {
	$nombre = $_COOKIE["psivapp_opciones_registro-nombre"];
} else {
	$nombre = "";
}

if(isset($_COOKIE["psivapp_opciones_registro-apellido"])) {
	$apellido = $_COOKIE["psivapp_opciones_registro-apellido"];
} else {
	$apellido = "";
}

if(isset($_COOKIE["psivapp_opciones_registro-email"])) {
	$email = $_COOKIE["psivapp_opciones_registro-email"];
} else {
	$email = "";
}