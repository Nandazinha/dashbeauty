<?php
require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user["senha"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["tipo"] = $user["tipo"];

        if ($user["tipo"] == "cliente") {
            header("Location: dashboard_cliente.php");
        } else {
            header("Location: dashboard_empresa.php");
        }
        exit;
    } else {
        $erro = "Email ou senha inválidos!";
    }
}
?>
<link rel="stylesheet" href="assets/style.css">

<div class="card" style="max-width:400px;margin:100px auto;">
    <h2>Login</h2>
    <?php if (isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
        <button class="btn">Entrar</button>
    </form>
    <br>
    <a href="register.php">Criar Conta</a>
</div>