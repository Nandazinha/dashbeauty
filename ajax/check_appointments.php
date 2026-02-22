<?php
require "../config/database.php";

$stmt = $pdo->prepare("SELECT * FROM agendamentos 
WHERE cliente_id=? 
AND data BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 1 HOUR)");

$stmt->execute([$_SESSION['user_id']]);

if ($stmt->rowCount() > 0) {
    echo json_encode([
        "tem" => true,
        "mensagem" => "Você tem um compromisso nas próximas 1 hora!"
    ]);
} else {
    echo json_encode(["tem" => false]);
}
