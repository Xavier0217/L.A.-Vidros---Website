<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: login.php");
    exit();
}

function criarNomePadrao($tipo, $nomeOriginal) {
    $ext = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
    $time = date('Ymd_His');
    return "{$tipo}_{$time}.{$ext}";
}

// Campos aceitos
$campos = [
  "imagem_topo",
  "galeria_1",
  "galeria_2",
  "galeria_3",
  "galeria_4",
  "galeria_5",
  "galeria_6"
];

foreach ($campos as $campo) {
    if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
        
        $novoNome = criarNomePadrao($campo, $_FILES[$campo]['name']);
        $destino = "assets/img/" . $novoNome;

        move_uploaded_file($_FILES[$campo]['tmp_name'], $destino);

        file_put_contents("config_{$campo}.txt", $novoNome);
    }
}

header("Location: admin.php");
exit();
?>
