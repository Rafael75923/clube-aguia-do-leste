<?php
$host = "ep-jolly-tree-aev4kelo-pooler.c-2.us-east-2.aws.neon.tech";
$port = "5432";
$dbname = "clube_aguia_do_leste";
$username = "neondb_owner";
$password = "npg_njPGZ6DzJp2N";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $assunto = trim($_POST['assunto'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    if($nome && $email && $assunto && $mensagem){
        $sql = "INSERT INTO contatos (nome, email, assunto, mensagem)
                VALUES (:nome, :email, :assunto, :mensagem)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':assunto' => $assunto,
            ':mensagem' => $mensagem
        ]);
        header("Location: contatos.html?ok=1");
    } else {
        header("Location: contatos.html?erro=1");
    }

} catch (PDOException $e) {
    header("Location: contatos.html?erro=1");
}
exit;
?>

