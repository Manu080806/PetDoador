<?php      

if(isset($_POST['submit']))
        {
            include_once ('../config.php');
    
        $vetname = $_POST['vetname'];
        $nomeDono = $_POST['nomeDono'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];
        $cep = $_POST['cep'];
        $user = $_POST['user'];
        $password = $_POST['password'];
    
    $result = mysqli_query ($conexao, "INSERT INTO vet (vetname,nomeDono,cnpj,telefone,email,
    rua,numero,bairro,cidade,uf,cep,user,password)
        VALUES ('$vetname','$nomeDono','$cnpj','$telefone','$email',
        '$rua','$numero','$bairro','$cidade','$uf','$cep','$user','$password')");

            header('Location: ../pags/pagVet.php');
    }
 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../stypd.css">
    <title>Pet Doador</title>
    <img id="logo" src="../fotos/logopd.png">
</head>
<body>
    <form  action="cadVet.php" method="POST" id="cadastroVet" >
        <table>
            <p id="legcadpet" >Cadastro Clínica Veterinária</p>
            <th id="tabpet1">
                
                <label class="dono" for="nomeDono">Nome do responsável legal:</label><br>
                    <input type="text" id="nomeDono" name=" nomeDono"><br>

                <label class="vet" for="vetname">Nome da Clínica Veterinária:</label><br>
                    <input type="text" id="vetname" name="vetname"><br>

                <label class="user" for="user"> Usuário:</label><br>
                    <input type="text" id="user" name="user"><br>

                <label class="senha" for="password"> Senha:</label><br>
                    <input type="password" id="password" name="password"><br>

            </th>

            <th id="tabpet2">
            <label class="email" for="email"> Email:</label><br>
                    <input type="text" id="email" name="email"><br>

                <label class="rua" for="rua"> Rua:</label><br>
                    <input type="text" id="rua" name="rua"><br>

                <label class="bairro" for="bairro"> Bairro:</label><br>
                    <input type="text" id="bairro" name="bairro"><br>

                <label class="cidade" for="cidade"> Cidade:</label><br>
                    <input type="text" id="cidade" name="cidade"><br>
        </th>
    <br>
       <th>
                 <label class="cnpj" for="cnpj">CNPJ da Clínica:</label><br>
                    <input type="text" id="cnpj" name="cnpj"><br>

                <label class="cell" for="telefone">Telefone:</label><br>
                    <input type="text" id="telefone" name="telefone"><br>

                <label class="num" for="numero"> Número:</label>  <label class="uf" for="uf"> UF:</label><br>
                    <input type="text" id="numero" name="numero">  <input type="text" id="uf" name="uf"><br>
                    

                <label class="cep" for="cep"> CEP:</label><br>
                    <input type="text" id="cep" name="cep"><br>
        </th>         
</table>
            <input id="butcad" type="submit" name="submit" value="Salvar">
    </form>

    <a class="arrowLeft" href="./cad.html"> 
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
    </svg>  </a>
</body>
</html>