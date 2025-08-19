<?php
// Configurações do Neon (substitua com as suas credenciais reais)
$host = "ep-xxxxxx.us-east-2.aws.neon.tech"; // host do Neon
$port = "5432"; 
$dbname = "clube_aguia_do_leste";
$username = "usuario"; // seu usuário do Neon
$password = "senha";   // sua senha do Neon

try {
    // Conectar ao banco Neon PostgreSQL (sempre com SSL)
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Receber dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Inserir no banco (prepared statement)
    $sql = "INSERT INTO contatos (nome, email, assunto, mensagem) 
            VALUES (:nome, :email, :assunto, :mensagem)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':assunto' => $assunto,
        ':mensagem' => $mensagem
    ]);

    echo "✅ Mensagem enviada com sucesso!";
} catch (PDOException $e) {
    echo "❌ Erro: " . $e->getMessage();
}
?>
