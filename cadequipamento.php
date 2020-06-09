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
    <h1>Cadastro de Equipamentos</h1>
    <form name="form1" action="inserirequipamento.php" method="post">
        <label>Descrição:</label><input type="text" name="descricao" value="" placeholder="Digite a descrição"><br>
        <label>Serial:</label><input type="text" name="serial" value="" placeholder="Digite o serial"><br>
        <input type="submit" value="Cadastrar"><input type="reset" value="Cancelar">
    </form>
<br>
<h2>Equipamentos Cadastrados</h2>
<table>
<tr><th>id</th><th>Descrição</th><th>Serial</th><th>Ações</th></tr>
<?php
    require_once "conexao.php";
    $sql="Select * from tbequipamentos order by descricao";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
        echo "<tr><td>".$linha["id"]."</td><td>".$linha["descricao"]."</td><td> ".$linha["serial"]."</td>".
        "<td><a href='editarequipamento.php?id=".$linha["id"]."'>Editar</a> ".
        "<a href='excluirequipamento.php?id=".$linha["id"]."'>Excluir</a></td>".
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