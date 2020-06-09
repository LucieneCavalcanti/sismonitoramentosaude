<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Sinais Vitais</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    session_start();
    if(is_null($_SESSION["id"]) || $_SESSION["id"]=="" || $_SESSION["id"]==0)//usuário não foi logado
        header('location:login.php');
    else {
    ?>
    <h1>Cadastro de Equipamentos por Paciente</h1>
    <form name="form1" action="inserirmedico.php" method="post">
        <label>Paciente</label>
        <select name="paciente">
            <option value=""></option> //colocar os pacientes já cadastrados
        </select><br>
        <label>Equipamento</label>
        <select name="equipamento">
            <option value=""></option> //colocar os equipamentos já cadastrados
        </select><br>
        <label>Médico</label>
        <select name="medico">
            <option value=""></option> //colocar os médicos já cadastrados
        </select><br>
        <label>Data Inicial:</label><input type="date" name="datainicial" value=""><br>
        <label>Data Final:</label><input type="date" name="datafinal" value=""><br>
        <label>Responsável:</label><input type="text" name="responsavel" value="" placeholder="Digite o responsável"><br>
        <label>Telefone:</label><input type="text" name="telefone" value="" placeholder="Digite o telefone"><br>
        <input type="submit" value="Cadastrar"><input type="reset" value="Cancelar">
    </form>
    <?php } ?>
<br>
    <br>
    <p align="center">Projeto desenvolvido por Fernando Faitarone, Luciene Cavalcanti e Natália Sperli</p>
    <p align="center">Programa de Pós-graduação em Enfermagem - FAMERP/2020</p>
</body>
</html>