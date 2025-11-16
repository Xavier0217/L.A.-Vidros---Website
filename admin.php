<?php
session_start();

// Se não tiver logado, manda pro login
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== "admin") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
</head>

<body>

<h1>Bem-vindo, Admin!</h1>

<a href="logout.php">Sair</a>

<br><br>
<h2>Aqui você poderá editar as imagens do site (depois implementamos isso)</h2>

</body>
</html>
