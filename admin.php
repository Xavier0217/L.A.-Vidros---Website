<?php
session_start(); 
// Inicia a sessão para verificar login do usuário

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== "admin") {
    header("Location: login.php"); 
    exit();
    // Se não estiver logado como admin, manda de volta para o login
}

function carregarImagem($campo, $default) {
  // Função que carrega o nome da imagem salva em um arquivo .txt
  $arquivo = "config_{$campo}.txt";

  if (file_exists($arquivo)) {
    // Se o arquivo existe, lê o nome da imagem e monta o caminho dela
    return "assets/img/" . trim(file_get_contents($arquivo));
  }

  // Se não existir, usa a imagem padrão
  return $default;
}

$imgTopo = carregarImagem("imagem_topo", "assets/img/d.jpeg");
// Carrega a imagem do topo

// Carrega as 6 imagens da galeria usando a função
$galeria = [
  carregarImagem("galeria_1", "assets/img/c.jpeg"),
  carregarImagem("galeria_2", "assets/img/g.jpeg"),
  carregarImagem("galeria_3", "assets/img/e.jpeg"),
  carregarImagem("galeria_4", "assets/img/b.jpeg"),
  carregarImagem("galeria_5", "assets/img/a.jpeg"),
  carregarImagem("galeria_6", "assets/img/f.jpeg"),
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/admin.css">
  <title>Painel Admin</title>
</head>

<div class="header">
  <h1>Painel de Administração</h1>
  <a href="logout.php">Sair</a>
  <!-- Cabeçalho com botão de sair -->
</div>

<form action="salvar_img.php" method="POST" enctype="multipart/form-data">
  <!-- Formulário que envia novos arquivos de imagem -->

  <div class="img_top">
    <h2>Imagem do topo</h2>
    <img src="<?= $imgTopo ?>"><br>
    <!-- Mostra a imagem atual -->

    <label class="file-label">
      Selecionar arquivo
      <input type="file" name="imagem_topo" class="file-input">
      <!-- Input escondido dentro do label para ficar estilizado -->
    </label>

    <span class="file-name"></span>
    <!-- Aqui vai aparecer o nome do arquivo selecionado -->
  </div>

  <hr>

  <div class="galery">
    <h2>Imagens da Galeria</h2>

    <?php for ($i = 1; $i <= 6; $i++): ?>
      <div class="galery-item">
          <h3>Imagem <?= $i ?></h3>

          <img src="<?= $galeria[$i-1] ?>">
          <!-- Mostra a imagem correspondente -->

          <label class="file-label">
            Selecionar arquivo
            <input type="file" name="galeria_<?= $i ?>" class="file-input">
          </label>

          <span class="file-name"></span>
      </div>
    <?php endfor; ?>
    <!-- Laço que cria 6 blocos, um para cada imagem -->
  </div>

  <button type="submit">Salvar alterações</button>
  <!-- Botão para enviar as imagens atualizadas -->
</form>

<script>
// Mostra o nome do arquivo escolhido em cada input
document.querySelectorAll('.file-input').forEach(input => {
  input.addEventListener('change', function () {

    const span = this.parentElement.nextElementSibling;
    // Pega o <span> ao lado do input

    span.textContent = this.files.length ? this.files[0].name : "";
    // Mostra o nome do arquivo ou limpa se nada for selecionado
  });
});
</script>

</body>
</html>