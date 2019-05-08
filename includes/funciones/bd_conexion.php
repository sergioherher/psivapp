<?php
    $conn = new mysqli('localhost','root','zarathustra','psivapp');

    if ($conn->connect_error) {
      echo $conn->connect_error;
    }
 ?>
