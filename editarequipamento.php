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
    $id=$_GET['id'];
    require_once "conexao.php";
    $sql="Select * from tbequipamentos where id=$id";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
    ?>
    <h1>Cadastro de Equipamentos</h1>
    <form name="form1" action="editarequipamento2.php" method="post">
    <label>Id:</label> <?php echo $linha["id"]; ?>
        <input type="hidden" name="id" value="<?php echo $linha["id"]; ?>"><br>
        <label>Descrição:</label><input type="text" name="descricao" 
            value="<?php echo $linha["descricao"]; ?>" placeholder="Digite a descrição"><br>
        <label>Serial:</label><input type="text" name="serial" 
            value="<?php echo $linha["serial"]; ?>" placeholder="Digite o serial"><br>
        <input type="submit" value="Cadastrar"><input type="reset" value="Cancelar">
    </form>
<br>

<?php    
    }
}
?>

    <br>
    <p align="center">Projeto desenvolvido por Fernando Faitarone, Luciene Cavalcanti e Natália Sperli</p>
    <p align="center">Programa de Pós-graduação em Enfermagem - FAMERP/2020</p>
</body>
</html>