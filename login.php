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
        session_destroy();
    ?>
    <h1>Login</h1>
    <form name="form1" action="validarlogin.php" method="post">
    <label>Digite o seu e-mail</label>
    <input type="email" name="email" value="" placeholder="Digite o e-mail"><br>
    <label>Digite sua senha</label>
    <input type="password" name="senha" value="" placeholder="Digite a senha"><br>
    <input type="submit" value="Acessar"><input type="reset" value="Cancelar">
    </form>
    <?php
        //fazer a parte da sessão
    ?>
</body>
</html>