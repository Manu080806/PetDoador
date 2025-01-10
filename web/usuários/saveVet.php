<?php
session_start();
include_once('../config.php');

if (isset($_SESSION['user'])) {
    $id = $_SESSION['user']; 
} elseif (!empty($_GET['user'])) {
    $id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
}
if (!$id) {
    header('Location: ../pags/pagVet.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vetname = $conexao->real_escape_string($_POST['vetname']);
    $nomeDono  = $conexao->real_escape_string($_POST['nomeDono']);
    $cnpj  = $conexao->real_escape_string($_POST['cnpj']);
    $telefone  = $conexao->real_escape_string($_POST['telefone']);
    $email = $conexao->real_escape_string($_POST['email']);
    $rua  = $conexao->real_escape_string($_POST['rua']);
    $numero  = $conexao->real_escape_string($_POST['numero']);
    $bairro  = $conexao->real_escape_string($_POST['bairro']);
    $cidade  = $conexao->real_escape_string($_POST['cidade']);
    $uf  = $conexao->real_escape_string($_POST['uf']);
    $cep  = $conexao->real_escape_string($_POST['cep']);

    $query = ("UPDATE vet SET  vetname = '$vetname', nomeDono = '$nomeDono', cnpj = '$cnpj', 
    telefone = '$telefone', email = '$email', rua = '$rua', numero = '$numero', bairro = '$bairro', 
    cidade = '$cidade', uf = '$uf', cep = '$cep' WHERE user = '$id'");

    $conexao->query($query);

        if($conexao->error) {
    die("Erro ao atualizar: " . $conexao->error);
}
        header("Location: ../pags/pagVet.php");
    exit();
}
    
?>

