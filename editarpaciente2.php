<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Sinais Vitais</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Cadastro de Pacientes</h1>
    <?php
    session_start();
    if(is_null($_SESSION["id"]) || $_SESSION["id"]=="" || $_SESSION["id"]==0)//usuário não foi logado
        header('location:login.php');
    else {
    //pegar os valores do formulário
        $id=$_POST["id"];
        $nome=$_POST["nome"];
        $email=$_POST["email"];
        $senha=$_POST["senha"];
        $datanascimento=$_POST["datanascimento"];
        $convenio=$_POST["convenio"];
    //montar a instrução SQL
        $sql = "update tbpacientes set nome='$nome',email='$email',senha='$senha',datanascimento='$datanascimento',convenio='$convenio'
            where id=$id";

        require_once "conexao.php"; //conectar com o banco
        $conn->exec($sql); //executar
        echo "<p>Paciente editado com sucesso</p>";
        header("location:cadpaciente.php");
    }
    ?>
    <br>
    <p align="center">Projeto desenvolvido por Fernando Faitarone, Luciene Cavalcanti e Natália Sperli</p>
    <p align="center">Programa de Pós-graduação em Enfermagem - FAMERP/2020</p>
</body>
</html>