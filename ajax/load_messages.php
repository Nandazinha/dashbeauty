<?php
require "../config/database.php";

$dest = $_GET['destinatario'];

$stmt = $pdo->prepare("SELECT * FROM mensagens 
WHERE (remetente_id=? AND destinatario_id=?)
OR (remetente_id=? AND destinatario_id=?)
ORDER BY enviada_em ASC");

$stmt->execute([$_SESSION['user_id'], $dest, $dest, $_SESSION['user_id']]);

while ($msg = $stmt->fetch()) {
    echo "<p><b>" . $msg['mensagem'] . "</b></p>";
}
