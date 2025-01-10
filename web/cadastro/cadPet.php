<?php      
if (isset($_POST['salvar'])) {
    include_once ('../config.php');
    
    $petname = $_POST['petname'];
    $nomeDono = $_POST['nomeDono'];
    $cpfD = $_POST['cpfD'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $raca = $_POST['raca'];
    $peso = $_POST['peso'];
    $idade = $_POST['idade'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];
    $user = $_POST['user'];
    $password = $_POST['password'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {

            $uploadFolder = "../imagens/$user/";
            if (!file_exists($uploadFolder)) {
                mkdir($uploadFolder, 0777, true); 
            }

            $newFileName = uniqid() . '.' . $fileExtension;
            $destPath = $uploadFolder . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $foto = $newFileName; 
            } else {
                echo "Erro ao mover o arquivo para o diretório de upload.";
                exit();
            }
        } else {
            echo "Formato de arquivo não suportado.";
            exit();
        }
    } else {
        $foto = null; 
    }
    $result = mysqli_query($conexao, "INSERT INTO pet 
        (petname, nomeDono, cpfD, telefone, email, raca, peso, idade, foto, rua, numero, bairro, cidade, uf, cep, user, password) 
        VALUES ('$petname','$nomeDono','$cpfD','$telefone','$email','$raca','$peso','$idade','$foto','$rua','$numero','$bairro','$cidade','$uf','$cep','$user','$password')");

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
    <img id="logo" src="../fotos/logopd.png">
    <title>Pet Doador</title>
</head>
<style>
    .picture__img{
        max-width: 70%;
    }
    #cadastroPet{
    margin-top: 110px;
   }
</style>

<body>  
    <form action="cadPet.php" method="POST" id="cadastroPet" enctype="multipart/form-data">
        <table>
            <p id="legcadpet">Cadastro Pet Doador</p>
            <th id="tabpet1">
                <label class="pet" for="petname">Nome do Pet:</label><br>
                <input type="text" id="petname" name="petname"><br>
                
                <label class="raca" for="raca">Raça do Pet:</label><br>
                <input type="text" id="raca" name="raca"><br>
               
                <label class="tutor" for="nomeDono">Nome do Tutor:</label><br>
                <input type="text" id="nomeDono" name="nomeDono"><br>
                
                <label class="user" for="user">Usuário:</label><br>
                <input type="text" id="user" name="user"><br>
                
                <label class="senha" for="password">Senha:</label><br>
                <input type="password" id="password" name="password"><br>
            </th>

            <th id="tabpet2">
                <label class="cpf" for="cpfD">CPF do Tutor:</label><br>
                <input type="text" id="cpfD" name="cpfD"><br>

                <label class="cell" for="telefone">Telefone:</label><br>
                <input type="text" id="telefone" name="telefone"><br>

                <label class="peso" for="peso">Peso do Pet:</label>
                <label class="idade" for="idade">Idade do Pet:</label><br>
                <input type="text" id="peso" name="peso">
                <input type="text" id="idade" name="idade"><br>

                <label class="cep" for="cep">CEP:</label><br>
                <input type="text" id="cep" name="cep"><br>
                
                <label class="num" for="numero">Número:</label>
                <label class="uf" for="uf">UF:</label><br>
                <input type="text" id="numero" name="numero">
                <input type="text" id="uf" name="uf"><br>
            </th>        

            <th id="tabpet3">
                <div class="cadfoto">
                    <label class="foto" for="foto">
                        <span class="picture__image">Foto do pet</span>
                    </label>
                    <input type="file" accept="image/*" id="foto" name="foto"><br>      
                </div> 

                <br> <br> <br> <br>

                <label class="email" for="email">Email:</label><br>
                <input type="text" id="email" name="email"><br> 

                <label class="rua" for="rua">Rua:</label><br>
                <input type="text" id="rua" name="rua"><br>
                
                <label class="bairro" for="bairro">Bairro:</label><br>
                <input type="text" id="bairro" name="bairro"><br>

                <label class="cidade" for="cidade">Cidade:</label><br>
                <input type="text" id="cidade" name="cidade"><br>
            </th>
        </table>

        <input id="butcad" type="submit" name="salvar" value="Salvar">
    </form>
            <script src="../imagem.js"></script>
        
        <a class="arrowLeft" href="./cad.html"> 
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
    </svg>  </a>
</body>
</html>
