<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = 'localhost'; 
    $dbUsername = 'seu_usuario'; 
    $dbPassword = 'sua_senha'; 
    $dbName = 'seu_banco_de_dados'; 

    $mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($mysqli->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
    }

    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);

   $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    
    $result = $mysqli->query($query);

    if (!$result) {
        die('Erro na consulta: ' . $mysqli->error);
    }

    // Verifica se o usuário foi encontrado no banco de dados
    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;
        header('Location: todo_list.php');
        exit;
    } else {
       echo 'Usuário ou senha inválidos.';
    }

    
    $result->free_result();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tela de Login e Cadastro</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
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