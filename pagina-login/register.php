<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexao.php';

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, cpf) 
            VALUES (:nome, :email, :senha, :telefone, :cpf)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':cpf', $cpf);

    if ($stmt->execute()) {
        $sucesso = "Cadastro feito com sucesso!";
    } else {
        $erro = "Erro ao cadastrar!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:Arial,sans-serif;}
        body{height:100vh;display:flex;justify-content:center;align-items:center;background:linear-gradient(135deg,#2b1055,#7b3fa1,#b27bd3);background-size:cover;}
        .register-box{width:380px;padding:30px;background:rgba(255,255,255,0.12);border-radius:15px;backdrop-filter:blur(12px);box-shadow:0 0 25px rgba(255,255,255,0.15);color:white;text-align:center;}
        .register-box h2{font-size:28px;margin-bottom:20px;}
        .input-group{margin-bottom:15px;text-align:left;}
        .input-group label{font-size:14px;}
        .input-group input{width:100%;padding:10px;border:none;border-radius:8px;background:rgba(255,255,255,0.25);color:white;outline:none;}
        .input-group input::placeholder{color:#ddd;}
        button{width:100%;padding:12px;border:none;border-radius:50px;background:white;color:#3b1d71;font-size:16px;font-weight:bold;cursor:pointer;transition:0.3s;}
        button:hover{transform:scale(1.05);background:#f5e8ff;}
        .extras{margin-top:15px;font-size:13px;}
        .extras a{color:#fff;text-decoration:none;}
        .mensagem{color:lime;margin-top:10px;}
        .erro{color:red;margin-top:10px;}
    </style>
</head>
<body>

<div class="register-box">
    <h2>Criar Conta</h2>
    <form action="" method="POST">
        <div class="input-group">
            <label>Nome Completo</label>
            <input type="text" name="nome" placeholder="Digite seu nome" required>
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Digite seu email" required>
        </div>

        <div class="input-group">
            <label>Senha</label>
            <input type="password" name="senha" placeholder="Crie uma senha" required>
        </div>

        <div class="input-group">
            <label>Telefone</label>
            <input type="text" name="telefone" placeholder="Digite seu telefone" required>
        </div>

        <div class="input-group">
            <label>CPF</label>
            <input type="text" name="cpf" placeholder="Digite seu CPF" required>
        </div>

        <button type="submit" name="cadastrar">Registrar</button>
    </form>

    <?php 
    if(isset($sucesso)) { echo "<p class='mensagem'>$sucesso</p>"; }
    if(isset($erro)) { echo "<p class='erro'>$erro</p>"; }
    ?>

    <div class="extras">
        Já tem conta? <a href="login.php">Entrar</a>
    </div>
</div>

</body>
</html>
