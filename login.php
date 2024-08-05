<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Conectar ao banco de dados
    $host = "localhost";
    $bdusername = "root";
    $bdpassword = "";
    $bdname = "info_3c";

    $conn = new mysqli($host, $bdusername, $bdpassword, $bdname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validar
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Hash a senha para comparação segura
    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login correto
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: lider.php");
        exit();
    } else {
        // Login incorreto
        header("Location: index.html?error=true");
        exit();
    }

    $conn->close();
}
?>
