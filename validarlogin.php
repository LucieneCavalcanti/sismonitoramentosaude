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
    // pegar os dados e realizar a validação
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    require_once "conexao.php";
    $sql="Select * from tbpacientes where email='$email' and senha='$senha'";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) { //se encontrou o tipo de usuário é paciente
        //criar a sessão para paciente
        $_SESSION["id"] = $linha['id'];
        $_SESSION["nome"]=$linha['nome'];
        $_SESSION["tipo"]="Paciente";
        header("location:paginalogada.php"); 
    }
    $sql="Select * from tbmedicos where email='$email' and senha='$senha'";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) { //se encontrou o tipo de usuário é médico
        //criar a sessão para médico
        $_SESSION["id"] = $linha['id'];
        $_SESSION["nome"]=$linha['nome'];
        $_SESSION["tipo"]="Médico";
        header("location:paginalogada.php");
    }
    $sql="Select * from tbadministradores where email='$email' and senha='$senha'";
    $result = $conn->query($sql);
    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) { //se encontrou o tipo de usuário é médico
        //criar a sessão para administrador
        $_SESSION["id"] = $linha['id'];
        $_SESSION["nome"]=$linha['nome'];
        $_SESSION["tipo"]="Administrador";
        header("location:paginalogada.php");
    }
    //depois fazer a parte de administrador
    echo "<p>Usuário ou senha inválidos<p>";
    echo "<a href='login.php'>Faça login</a>";
        //fazer a parte da sessão
    ?>
</body>
</html>