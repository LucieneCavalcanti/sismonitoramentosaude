<?php
$servername = "mysql.luciene.pro.br";
$username = "luciene06";
$password = "fernando123";

try {
    $conn = new PDO("mysql:host=$servername;dbname=luciene06", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Conectado"; 
    }
catch(PDOException $e)
    {
    echo "Erro de conexão: " . $e->getMessage();
    }
?>