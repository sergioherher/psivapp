<?php


require __DIR__  . '/paypal/autoload.php';

//define('URL_SITIO', 'http://localhost/PSIVAPP/');

define('URL_SITIO', 'https://psivapp-shh.herokuapp.com/');

/*$apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          'Af1ZbSEkurVxJqhzWhZNFCzcb6_Tc9DX-rKHJC3-pmf3eX3iWTbiaY3Oumd6bXLEUsNTsW4N_5sfNyMM',  // ClienteID
          'EFTi3dd8tBcTFPvSximYH_gDEypgQrmzDffyYL91E-66nWpSEVjxfGiayvazDVaKdqaGYRAvgb0nURLT'  // Secret
      )
);*/

$apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          'Abq0znKS4MqKSHh3Tr3RDN5pNqWNHDvlS1VKHlWo7eR7f3zI2axL3eVGHp98QJgGHnbvMbIUqVhkJ3p5',  // ClienteID
          'EFqBS5EjtQ6hTOdpkp-3IDyH-tGPLkROhz8uSQqBA0ptMS-Xv8Vou3XtI3rpJeXGfyVkTN_lp1V3RaoV'  // Secret
      )
);
