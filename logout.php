<?php
session_start(); // inicia a sessão para poder mexer nela

session_unset(); // limpa os dados da sessão
session_destroy(); // encerra a sessão completamente

header("Location: login.php"); // manda o usuário de volta para o login
exit(); // garante que o código pare aqui
?>
