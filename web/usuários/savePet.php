<?php
session_start();
include_once('../config.php');

if (isset($_SESSION['user'])) {
    $id = $_SESSION['user']; 
} elseif (!empty($_GET['user'])) {
    $id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
}
if (!$id) {
    header('Location: ../pags/pagPet.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $petname = $conexao->real_escape_string($_POST['petname']);
    $nomeDono  = $conexao->real_escape_string($_POST['nomeDono']);
    $cpfD  = $conexao->real_escape_string($_POST['cpfD']);
    $telefone  = $conexao->real_escape_string($_POST['telefone']);
    $email = $conexao->real_escape_string($_POST['email']);
    $raca = $conexao->real_escape_string($_POST['raca']);
    $peso = $conexao->real_escape_string($_POST['peso']);
    $idade = $conexao->real_escape_string($_POST['idade']);
    $rua  = $conexao->real_escape_string($_POST['rua']);
    $numero  = $conexao->real_escape_string($_POST['numero']);
    $bairro  = $conexao->real_escape_string($_POST['bairro']);
    $cidade  = $conexao->real_escape_string($_POST['cidade']);
    $uf  = $conexao->real_escape_string($_POST['uf']);
    $cep  = $conexao->real_escape_string($_POST['cep']);
    

    $query = ("UPDATE pet SET  petname = '$petname', nomeDono = '$nomeDono', cpfD = '$cpfD', 
    telefone = '$telefone', email = '$email', raca = '$raca', peso = '$peso', idade = '$idade',
    rua = '$rua', numero = '$numero', bairro = '$bairro', cidade = '$cidade', uf = '$uf', cep = '$cep' 
    WHERE user = '$id'");

    $conexao->query($query);

        if($conexao->error) {
    die("Erro ao atualizar: " . $conexao->error);
}
        header("Location: ../pags/pagPet.php");
    exit();
}
?>
