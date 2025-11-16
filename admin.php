<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== "admin") {
    header("Location: login.php");
    exit();
}

function carregarImagem($campo, $default) {
  $arquivo = "config_{$campo}.txt";
  if (file_exists($arquivo)) {
    return "assets/img/" . trim(file_get_contents($arquivo));
  }
  return $default;
}

$imgTopo = carregarImagem("imagem_topo", "assets/img/d.jpeg");

// Carregar as 6 imagens da galeria
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
  <title>Painel Admin</title>
</head>
<body>

<h1>Painel de Administração</h1>
<a href="logout.php">Sair</a>

<form action="salvar_img.php" method="POST" enctype="multipart/form-data">

  <h2>Imagem do topo</h2>
  <img src="<?= $imgTopo ?>" width="300"><br>
  <input type="file" name="imagem_topo">

  <hr>

  <h2>Imagens da Galeria</h2>

  <?php for ($i = 1; $i <= 6; $i++): ?>
      <h3>Imagem <?= $i ?></h3>
      <img src="<?= $galeria[$i-1] ?>" width="200"><br>
      <input type="file" name="galeria_<?= $i ?>">
      <br><br>
  <?php endfor; ?>

  <button type="submit">Salvar alterações</button>
</form>

</body>
</html>
