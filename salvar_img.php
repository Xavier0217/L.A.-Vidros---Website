<?php
session_start(); // inicia a sessão

// se não estiver logado como admin, volta pro login
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// lista de campos que podem receber imagens
$campos = [
  "imagem_topo",
  "galeria_1",
  "galeria_2",
  "galeria_3",
  "galeria_4",
  "galeria_5",
  "galeria_6"
];

// percorre cada campo de imagem
foreach ($campos as $campo) {

    // verifica se um arquivo foi enviado sem erro
    if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] === UPLOAD_ERR_OK) {

        // nome do arquivo .txt que guarda o nome da imagem salva
        $configFile = "config_{$campo}.txt";

        // lê o nome antigo salvo no txt (se existir)
        $nomeAtual = file_exists($configFile) ? trim(file_get_contents($configFile)) : null;

        // se já existia uma imagem anterior, apaga ela
        if ($nomeAtual && file_exists("assets/img/" . $nomeAtual)) {
            unlink("assets/img/" . $nomeAtual);
        }

        // pega a extensão da nova imagem
        $ext = pathinfo($_FILES[$campo]['name'], PATHINFO_EXTENSION);

        // cria um nome fixo baseado no campo (ex: galeria_1.jpg)
        $novoNome = "{$campo}.{$ext}";

        // caminho onde a imagem será guardada
        $destino = "assets/img/" . $novoNome;

        // salva a imagem enviada na pasta
        move_uploaded_file($_FILES[$campo]['tmp_name'], $destino);

        // atualiza o .txt com o nome da imagem salva
        file_put_contents($configFile, $novoNome);
    }
}

// após salvar tudo, volta para o painel admin
header("Location: admin.php");
exit();
?>
