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
    /*
    $batimento = filter_input(INPUT_GET, 'batimento', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Batimento:".$batimento ."<br>";
    $temperatura = filter_input(INPUT_GET, 'temperatura', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Temperatura:".$temperatura ."<br>";
    $niveldor = filter_input(INPUT_GET, 'niveldor', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Dor:".$niveldor ."<br>";
    $pressaosistolica = filter_input(INPUT_GET, 'pressaosistolica', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Pressão 1:".$pressaosistolica ."<br>";
    $pressaodiastolica = filter_input(INPUT_GET, 'pressaodiastolica', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Pressão 2:".$pressaodiastolica ."<br>";
    $saturacao = filter_input(INPUT_GET, 'saturacao', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Saturação".$saturacao ."<br>";
    $idpaciente = filter_input(INPUT_GET, 'idpaciente', FILTER_SANITIZE_NUMBER_INT);
    echo "Paciente:".$idpaciente ."<br>";
    $idequipamento = filter_input(INPUT_GET, 'idequipamento', FILTER_SANITIZE_NUMBER_INT);
    echo "Equipamento:".$idequipamento ."<br>";


    $batimento = filter_input(INPUT_POST, 'batimento', FILTER_SANITIZE_NUMBER_INT);
    echo "Batimento:".$batimento ."<br>";
    $temperatura = filter_input(INPUT_POST, 'temperatura', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Temperatura:".$temperatura ."<br>";
    $niveldor = filter_input(INPUT_POST, 'niveldor', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Dor:".$niveldor ."<br>";
    $pressaosistolica = filter_input(INPUT_POST, 'pressaosistolica', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Pressão 1:".$pressaosistolica ."<br>";
    $pressaodiastolica = filter_input(INPUT_POST, 'pressaodiastolica', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Pressão 2:".$pressaodiastolica ."<br>";
    $saturacao = filter_input(INPUT_POST, 'saturacao', FILTER_SANITIZE_NUMBER_FLOAT);
    echo "Saturação".$saturacao ."<br>";
    $idpaciente = filter_input(INPUT_POST, 'idpaciente', FILTER_SANITIZE_NUMBER_INT);
    echo "Paciente:".$idpaciente ."<br>";
    $idequipamento = filter_input(INPUT_POST, 'idequipamento', FILTER_SANITIZE_NUMBER_INT);
    echo "Equipamento:".$idequipamento ."<br>";
*/
$batimento = $_POST['batimento'];
$temperatura = $_POST['temperatura'];
$niveldor = $_POST['niveldor'];
$pressaosistolica = $_POST['pressaosistolica'];
$pressaodiastolica = $_POST['pressaodiastolica'];
$saturacao = $_POST['saturacao'];
$idpaciente = $_POST['idpaciente'];
$idequipamento = $_POST['idequipamento'];

    if (is_null($batimento) || is_null($temperatura) || is_null($niveldor) || is_null($pressaosistolica)
    || is_null($pressaodiastolica) || is_null($saturacao) || is_null($idpaciente) || is_null($idequipamento) ) {
      //Gravar log de erros
      echo ("<p>Dados inválidos</p><br>");
    } else {
    
    //montar a instrução SQL
        $sql = "insert into tbleituras (batimento,temperatura,niveldor,pressaosistolica,pressaodiastolica,
        saturacao,idpaciente,idequipamento,datahora)  
        values ($batimento,$temperatura,$niveldor,$pressaosistolica,$pressaodiastolica,
        $saturacao,$idpaciente,$idequipamento,now())";

        require_once "conexao.php"; //conectar com o banco
        $conn->exec($sql); //executar
        echo "<p>Leitura salva com sucesso</p>";
    }
    ?>
    <table>
<tr><th>id</th><th>batimento</th><th>temperatura</th><th>niveldor</th><th>pressaosistolica</th><th>pressaodiastolica</th><th>
        saturacao</th><th>idpaciente</th><th>idequipamento</th><th>datahora</th></td>
<?php
    require_once "conexao.php"; //conectar com o banco
    $sql="Select * from tbleituras order by datahora desc";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
        echo "<tr><td>".$linha["id"]."</td><td>".$linha["batimento"]."</td><td> ".$linha["temperatura"]."</td>".
        "<td>".$linha["niveldor"]."</td><td>".$linha["pressaosistolica"]."</td>".
        "<td>".$linha["pressaodiastolica"]."</td><td>".$linha["saturacao"]."</td>".
        "<td>".$linha["idpaciente"]."</td><td>".$linha["idequipamento"]."</td>"."<td>".$linha["datahora"].
        "</td></tr>";
        
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