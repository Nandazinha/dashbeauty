<?php
require "config/database.php";
if ($_SESSION["tipo"] != "cliente") header("Location: login.php");
?>

<link rel="stylesheet" href="assets/style.css">
<script src="assets/script.js"></script>

<div class="nav">
    Bem-vindo Cliente |
    <a href="buscar.php" style="color:white;">Buscar Serviços</a> |
    <a href="logout.php" style="color:white;">Sair</a>
</div>

<h2 style="padding:20px;">Meus Agendamentos</h2>

<?php
$stmt = $pdo->prepare("
SELECT ag.*, s.nome 
FROM agendamentos ag
JOIN servicos s ON s.id = ag.servico_id
WHERE ag.cliente_id = ?");
$stmt->execute([$_SESSION["user_id"]]);

foreach ($stmt as $ag) {
    echo "<div class='card'>";
    echo "<b>" . $ag["nome"] . "</b><br>";
    echo "Data: " . $ag["data"] . "<br>";
    echo "Status: " . $ag["status"] . "<br>";
    echo "</div>";
}
?>

<!-- Modal moderno -->
<div class="modal" id="modalAviso">
    <div class="modal-content">
        <h3>✨ Compromisso próximo!</h3>
        <p id="textoCompromisso"></p>
        <button class="btn" onclick="fecharModal()">Fechar</button>
    </div>
</div>

<script>
    verificarCompromisso();
</script>