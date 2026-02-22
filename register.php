<?php
require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $tipo = $_POST["tipo"];

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome,email,senha,tipo) VALUES (?,?,?,?)");
    $stmt->execute([$nome, $email, $senha, $tipo]);

    header("Location: login.php");
}
?>

<link rel="stylesheet" href="assets/style.css">

<div class="card" style="max-width:400px;margin:100px auto;">
    <h2>Criar Conta</h2>
    <form method="POST">
        <input name="nome" placeholder="Nome" required><br><br>
        <input name="email" type="email" placeholder="Email" required><br><br>
        <input name="senha" type="password" placeholder="Senha" required><br><br>
        <select name="tipo">
            <option value="cliente">Cliente</option>
            <option value="empresa">Empresa</option>
        </select><br><br>
        <button class="btn">Cadastrar</button>
    </form>
</div>