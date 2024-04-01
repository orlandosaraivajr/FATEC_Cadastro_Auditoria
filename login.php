<?php
session_start();
require_once('dados_banco.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['nome'];
    $senha = $_POST['senha'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT nome, senha FROM user WHERE nome= '$login' AND senha='$senha'";
    $result = mysqli_query($conn, $sql);
    print($sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['online'] = true;
        $_SESSION['username'] = $row["nome"];
        header("Location: principal.php");
        exit();
    } else {
        header("location: index.php");
        exit();
    }
}

 
header("location: index.php");
exit;
?>