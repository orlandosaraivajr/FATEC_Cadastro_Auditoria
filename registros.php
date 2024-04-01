<?php
require_once('header.php');
require_once('dados_banco.php');

    try {
        $dsn = "mysql:host=$servername;dbname=$dbname";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM veiculos";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Portaria Fatec</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h4><?php echo $_SESSION["username"]; ?><br></h4>
    </div>
    <p>
        <div class="form-group">
            <label>Todas as placas cadastradas</label><br>
            <?php
               while ($row = $stmt->fetch()) {
                ?>
                <h4>
                    <?php echo $row['placa']."<br>"; ?>
                </h4>
                <?php 
               }
            ?>
        </div>

        <a href="principal.php" class="btn btn-primary">Voltar</a><br><br>
    </p>
</body>
</html>


