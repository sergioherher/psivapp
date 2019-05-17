<?php
    $conn = new mysqli('localhost','root','zarathustra','psivapp');
	//$conn = new mysqli('by6oiyh4lg6qxaniff6m-mysql.services.clever-cloud.com','unkr5cm5vhkghdqxnpaj','FMhWGZPXiEJ45XexoGWb','by6oiyh4lg6qxaniff6m');

    if ($conn->connect_error) {
      echo $conn->connect_error;
    }
 ?>
