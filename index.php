<?php
// ---------------------------------------------------------------
// Função para carregar uma imagem salva pelo painel admin
// Ela verifica um arquivo de texto com o nome da imagem escolhida
// Se existir, retorna o caminho dentro de /assets/img/
// Se NÃO existir, usa a imagem padrão enviada no parâmetro $default
// ---------------------------------------------------------------
function carregarImagem($campo, $default)
{
  // Nome do arquivo onde fica salva a referência da imagem
  $arquivo = "config_{$campo}.txt";

  // Se o arquivo existe, pega o nome salvo e retorna o caminho completo
  if (file_exists($arquivo)) {
    return "assets/img/" . trim(file_get_contents($arquivo));
  }

  // Se não existir, usa a imagem padrão
  return $default;
}

// Carrega a imagem principal do topo
$imgTopo = carregarImagem("imagem_topo", "assets/img/d.jpeg");

// Carrega as 6 imagens da galeria
$galeria = [
  carregarImagem("galeria_1", "assets/img/a.jpeg"),
  carregarImagem("galeria_2", "assets/img/b.jpeg"),
  carregarImagem("galeria_3", "assets/img/c.jpeg"),
  carregarImagem("galeria_4", "assets/img/d.jpeg"),
  carregarImagem("galeria_5", "assets/img/e.jpeg"),
  carregarImagem("galeria_6", "assets/img/f.jpeg"),
];
?>

<!doctype html>
<html lang="pt-BR">

  <head>
    <!-- Configuração básica da página -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>L.A Vidros</title>

    <!-- Arquivo de estilos -->
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>

  <body>

    <!-- ----------------------- HEADER ------------------------- -->
    <header>
      <div class="logo">
        <!-- Logo da empresa -->
        <img src="assets/img/logo.png" alt="L.A Vidros">
      </div>
    </header>

    <!-- ------------------ IMAGEM PRINCIPAL --------------------- -->
    <section class="hero">
      <!-- Imagem dinâmica carregada pelo admin -->
      <img src="<?= $imgTopo ?>" alt="Vidros e corrimões">
    </section>


    <!-- ------------------- FAIXA DE INFORMAÇÕES ---------------- -->
    <section class="info-bar">

      <!-- Item 1 -->
      <div class="info-item">
        <div class="icon">🚚</div>
        <p>Entrega Rápida</p>
      </div>

      <!-- Item 2 -->
      <div class="info-item">
        <div class="icon">🛠️</div>
        <p>Produtos de Qualidade</p>
      </div>

      <!-- Item 3 -->
      <div class="info-item">
        <div class="icon">⏱️</div>
        <p>Instalação no Prazo</p>
      </div>

      <!-- Botão que rola até o form de orçamento -->
      <button class="btn-whatsapp" onclick="irParaOrcamento()">
        Quero fazer meu orçamento 💬
      </button>

    </section>


    <!-- ----------------------- GALERIA ------------------------- -->
    <section class="gallery">
      <!-- Cada imagem carrega dinamicamente -->
      <img src="<?= $galeria[0] ?>" alt="20">
      <img src="<?= $galeria[1] ?>" alt="20">
      <img src="<?= $galeria[2] ?>" alt="20">
      <img src="<?= $galeria[3] ?>" alt="20">
      <img src="<?= $galeria[4] ?>" alt="20">
      <img src="<?= $galeria[5] ?>" alt="20">
    </section>


    <!-- ------------ ÁREA DE CONTATO + FORMULÁRIO -------------- -->
    <section class="contact-area" id="orcamento">

      <!-- Texto explicativo ao lado do formulário -->
      <div class="contact-left">
        <h2>Precisando de vidraceiro em Suzano e região?</h2>
        <p>Entre em contato e faça o seu orçamento.</p>

        <h3>L.A VIDROS</h3>
        <p>VIDROS E CORRIMÕES</p>

        <p>Serviço de qualidade com os melhores materiais do mercado.</p>
        <p>Preencha o formulário e garanta já o seu orçamento.</p>
      </div>

      <!-- Formulário que envia os dados para o WhatsApp -->
      <form class="contact-form" onsubmit="enviarWhatsApp(event)">
        
        <label>Nome:</label>
        <input id="nome" type="text" required>

        <label>Telefone:</label>
        <input id="telefone" type="text" required>

        <label>Cidade:</label>
        <input id="cidade" type="text" required>

        <label>Serviço:</label>
        <select id="servico" required>
          <option value="">Selecione...</option>
          <option>Box</option>
          <option>Janela</option>
          <option>Corrimão de Alumínio</option>
          <option>Guarda-corpo de Vidro</option>
          <option>Outro</option>
        </select>

        <label>Mais informações:</label>
        <textarea id="info"></textarea>

        <button type="submit">Quero fazer meu orçamento 💬</button>

      </form>

    </section>


    <!-- ------------------------ RODAPÉ -------------------------- -->
    <footer>
      <p>Siga-nos no nosso Instagram</p>
      <a href="https://www.instagram.com/lavidros/"> @L.A. Vidros</a>
      
      <br>

      <p>Todos os direitos reservados © L.A Vidros</p>
    </footer>


    <!-- ---------------------- JAVASCRIPT ------------------------ -->
    <script>
      // Função que rola a página até a área de orçamento
      function irParaOrcamento() {
        const alvo = document.getElementById("orcamento");

        window.scrollTo({
          top: alvo.offsetTop - 20, // Ajuste suave
        });
      }

      // Enviar formulário diretamente para o WhatsApp
      function enviarWhatsApp(event) {
        event.preventDefault(); // Evita recarregar a página

        // Pega os valores digitados
        const nome = document.getElementById("nome").value;
        const telefone = document.getElementById("telefone").value;
        const cidade = document.getElementById("cidade").value;
        const servico = document.getElementById("servico").value;
        const info = document.getElementById("info").value;

        // Monta mensagem formatada
        const texto = 
          `*NOVO ORÇAMENTO*\n\n` +
          `*Nome:* ${nome}\n` +
          `*Telefone:* ${telefone}\n` +
          `*Cidade:* ${cidade}\n` +
          `*Serviço:* ${servico}\n` +
          `*Descrição:* ${info}`;

        // Número do WhatsApp + texto codificado
        const url = `https://wa.me/551989298479?text=${encodeURIComponent(texto)}`;

        // Abre o WhatsApp em nova aba
        window.open(url, "_blank");
      }
    </script>

  </body>

</html>
