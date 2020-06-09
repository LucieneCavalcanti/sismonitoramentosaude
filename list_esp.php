<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Sinais Vitais</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Leituras</h1>

<?php
    require_once "conexao.php"; //conectar com o banco
    $sql="Select * from SensorData";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
        //echo $linha. "<br>";
        echo $linha['id'] . " - " . 	$linha['sensor'] . " - " . 	 	$linha['location'] . " - " . 	
         	$linha['value1'] . " - " . 	 	
        $linha['value2'] . " - " . 	 	$linha['value3'] . " - " . 	
         	$linha['reading_time'] . "<br>"; 
        
    }
?>
</table>
    <br>
    <p align="center">Projeto desenvolvido por Fernando Faitarone, Luciene Cavalcanti e Natália Sperli</p>
    <p align="center">Programa de Pós-graduação em Enfermagem - FAMERP/2020</p>
</body>
</html>
<!--
http://www.luciene.pro.br/emonitor/gravarleituras.php?batimento=1&temperatura=1&niveldor=1&pressaosistolica=1&pressaodiastolica=1&saturacao=1&idpaciente=1&idequipamento=1

http://www.luciene.pro.br/emonitor/gravarleituras.php

-->