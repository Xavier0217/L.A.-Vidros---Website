<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: login.html");
    exit();
}

function criarNomePadrao($tipo, $nomeOriginal) {
    $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
    $timestamp = date('Ymd_His');
    return "{$tipo}_{$timestamp}.{$extensao}";
}

$pastas = [
    'imagem_topo' => 'assets/img/',
    'imagem_fundo' => 'assets/img/'
];

foreach ($_FILES as $campo => $arquivo) {
    if ($arquivo['error'] === UPLOAD_ERR_OK) {
        $novoNome = criarNomePadrao($campo, $arquivo['name']);
        $destino = $pastas[$campo] . $novoNome;
        move_uploaded_file($arquivo['tmp_name'], $destino);

        // opcional: Salvar o novo caminho/arquivo em um arquivo de configuração ou banco de dados
        file_put_contents("config_{$campo}.txt", $novoNome);
    }
}

header("Location: admin.php?sucesso=1");
exit();
?>
