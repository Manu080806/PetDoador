<?php 
session_start();
include_once('../config.php');

if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
    unset($_SESSION['user']);
    unset($_SESSION['password']);
    header('Location: ../login/logPet.php'); 
    exit();
}
$logado = $_SESSION['user'];

$stmt = $conexao->prepare("SELECT * FROM pet WHERE user = ?");
$stmt->bind_param("s", $logado); // "s" indica que é um string
$stmt->execute();
$result = $stmt->get_result();

//$sql = "SELECT * FROM pet ORDER BY id DESC";
//$result = $conexao->query($sql);

        $user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stypd.css">
    <title>Pet Doador</title>
    <img id="logo" src="../fotos/logopd.png">
    <img id="patinhas" src="../fotos/patinhas.jpeg">
</head>
<style>
    #vetcads {
        height: 44%;
        width: 39%;
        text-decoration: none;
        padding: 10px;
        margin-left: -100px;
    }

    .trash{
        background-color: #B22F30;
        border-radius:20px;
        margin-left: 93%;
        padding: 20px;
        color: white;
    }
</style>
<body id="pagPet">    

    <?php
        echo "<a href='../usuários/userPet.php?id=" . $user['id'] . "'>
            <img id='userpet' src='../fotos/user.png'></a>";
    ?>
    <h4 class='nomeuser'><?= $logado ?></h4>
    <br><br><br><br>
    <a href="./infoPet.php"><img id="infoP" src="../fotos/infoPet.png" ></a>
    <a href="./ifgeralpet.html"><img id="infoGP" src="../fotos/infogeral.png" ></a>
    <a href="./vet.php"><img id="vetcads" src="../fotos/vetsCad.png" ></a>

    <br><br><br><br>
</body>
<footer id="pe">
    <button class="butsair"> <a class="sair" href="./sair.php">Sair</a></button>

    <br><br>
</footer>
</html>
