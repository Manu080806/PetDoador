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
$sqlSelect = "SELECT * FROM vet WHERE user = ?";
$stmt = $conexao->prepare($sqlSelect);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();

    $vetname = $user_data['vetname'] ?? "";
    $nomeDono = $user_data['nomeDono'] ?? "";
    $cnpj = $user_data['cnpj'] ?? "";
    $telefone = $user_data['telefone'] ?? "";
    $email = $user_data['email'] ?? "";
    $rua = $user_data['rua'] ?? "";
    $numero = $user_data['numero'] ?? "";
    $bairro = $user_data['bairro'] ?? "";
    $cidade = $user_data['cidade'] ?? "";
    $uf = $user_data['uf'] ?? "";
    $cep = $user_data['cep'] ?? "";
} else {
    header('Location: ../pags/pagVet.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stypd.css"/>
    <title>Pet Doador</title>
    <img id="patinhas" src="../fotos/patinhas.jpeg">
    <img id="logo" src="../fotos/logopd.png">
</head>
<style>
    .picture__img{
        max-width: 70%;
    }
    .lablenum{
        margin: 20px;
    }
    .lableuf{
        margin: 20px;
    }
    #numero{
        margin-left: 20px;
    }
    #uf{
        margin-right:20px;
    }
</style>
<body>
    <form id="tabVet" action="saveVet.php" method="POST" enctype="multipart/form-data">
        <table>
            <th id="tabpet1">
                <label for="vetname">Nome da Clínica Veterinária:</label><br>
                <input type="text" id="vetname" name="vetname" value="<?php echo htmlspecialchars($vetname); ?>" required><br>

                <label for="nomeDono">Nome do responsável legal:</label><br>
                <input type="text" id="nomeDono" name="nomeDono" value="<?php echo htmlspecialchars($nomeDono); ?>" required><br>

                <label for="cnpj">CNPJ da Clínica:</label><br>
                <input type="text" id="cnpj" name="cnpj" value="<?php echo htmlspecialchars($cnpj); ?>" required><br>

                <label for="telefone">Telefone:</label><br>
                <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" required><br>

                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>

            </th>

            <th id="tabpet2">
                <label for="rua">Rua:</label><br>
                <input type="text" id="rua" name="rua" value="<?php echo htmlspecialchars($rua); ?>" required><br>

                <label for="bairro">Bairro:</label><br>
                <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($bairro); ?>" required><br>

                <label for="cidade">Cidade:</label><br>
                <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($cidade); ?>" required><br>

                <label class="lableuf" for="uf">UF:</label>  <label class="lablenum" for="numero">Número:</label><br>
                <input type="text" id="uf" name="uf" value="<?php echo htmlspecialchars($uf); ?>" required>

                <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($numero); ?>" required><br>

                <label for="cep">CEP:</label><br>
                <input type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($cep); ?>" required><br>
            </th>
        </table>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <input id="editpet" type="submit" value="Salvar alterações">
    </form>
    <a class="arrowLeft" href="../pags/pagVet.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
        </svg>
    </a>

    <a class='trash' href="./delVet.php">
<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'  viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
</svg> </a>

</body>
<footer id="pe">
    <br><br>
</footer>
</html>