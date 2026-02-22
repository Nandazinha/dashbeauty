<?php
require "config/database.php";

if (isset($_SESSION["user_id"])) {
    if ($_SESSION["tipo"] == "cliente") {
        header("Location: dashboard_cliente.php");
    } else {
        header("Location: dashboard_empresa.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>DashBeauty</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .hero {
            background: linear-gradient(135deg, #000, #6a0dad);
            color: white;
            padding: 100px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            max-width: 700px;
            margin: auto;
        }

        .section {
            padding: 60px 20px;
            text-align: center;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .card-home {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 280px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background: black;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .gold {
            color: #d4af37;
        }

        @media(max-width:768px) {
            .hero h1 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

    <!-- HERO -->
    <div class="hero">
        <h1>💎 DashBeauty</h1>
        <p>
            A plataforma inteligente para gestão e agendamento de serviços
            em salões de beleza. Mais organização, mais profissionalismo,
            mais resultados.
        </p>
        <br><br>
        <a href="login.php"><button class="btn">Entrar</button></a>
        <a href="register.php"><button class="btn">Criar Conta</button></a>
    </div>

    <!-- SOBRE -->
    <div class="section">
        <h2>Por que usar o <span class="gold">DashBeauty</span>?</h2>
        <div class="grid">

            <div class="card-home">
                <h3>📅 Agendamento Inteligente</h3>
                <p>Clientes agendam online e recebem alertas automáticos de compromissos próximos.</p>
            </div>

            <div class="card-home">
                <h3>💬 Chat em Tempo Real</h3>
                <p>Comunicação direta entre empresa e cliente dentro da própria plataforma.</p>
            </div>

            <div class="card-home">
                <h3>⭐ Sistema de Avaliação</h3>
                <p>Feedback por estrelas que aumenta a credibilidade dos serviços.</p>
            </div>

            <div class="card-home">
                <h3>📊 Gestão Completa</h3>
                <p>Empresas gerenciam serviços, agenda e dados em um só lugar.</p>
            </div>

        </div>
    </div>

    <!-- COMO FUNCIONA -->
    <div class="section" style="background:#f4f4f4;">
        <h2>Como funciona?</h2>
        <div class="grid">

            <div class="card-home">
                <h3>👤 Cliente</h3>
                <p>Busca serviços, agenda horários, avalia empresas e acompanha seus compromissos.</p>
            </div>

            <div class="card-home">
                <h3>🏢 Empresa</h3>
                <p>Cria seu perfil, cadastra serviços, organiza agenda privada e conversa com clientes.</p>
            </div>

        </div>
    </div>

    <!-- RODAPÉ -->
    <div class="footer">
        © <?php echo date("Y"); ?> DashBeauty — Sistema desenvolvido para TCC.
    </div>

</body>

</html>
