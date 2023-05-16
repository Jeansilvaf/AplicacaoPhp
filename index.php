<!DOCTYPE html>
<html>
<head>
    <title>Tela de Login e Cadastro</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="username">Usuário:</label>
        <input type="text" name="username" id="username" required>
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <input type="submit" value="Login">
    </form>
    <br>
    <h2>Cadastro</h2>
    <form method="POST" action="cadastro.php">
        <label for="new_username">Usuário:</label>
        <input type="text" name="new_username" id="new_username" required>
        <br><br>
        <label for="new_password">Senha:</label>
        <input type="password" name="new_password" id="new_password" required>
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>