<?php
require "config/database.php";
if ($_SESSION["tipo"] != "empresa") header("Location: login.php");

$stmt = $pdo->prepare("SELECT * FROM empresas WHERE usuario_id=?");
$stmt->execute([$_SESSION["user_id"]]);
$empresa = $stmt->fetch();
?>

<link rel="stylesheet" href="assets/style.css">

<div class="nav">
    Painel da Empresa |
    <a href="logout.php" style="color:white;">Sair</a>
</div>

<div class="card">
    <h2>Meus Serviços</h2>

    <form method="POST" action="salvar_servico.php">
        <input name="nome" placeholder="Nome do Serviço" required>
        <input name="descricao" placeholder="Descrição">
        <input name="preco" placeholder="Preço" required>
        <button class="btn">Adicionar</button>
    </form>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM servicos WHERE empresa_id=?");
    $stmt->execute([$empresa["id"]]);

    foreach ($stmt as $serv) {
        echo "<div class='card'>";
        echo $serv["nome"] . " - R$ " . $serv["preco"];
        echo "<br><a href='deletar_servico.php?id=" . $serv["id"] . "'>Excluir</a>";
        echo "</div>";
    }
    ?>
</div>