<?php

if(!isset($_POST['enviado'])) {
      exit("Hubo un error");
}

require_once 'includes/mpdf/autoload.php';
require_once 'includes/paypal.php';

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

$tipo_de_pago = $_POST['tipo_de_pago'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$cliente_id = $_POST['id_cliente'];
$regalo = $_POST['regalo'];
$total = $_POST['total_pedido'];
$fecha = date('Y-m-d H:i:s');
// Pedidos
$boletos = $_POST['boletos'];
$numero_boletos = $boletos;

$pedidoExtra = $_POST['pedido_extra'];
$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
$precioCamisa = $_POST['pedido_extra']['camisas']['precio'];
$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
$precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];
include_once 'includes/funciones/funciones.php';
$pedido = productos_json($boletos, $camisas, $etiquetas);
$eventos = $_POST['registro'];
$registro = eventos_json($eventos);

try {
  require_once('includes/funciones/bd_conexion.php');
  $stmt = $conn->prepare("INSERT INTO registrados (cliente_id, nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssssis", $cliente_id, $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
  $stmt->execute();
  $ID_registro = $stmt->insert_id;
  $stmt->close();
  $conn->close();
  //header('Location: validar_registro.php?exitoso=1');
} catch (Exception $e) {
  $error = $e->getMessage();
}

if($tipo_de_pago == 0) {

  $compra = new Payer();
  $compra->setPaymentMethod('paypal');


  $articulo = new Item();

  /*$articulo->setName($producto)
           ->setCurrency('MXN')
           ->setQuantity(1)
           ->setPrice($precio);*/

  $articulo->setName($eventos)
           ->setCurrency('MXN')
           ->setQuantity(1)
           ->setPrice($total);

  $i = 0;
  $arreglo_pedido = array();
  foreach($numero_boletos as $key => $value) {
        if( (int) $value['cantidad'] > 0 ) {

              ${"articulo$i"} = new Item();
              $arreglo_pedido[] = ${"articulo$i"};
              ${"articulo$i"}->setName('Pase: ' . $key)
                            ->setCurrency('MXN')
                            ->setQuantity( (int) $value['cantidad'] )
                            ->setPrice( (int) $value['precio'] );
              $i++;
        }
  }

  foreach($pedidoExtra as $key => $value) {
        if( (int) $value['cantidad'] > 0 ) {
              if($key == 'camisas') {
                  $precio = (float) $value['precio'] * .93;
              } else {
                  $precio = (int) $value['precio'];
              }
              ${"articulo$i"} = new Item();
              $arreglo_pedido[] = ${"articulo$i"};
              ${"articulo$i"}->setName('Extras: ' . $key)
                             ->setCurrency('MXN')
                             ->setQuantity( (int) $value['cantidad'] )
                             ->setPrice( $precio );
              $i++;
        }
  }

  $listaArticulos = new ItemList();
  $listaArticulos->setItems($arreglo_pedido);

  $cantidad = new Amount();
  $cantidad->setCurrency('MXN')->setTotal($_POST['total_pedido']);

  $transaccion =  new Transaction();
  $transaccion->setAmount($cantidad)
              ->setItemList($listaArticulos)
              ->setDescription('Pago PSIVAPP ')
              ->setInvoiceNumber($ID_registro);

  $redireccionar = new RedirectUrls();
  $redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true&id_pago={$ID_registro}")
                ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false&id_pago={$ID_registro}");           


  $pago = new Payment();
  $pago->setIntent("sale")
       ->setPayer($compra)
       ->setRedirectUrls($redireccionar)
       ->setTransactions(array($transaccion));

  try {
      $pago->create($apiContext);
  } catch (PayPal\Exception\PayPalConnectionException $pce) {
      echo "<pre>";
      print_r(json_decode($pce->getData()));
      exit;
      echo "</pre>";
  }

  $aprobado = $pago->getApprovalLink();

  header("Location: {$aprobado}");

} else {

  ini_set('memory_limit', '64M');

  ob_start();
  include("includes/reportes/reporte_pago.php");
  $html = ob_get_clean();

  $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML($html);
  $mpdf->Output();
}