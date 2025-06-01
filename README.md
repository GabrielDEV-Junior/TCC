
# 📦 Sistema de Gestão de Ativos — TCC-PHP

Sistema web simples para gestão de ativos com:

✅ Cadastro de usuários  
✅ Login com autenticação de sessão  
✅ Cadastro e movimentação de ativos  
✅ Relatórios de ativos e movimentações  
✅ Layout responsivo com **Bootstrap 5**

## 🚀 Tecnologias utilizadas

- PHP 7+
- MySQL 5+
- Bootstrap 5 (CDN)
- HTML5 e CSS3

## ⚙️ Pré-requisitos

- Servidor local: **XAMPP**, **WAMP** ou **Laragon**
- PHP e MySQL funcionando
- Navegador atualizado

## 🗂️ Instalação

1. Clone ou baixe este repositório.
2. Coloque a pasta dentro do diretório:

   ```
   C:/xampp/htdocs/TCC-PHP-Final/
   ```

3. Inicie o **Apache** e **MySQL** no painel do XAMPP.

## 🛠️ Configuração do Banco de Dados

1. Acesse `http://localhost/phpmyadmin`
2. Crie um banco de dados:

```sql
CREATE DATABASE sistema_ativos;

USE sistema_ativos;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(255)
);

CREATE TABLE ativos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    descricao TEXT
);

CREATE TABLE movimentacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ativo_id INT,
    destino VARCHAR(100),
    data_movimentacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ativo_id) REFERENCES ativos(id)
);
```

3. Configure o arquivo `conexao.php` com os dados corretos:

```php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sistema_ativos";
```

## 🔑 Fluxo de navegação

1. Acesse: `http://localhost/TCC-PHP-Final/login.php`
2. Faça o **login** ou **cadastre-se**.
3. Após login → Painel (`index.php`):
   - Cadastro de Ativo
   - Movimentação de Ativo
   - Relatórios
4. Clique em **Logout** para encerrar a sessão.

## ✅ Funcionalidades

- ✔️ **Login seguro** com `password_hash()` e `password_verify()`
- ✔️ **Sessão protegida** com `session_start()`
- ✔️ **Cadastro e movimentação** de ativos
- ✔️ **Relatórios** em lista
- ✔️ **Interface moderna** e responsiva

## 📄 Licença

MIT — use e modifique à vontade!

## 🤝 Contribuição

Sugestões e melhorias são bem-vindas!
