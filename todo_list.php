<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
   
    header('Location: index.php');
    exit;
}


$username = $_SESSION['username'];

// Obtém a lista de tarefas do usuário (substitua isso por uma consulta ao banco de dados)
$tasks = []; // Array de tarefas


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_task'])) {
    
    $title = $_POST['new_task']['title'];
    $description = $_POST['new_task']['description'];
    $completed = isset($_POST['new_task']['completed']) ? true : false;

    
    $newTask = [
        'title' => $title,
        'description' => $description,
        'completed' => $completed
    ];

    
    $tasks[] = $newTask;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_task'])) {
    // Obtém o índice da tarefa a ser excluída
    $taskIndex = $_POST['delete_task'];

    // Verifica se o índice é válido
    if (isset($tasks[$taskIndex])) {
        // Remove a tarefa da lista de tarefas
        unset($tasks[$taskIndex]);
        
        
        $tasks = array_values($tasks);
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo $username; ?>!</h2>
    <h3>Suas tarefas:</h3>
    <ul>
        <?php foreach ($tasks as $taskIndex => $task) : ?>
            <li>
                <strong>Tarefa:</strong> <?php echo $task['title']; ?><br>
                <strong>Descrição:</strong> <?php echo $task['description']; ?><br>
                <strong>Realizada:</strong> <?php echo $task['completed'] ? 'Sim' : 'Não'; ?>
                <form method="POST" action="">
                    <input type="hidden" name="delete_task" value="<?php echo $taskIndex; ?>">
                    <input type="submit" value="Excluir">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Adicionar nova tarefa:</h3>
    <form method="POST" action="">
        <label for="title">Título:</label>
        <input type="text" name="new_task[title]" id="title" required>
        <br><br>
        <label for="description">Descrição:</label>
        <input type="text" name="new_task[description]" id="description" required>
        <br><br>
        <label for="completed">Realizada:</label>
        <input type="checkbox" name="new_task[completed]"