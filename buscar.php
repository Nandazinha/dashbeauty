<?php
require "config/database.php";
?>

<link rel="stylesheet" href="assets/style.css">

<div class="nav">
    Buscar Serviços |
    <a href="dashboard_cliente.php" style="color:white;">Voltar</a>
</div>

<form method="GET" style="padding:20px;">
    <input name="q" placeholder="Buscar serviço ou empresa">
    <button class="btn">Buscar</button>
</form>

<?php
if (isset($_GET["q"])) {
    $q = "%" . $_GET["q"] . "%";

    $stmt = $pdo->prepare("
    SELECT s.*, u.nome as empresa 
    FROM servicos s
    JOIN empresas e ON e.id=s.empresa_id
    JOIN usuarios u ON u.id=e.usuario_id
    WHERE s.nome LIKE ? OR u.nome LIKE ?");
    $stmt->execute([$q, $q]);

    foreach ($stmt as $res) {
        echo "<div class='card'>";
        echo "<b>" . $res["nome"] . "</b><br>";
        echo "Empresa: " . $res["empresa"] . "<br>";
        echo "R$ " . $res["preco"] . "<br>";
        echo "<a href='agendar.php?id=" . $res["id"] . "'>Agendar</a>";
        echo "</div>";
    }
}
?>