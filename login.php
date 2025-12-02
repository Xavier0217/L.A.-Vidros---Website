<?php
session_start(); // inicia a sessão para poder usar login

// verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // pega os valores enviados pelo formulário
    $usuario = $_POST['usuario'] ?? ''; // recebe o usuário
    $senha   = $_POST['senha'] ?? '';   // recebe a senha

    // confere se o usuário e senha estão corretos
    if ($usuario === "admin" && $senha === "1234") {
        $_SESSION['usuario'] = "admin"; // salva que o usuário está logado
        header("Location: admin.php");  // manda para o painel
        exit(); // para o código aqui
    } else {
        $erro = "Usuário ou senha incorretos!"; // mensagem de erro
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8"> <!-- aceita acentos -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- deixa o site responsivo -->
  <title>L.A Vidros - Login</title>
  <link rel="stylesheet" href="assets/css/login.css"> <!-- chama o CSS do login -->
</head>

<body>

  <div class="login-box"> <!-- caixa centralizada do login -->
    <img src="assets/img/logo.png" alt="Logo"> <!-- logo em cima -->

    <!-- mostra o erro, caso exista -->
    <?php if (isset($erro)): ?>
      <p style="color:red;"><?= $erro ?></p>
    <?php endif; ?>

    <!-- formulário de login -->
    <form method="POST">
      <label>Usuário:</label>
      <input type="text" name="usuario" required> <!-- campo do usuário -->

      <label>Senha:</label>
      <input type="password" name="senha" required> <!-- campo da senha -->

      <button type="submit">Entrar</button> <!-- botão de enviar -->
    </form>
  </div>

</body>
</html>
