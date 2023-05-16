<?php
// Verifica se os campos de cadastro foram preenchidos
if (isset($_POST['new_username']) && isset($_POST['new_password'])) {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    $host = 'localhost'; 
    $dbUsername = 'seu_usuario'; 
    $dbPassword = 'sua_senha'; 
    $dbName = 'seu_banco_de_dados'; 

    $mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    
    if ($mysqli->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
    }

    
    $newUsername = $mysqli->real_escape_string($newUsername);
    $newPassword = $mysqli->real_escape_string($newPassword);

    
    $query = "INSERT INTO users (username, password) VALUES ('$newUsername', '$newPassword')";

    // Executa a consulta SQL
    if ($mysqli->query($query)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo 'Erro ao realizar o cadastro: ' . $mysqli->error;
    }
}
?>

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
    <form method="POST" action="">
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