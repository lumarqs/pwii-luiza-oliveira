<?php
session_start();
include 'conexao.php';

if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['usuario_email'] = $user['email'];
        header("Location: home.php");
        exit;
    } else {
        $erro = "Email ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:Arial,sans-serif;}
        body{height:100vh;display:flex;justify-content:center;align-items:center;background:linear-gradient(135deg,#2b1055,#7b3fa1,#b27bd3);background-size:cover;}
        .login-box{width:350px;padding:30px;background:rgba(255,255,255,0.12);border-radius:15px;backdrop-filter:blur(12px);box-shadow:0 0 25px rgba(255,255,255,0.15);color:white;text-align:center;}
        .login-box h2{font-size:28px;margin-bottom:20px;}
        .input-group{margin-bottom:15px;text-align:left;}
        .input-group label{font-size:14px;}
        .input-group input{width:100%;padding:10px;border:none;border-radius:8px;background:rgba(255,255,255,0.25);color:white;outline:none;}
        .input-group input::placeholder{color:#ddd;}
        button{width:100%;padding:12px;border:none;border-radius:50px;background:white;color:#3b1d71;font-size:16px;font-weight:bold;cursor:pointer;transition:0.3s;}
        button:hover{transform:scale(1.05);background:#f5e8ff;}
        .extras{margin-top:15px;font-size:13px;}
        .extras a{color:#fff;text-decoration:none;}
        .erro{color:red;margin-top:10px;}
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    <form method="POST" action="">
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Digite seu email" required>
        </div>

        <div class="input-group">
            <label>Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required>
        </div>

        <button type="submit" name="entrar">Entrar</button>
    </form>

    <?php if(isset($erro)) { echo "<p class='erro'>$erro</p>"; } ?>

    <div class="extras">
        Não tem conta? <a href="register.php">Registrar</a>
    </div>
</div>

</body>
</html>
