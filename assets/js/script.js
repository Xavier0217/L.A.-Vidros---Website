const ADMIN_EMAIL = "admin@site.com";
const ADMIN_SENHA = "123456";

async function fazerLogin(form) {
  const dados = new FormData(form);

  const req = await fetch("login.php", {
    method: "POST",
    body: dados
  });

  const resposta = await req.json();

  if (resposta.ok) {
    sessionStorage.setItem("role", resposta.role);
    window.location.href = "index.html";
  } else {
    alert("Login inválido");
  }
}

function checarAutenticacao(paginaAlvo) {
  const role = sessionStorage.getItem("role");
  if (!role) {
    window.location.href = "login.html";
  } else if (paginaAlvo === "admin" && role !== "admin") {
    // se tentar entrar na página admin e não for admin
    window.location.href = "index.html";
  }
}

function adicionarLinkAdmin() {
  const role = sessionStorage.getItem("role");
  if (role === "admin") {
    document.body.innerHTML += `<a href="admin.html">Painel Admin</a>`;
  }
}

function logout() {
  sessionStorage.removeItem("role");
  window.location.href = "login.html";
}
