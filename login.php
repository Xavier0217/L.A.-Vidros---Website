<?php
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// Aqui você define o login correto
$usuarioCorreto = "admin";
$senhaCorreta = "1234";

if ($usuario === $usuarioCorreto && $senha === $senhaCorreta) {
    echo "Login bem-sucedido! Bem-vindo, $usuario!";
} else {
    echo "Usuário ou senha incorretos.";
}
?>
