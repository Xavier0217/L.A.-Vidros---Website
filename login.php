<?php
session_start();

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = $_POST['usuario'] ?? '';
    $senha   = $_POST['senha'] ?? '';

    // Login fixo
    $usuarioAdmin = "admin";
    $senhaAdmin   = "1234";

    if ($usuario === $usuarioAdmin && $senha === $senhaAdmin) {
        $_SESSION['usuario'] = "admin";
        header("Location: admin.php");
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>L.A Vidros - Login</title>

  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

  <div class="login-box">
    <img src="assets/img/logo.png" alt="Logo">

    <?php if (isset($erro)): ?>
      <p style="color:red;"><?= $erro ?></p>
    <?php endif; ?>

    <form method="POST">
      <label>Usuário:</label>
      <input type="text" name="usuario" placeholder="Digite seu login" required>

      <label>Senha:</label>
      <input type="password" name="senha" placeholder="Digite sua senha" required>

      <button type="submit">Entrar</button>
    </form>
  </div>

</body>
</html>
