<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "programa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn ->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

echo "Conexão bem-sucedida!";
?>

<html>
    <body>

            Digite seu nome:
            <br>
            <input type="text" name="nome" id="nome"><br>
            Digite seu CPF:
            <br>
            <input type="number" name="cpf" maxlength="14" id="cpf"><br>
            Digite sua idade:
            <br>
            <input type="number" name="idade" id="idade"><br>
            <input type="submit">
        </form>
    </body>
</html>