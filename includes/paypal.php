<?php

require __DIR__  . '/paypal/autoload.php';

define('URL_SITIO', 'http://psivapp.com');

//define('URL_SITIO', 'https://psivapp-shh.herokuapp.com/');

$apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          'Af1ZbSEkurVxJqhzWhZNFCzcb6_Tc9DX-rKHJC3-pmf3eX3iWTbiaY3Oumd6bXLEUsNTsW4N_5sfNyMM',  // ClienteID
          'EFTi3dd8tBcTFPvSximYH_gDEypgQrmzDffyYL91E-66nWpSEVjxfGiayvazDVaKdqaGYRAvgb0nURLT'  // Secret
      )
);
