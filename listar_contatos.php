<?php
$host = "ep-xxxxxx.us-east-2.aws.neon.tech"; 
$port = "5432"; 
$dbname = "clube_aguia_do_leste";
$username = "usuario"; 
$password = "senha"; 

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM contatos ORDER BY data_envio DESC";
    $stmt = $conn->query($sql);

    echo "<h2>📩 Mensagens Recebidas</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Assunto</th><th>Mensagem</th><th>Data</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['assunto']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mensagem']) . "</td>";
        echo "<td>" . $row['data_envio'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
