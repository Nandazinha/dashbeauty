<?php
require "../config/database.php";

$stmt = $pdo->prepare("INSERT INTO mensagens (remetente_id,destinatario_id,mensagem) VALUES (?,?,?)");
$stmt->execute([$_SESSION['user_id'], $_POST['destinatario'], $_POST['mensagem']]);
