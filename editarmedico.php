<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Sinais Vitais</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Cadastro de Médicos</h1>

    <?php
    session_start();
    if(is_null($_SESSION["id"]) || $_SESSION["id"]=="" || $_SESSION["id"]==0)//usuário não foi logado
        header('location:login.php');
    else {
    $id=$_GET['id'];
    require_once "conexao.php";
    $sql="Select * from tbmedicos where id=$id";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
    ?>

    <form name="form1" action="editarmedico2.php" method="post">
        <label>Id:</label> <?php echo $linha["id"]; ?>
        <input type="hidden" name="id" value="<?php echo $linha["id"]; ?>"><br>
        <label>Nome:</label><input type="text" name="nome" 
            value="<?php echo $linha["nome"]; ?>" placeholder="Digite o nome"><br>
        <label>E-mail:</label><input type="email" name="email" 
            value="<?php echo $linha["email"]; ?>" placeholder="Digite o e-mail"><br>
        <label>Senha:</label><input type="password" name="senha" 
            value="<?php echo $linha["senha"]; ?>"><br>
        <label>Telefone:</label><input type="tel" name="telefone" 
            value="<?php echo $linha["telefone"]; ?>"><br>
        <label>CRM:</label><input type="text" name="crm" 
            value="<?php echo $linha["crm"]; ?>" placeholder="Digite o seu CRM"><br>
        <input type="submit" value="Cadastrar"><input type="reset" value="Cancelar">
    </form>
<br>
    <?php } 
    } ?>
    <br>
    <p align="center">Projeto desenvolvido por Fernando Faitarone, Luciene Cavalcanti e Natália Sperli</p>
    <p align="center">Programa de Pós-graduação em Enfermagem - FAMERP/2020</p>
</body>
</html>