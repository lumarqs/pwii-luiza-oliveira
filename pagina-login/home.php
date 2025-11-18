<?php
session_start();
if(!isset($_SESSION['usuario_email'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <style>
        body{font-family:Arial,sans-serif;background:linear-gradient(135deg,#2b1055,#7b3fa1,#b27bd3);height:100vh;display:flex;justify-content:center;align-items:center;color:white;}
        .home-box{background:rgba(255,255,255,0.12);padding:30px;border-radius:15px;backdrop-filter:blur(12px);text-align:center;}
        button{padding:10px 20px;border:none;border-radius:50px;background:white;color:#3b1d71;font-weight:bold;cursor:pointer;}
    </style>
</head>
<body>

<div class="home-box">
    <h1>Bem-vindo(a)!</h1>
    <p>Você está logado como: <strong><?php echo $_SESSION['usuario_email']; ?></strong></p>
    <form action="logout.php" method="POST">
        <button type="submit" name="logout">Sair</button>
    </form>
</div>

</body>
</html>
