<?php
function carregarImagem($campo, $default)
{
  $arquivo = "config_{$campo}.txt";
  if (file_exists($arquivo)) {
    return "assets/img/" . trim(file_get_contents($arquivo));
  }
  return $default;
}

$imgTopo = carregarImagem("imagem_topo", "assets/img/d.jpeg");

// Galeria (6 imagens)
$galeria = [
  carregarImagem("galeria_1", "assets/img/c.jpeg"),
  carregarImagem("galeria_2", "assets/img/g.jpeg"),
  carregarImagem("galeria_3", "assets/img/e.jpeg"),
  carregarImagem("galeria_4", "assets/img/b.jpeg"),
  carregarImagem("galeria_5", "assets/img/a.jpeg"),
  carregarImagem("galeria_6", "assets/img/f.jpeg"),
];
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>L.A Vidros</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

  <!-- Header -->
  <header>
    <div class="logo">
      <img src="assets/img/logo.png" alt="L.A Vidros">
    </div>
  </header>

  <!-- Imagem Principal -->
  <section class="hero">
    <img src="<?= $imgTopo ?>" alt="Vidros e corrimões">
  </section>


  <!-- Faixa de informações -->
  <section class="info-bar">

    <div class="info-item">
      <div class="icon">🚚</div>
      <p>Entrega Rápida</p>
    </div>

    <div class="info-item">
      <div class="icon">🛠️</div>
      <p>Produtos de Qualidade</p>
    </div>

    <div class="info-item">
      <div class="icon">⏱️</div>
      <p>Instalação no Prazo</p>
    </div>

    <a class="btn-whatsapp" href="https://wa.me/551989298479?text=Ol%C3%A1%21%20Vi%20o%20site%20de%20voc%C3%AAs%20e%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20e%20servi%C3%A7os%20que%20oferecem.%20Poderiam%20me%20enviar%20mais%20informa%C3%A7%C3%B5es%2C%20por%20favor%3F" target="_blank">
      Quero fazer meu orçamento 💬
    </a>

  </section>

  <!-- Galeria -->
  <section class="gallery">
    <section class="gallery">
      <img src="<?= $galeria[0] ?>" alt="20">
      <img src="<?= $galeria[1] ?>" alt="20">
      <img src="<?= $galeria[2] ?>" alt="20">
      <img src="<?= $galeria[3] ?>" alt="20">
      <img src="<?= $galeria[4] ?>" alt="20">
      <img src="<?= $galeria[5] ?>" alt="20">
    </section>

  </section>

  <!-- Área de texto + formulário -->
  <section class="contact-area">

    <div class="contact-left">
      <h2>Precisando de vidraceiro em Suzano e região?</h2>
      <p>Entre em contato e faça o seu orçamento.</p>

      <h3>L.A VIDROS</h3>
      <p>VIDROS E CORRIMÕES</p>

      <p>Serviço de qualidade com os melhores materiais do mercado.</p>
      <p>Preencha o formulário e garanta já o seu orçamento.</p>
    </div>

    <form class="contact-form">
      <label>Nome:</label>
      <input type="text">

      <label>Telefone:</label>
      <input type="text">

      <label>Cidade:</label>
      <input type="text">

      <label>Serviço:</label>
      <input type="text">

      <label>Mais informações:</label>
      <textarea></textarea>
      <a href="https://wa.me/551989298479?text=Ol%C3%A1%21%20Vi%20o%20site%20de%20voc%C3%AAs%20e%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20e%20servi%C3%A7os%20que%20oferecem.%20Poderiam%20me%20enviar%20mais%20informa%C3%A7%C3%B5es%2C%20por%20favor%3F"
        target="_blank">
        <button type="button">Quero fazer meu orçamento 💬</button>
      </a>
    </form>

  </section>

  <!-- Rodapé -->
  <footer>
    <p>© L.A Vidros</p>
  </footer>

</body>

</html>