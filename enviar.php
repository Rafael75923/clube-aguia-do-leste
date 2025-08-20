<?php
$host = "127.0.0.1";
$dbname = "aguiadoleste";
$username = "root";
$password = ""; // normalmente vazio no XAMPP

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $assunto = trim($_POST['assunto'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    if($nome && $email && $mensagem){
        $sql = "INSERT INTO contatos (nome, email, mensagem, data_envio)
                VALUES (:nome, :email, :mensagem, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
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
