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

$sqlSelect = "SELECT * FROM pet WHERE user = ?";
$stmt = $conexao->prepare($sqlSelect);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {       
    $user_data = $result->fetch_assoc();

    $petname = $user_data['petname'] ?? "";
    $nomeDono = $user_data['nomeDono'] ?? "";
    $cpfD = $user_data['cpfD'] ?? "";
    $telefone = $user_data['telefone'] ?? "";
    $email = $user_data['email'] ?? "";
    $raca = $user_data['raca'] ?? "";
    $peso = $user_data['peso'] ?? "";
    $idade = $user_data['idade'] ?? "";
    $foto = $user_data['foto'] ?? "";
    $rua = $user_data['rua'] ?? "";
    $numero = $user_data['numero'] ?? "";
    $bairro = $user_data['bairro'] ?? "";
    $cidade = $user_data['cidade'] ?? "";
    $uf = $user_data['uf'] ?? "";
    $cep = $user_data['cep'] ?? "";
    $user = $user_data['user'] ?? "";
    $password = $user_data['password'] ?? "";
} else {
    header('Location: ../pags/pagPet.php');
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
    <img id="logo" src="../fotos/logopd.png">
</head>
<style>
    #savePet {
        background-color: #B22F30;
        color: #ffffff;
        border-radius: 10px;
        padding: 10px;
    }
</style>
<body>
<form action="savePet.php" method="POST" id="tabPet" enctype="multipart/form-data">
    <br><br>
    <table>
        <th id="tabpet1">
            <label class="pet" for="petname">Nome do Pet:</label><br>
            <input type="text" id="petname" name="petname" value="<?php echo htmlspecialchars($petname); ?>" required><br>

            <label class="tutor" for="nomeDono">Nome do Tutor:</label><br>
            <input type="text" id="nomeDono" name="nomeDono" value="<?php echo htmlspecialchars($nomeDono); ?>" required><br>

            <label class="cpf" for="cpfD">CPF do Tutor:</label><br>
            <input type="text" id="cpfD" name="cpfD" value="<?php echo htmlspecialchars($cpfD); ?>" required><br>

            <label class="cell" for="telefone">Telefone:</label><br>
            <input type="text" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" required><br>

            <label class="email" for="email">Email:</label><br>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>
            
            <br><br>
            <label class="rua" for="rua">Rua:</label><br>
            <input type="text" id="rua" name="rua" value="<?php echo htmlspecialchars($rua); ?>" required><br>

            <label class="num" for="numero">Número:</label><br>
            <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($numero); ?>" required><br>

            <label class="bairro" for="bairro">Bairro:</label><br>
            <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($bairro); ?>" required><br>
        </th>

        <th id="tabpet2">
            <div>   
                <label id="editfoto" for="foto"> 
                <?php
                $imagePath = "../imagens/$user/$foto";
                if (!empty($foto) && file_exists($imagePath)) {
                    echo "<img src='$imagePath' alt='Foto do Pet' width='100'><br>";
                } else {
                    echo "<img src='../imagens/icon_user.png' alt='Imagem Padrão' width='150'><br>";
                }
                ?>
                </label>
                <input type="file" accept="image/*" id="foto" name="foto"><br>
            </div>
            <label class="raca" for="raca">Raça do Pet:</label><br>
            <input type="text" id="raca" name="raca" value="<?php echo htmlspecialchars($raca); ?>" required><br>

            <label class="peso" for="peso">Peso do Pet:</label><br>
            <input type="text" id="peso" name="peso" value="<?php echo htmlspecialchars($peso); ?>" required><br>

            <label class="idade" for="idade">Idade do Pet:</label><br>
            <input type="text" id="idade" name="idade" value="<?php echo htmlspecialchars($idade); ?>" required><br>

            <label class="cidade" for="cidade">Cidade:</label><br>
            <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($cidade); ?>" required><br>

            <label class="uf" for="uf">UF:</label><br>
            <input type="text" id="uf" name="uf" value="<?php echo htmlspecialchars($uf); ?>" required><br>

            <label class="cep" for="cep">CEP:</label><br>
            <input type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($cep); ?>" required><br>
        </th>
    </table>
    <br>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" name="updatePet" value="Salvar alterações" id="savePet">
</form>

<a class="arrowLeft" href="../pags/pagPet.php"> 
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
    </svg>
</a>
<a class='trash' href="./delPet.php"> 
<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'  viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
</svg> </a>

<script src="../imagem.js"></script>
<br>
</body>
<footer id="pe">
<br><br>
<br><br>
</footer>
</html>
