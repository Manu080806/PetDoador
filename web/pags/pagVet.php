<?php
session_start();
include_once('../config.php');

if (!isset($_SESSION['user']) || !isset($_SESSION['password'])) {
    unset($_SESSION['user']);
    unset($_SESSION['password']);
    header('Location: ../login/logVet.php'); 
}
$logado = $_SESSION['user'];

$stmt = $conexao->prepare("SELECT * FROM vet WHERE user = ?");
$stmt->bind_param("s", $logado); 
$stmt->execute();
$result = $stmt->get_result();

    //$sql = "SELECT * FROM vet WHERE user = ?";
    //$result = $conexao->query($sql);

    $user = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../stypd.css"/>
        <include('/web/layout');>
        <title>Pet Doador</title>
        <img id="patinhas" src="../fotos/patinhas.jpeg">
        <img id="logo" src="../fotos/logopd.png">
    </head>
</head>
<body id="pag" > 
    <style>
#infoGPV{
    height:33.5%;
    width: 28.5%;
    text-decoration: none;
    padding: 30px;
    margin-left:-85px;
}
#uservet{
    width: 20%;
    height:20%;
}
.trash{
    background-color: #B22F30;
    border-radius:20px;
    margin-left: 93%;
    padding: 20px;
    color: white;
    }
    </style>

<?php
        echo "<a href='../usuários/userVet.php?id=" . $user['id'] . "'>
        <img id='uservet' src='../fotos/uservet.png'></a>";
?>

    <?php   echo "<h4 class='nomeuser'>$logado</h4>"   ?>
    
    <a href="./pet.php"><img id="infoCP" src="../fotos/petsCad.png" ></a>
    <a  href="./ifgeralvet.html" ><img id="infoGPV" src="../fotos/infogeral.png" ></a>
    
    <br><br><br>

</body>
<footer id="pe">
        <button class="butsair"> <a class="sair" href="./sair.php" >sair</a></button>
    <br><br>
    
    </footer>
</html>
