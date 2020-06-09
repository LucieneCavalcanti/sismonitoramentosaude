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
    <h1>Cadastro de Médicos</h1>
    <form name="form1" action="inserirmedico.php" method="post">
        <label>Nome:</label><input type="text" name="nome" value="" placeholder="Digite o nome"><br>
        <label>E-mail:</label><input type="email" name="email" value="" placeholder="Digite o e-mail"><br>
        <label>Senha:</label><input type="password" name="senha" value=""><br>
        <label>Telefone:</label><input type="tel" name="telefone" value=""><br>
        <label>CRM:</label><input type="text" name="crm" value="" placeholder="Digite o seu CRM"><br>
        <input type="submit" value="Cadastrar"><input type="reset" value="Cancelar">
    </form>
<br>
<h2>Médicos Cadastrados</h2>
<table>
<tr><th>id</th><th>Nome</th><th>E-mail</th><th>Telefone</th><th>CRM</th><th>Ações</th></tr>
<?php
    require_once "conexao.php";
    $sql="Select * from tbmedicos order by nome";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
        echo "<tr><td>".$linha["id"]."</td><td>".$linha["nome"]."</td><td> ".$linha["email"]."</td>".
        "<td>".$linha["telefone"]."</td><td>".$linha["crm"]."</td>".
        "<td><a href='editarmedico.php?id=".$linha["id"]."'>Editar</a> ".
        "<a href='excluirmedico.php?id=".$linha["id"]."'>Excluir</a></td>".
        "</tr>";
        
    }
}
?>
</table>
    <br>
    <p align="center">Projeto desenvolvido por Fernando Faitarone, Luciene Cavalcanti e Natália Sperli</p>
    <p align="center">Programa de Pós-graduação em Enfermagem - FAMERP/2020</p>
</body>
</html>