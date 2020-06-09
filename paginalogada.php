<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Sinais Vitais</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Login</h1>
    <?php
    session_start();
    if(is_null($_SESSION["id"]) || $_SESSION["id"]=="" || $_SESSION["id"]==0)//usuário não foi logado
        header('location:login.php');
    else {       
        if($_SESSION["tipo"]=="Paciente"){
            echo "<p>Seja bem vindo(a) " . $_SESSION["nome"] . "</p>";
            echo "<a href='perfil.php'>Atualize seu perfil</a><br>";
            echo "<a href='leituraspaciente.php'>Veja seus dados capturados pelo equipamento</a><br>";
            echo "<a href='alterarequipamento.php'>Altere seu médico ou acompanhante</a><br>";
        }
        if($_SESSION["tipo"]=="Médico"){
            echo "<p>Seja bem vindo(a) " . $_SESSION["nome"] . "</p>";
            echo "<a href='perfil.php'>Atualize seu perfil</a><br>";
            echo "<a href='vermeuspaciente.php'>Visualizar meus pacientes</a><br>";
        }
        if($_SESSION["tipo"]=="Administrador"){
            echo "<p>Seja bem vindo(a) " . $_SESSION["nome"] . "</p>";
            echo "<a href='perfil.php'>Atualize seu perfil</a><br>";
            echo "<a href='cadpaciente.php'>Pacientes</a><br>";
            echo "<a href='cadmedico.php'>Médicos</a><br>";
            echo "<a href='cadequipamento.php'>Equipamentos</a><br>";
            echo "<a href='cadadministrador.php'>Administradores</a><br>";
            echo "<a href='verleituras.php'>Visualizar leituras</a><br>";
        }
    }
    ?>
    <br>
    <p align="center">Projeto desenvolvido por Fernando Faitarone, Luciene Cavalcanti e Natália Sperli</p>
    <p align="center">Programa de Pós-graduação em Enfermagem - FAMERP/2020</p>
</body>
</html>