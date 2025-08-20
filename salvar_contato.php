<?php
// salvar_contato.php

// Configurações do banco de dados
$host = "127.0.0.1";
$dbname = "aguiadoleste";
$username = "root";
$password = "";

// Conexão com o banco
$conn = new mysqli($host, $username, $password, $dbname);

// Checa conexão
if ($conn->connect_error) {
    header("Location: contatos.html?erro=1");
    exit;
}

// Verifica se os dados vieram via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $assunto = trim($_POST['assunto']);
    $mensagem = trim($_POST['mensagem']);

    // Validação básica
    if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
        header("Location: contatos.html?erro=1");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contatos.html?erro=1");
        exit;
    }

    // Prepared statement para evitar SQL injection
    $stmt = $conn->prepare("INSERT INTO contatos (nome, email, assunto, mensagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $assunto, $mensagem);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: contatos.html?ok=1");
        exit;
    } else {
        $stmt->close();
        $conn->close();
        header("Location: contatos.html?erro=1");
        exit;
    }
} else {
    // Se acessado direto, redireciona
    header("Location: contatos.html");
    exit;
}
?>
