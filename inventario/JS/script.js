document.addEventListener("DOMContentLoaded", function () {
    // Protege páginas (exceto login)
    if (!window.location.pathname.includes("login") && !localStorage.getItem("logado")) {
      window.location.href = "login.html";
    }
  
    // Login
    const formLogin = document.querySelector("form");
    if (window.location.pathname.includes("login") && formLogin) {
      formLogin.addEventListener("submit", function (e) {
        e.preventDefault();
        const email = document.getElementById("email").value.trim();
        const senha = document.getElementById("senha").value.trim();
        if (email === "admin@empresa.com" && senha === "1234") {
          localStorage.setItem("logado", true);
          alert("Login realizado com sucesso!");
          window.location.href = "index.html";
        } else {
          alert("Email ou senha incorretos.");
        }
      });
    }
  
    // Cadastro de Ativos
    if (window.location.pathname.includes("cadastro-ativos")) {
      formLogin?.addEventListener("submit", function (e) {
        e.preventDefault();
        const nome = document.getElementById("nome").value;
        const descricao = document.getElementById("descricao").value;
        const categoria = document.getElementById("categoria").value;
        const patrimonio = document.getElementById("patrimonio").value;
  
        const ativos = JSON.parse(localStorage.getItem("ativos")) || [];
  
        ativos.push({ nome, descricao, categoria, patrimonio });
        localStorage.setItem("ativos", JSON.stringify(ativos));
  
        alert("Ativo cadastrado com sucesso!");
        formLogin.reset();
      });
    }
  
    // Movimentações
    if (window.location.pathname.includes("movimentacoes")) {
      formLogin?.addEventListener("submit", function (e) {
        e.preventDefault();
        const ativo = document.getElementById("ativo").value;
        const tipo = document.getElementById("tipo").value;
        const destino = document.getElementById("destino").value;
        const data = document.getElementById("data").value;
  
        const movimentacoes = JSON.parse(localStorage.getItem("movimentacoes")) || [];
  
        movimentacoes.push({ ativo, tipo, destino, data });
        localStorage.setItem("movimentacoes", JSON.stringify(movimentacoes));
  
        alert("Movimentação registrada!");
        formLogin.reset();
      });
    }
  
    // Relatórios
    if (window.location.pathname.includes("relatorios")) {
      const tbody = document.querySelector("tbody");
      const formRelatorio = document.querySelector("form");
  
      if (tbody && formRelatorio) {
        const render = (filtroCategoria = "Todos", filtroData = "") => {
          const dados = JSON.parse(localStorage.getItem("movimentacoes")) || [];
          tbody.innerHTML = "";
  
          dados.forEach(item => {
            const matchCategoria = filtroCategoria === "Todos" || item.tipo === filtroCategoria;
            const matchData = !filtroData || item.data?.startsWith(filtroData);
  
            if (matchCategoria && matchData) {
              const row = `
                <tr>
                  <td>${item.ativo}</td>
                  <td>${item.tipo}</td>
                  <td>${item.destino}</td>
                  <td>${item.data}</td>
                </tr>`;
              tbody.innerHTML += row;
            }
          });
        };
  
        formRelatorio.addEventListener("submit", function (e) {
          e.preventDefault();
          const categoria = document.getElementById("filtro-categoria").value;
          const data = document.getElementById("filtro-data").value;
          render(categoria, data);
        });
  
        render(); // Carrega inicialmente
      }
    }
  });
  
  // Função global de logout
  function logout() {
    localStorage.removeItem("logado");
    window.location.href = "login.html";
  }
  