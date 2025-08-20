<?php
// Configurações do banco
$servidor = "localhost";
$usuario = "root"; // padrão do XAMPP
$senha = "";
$banco = "aguiadoleste";

// Conectar ao MySQL
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Inserir no banco
$sql = "INSERT INTO contatos (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";
if ($conn->query($sql) === TRUE) {
    echo "Mensagem enviada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
