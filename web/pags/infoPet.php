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

?>
<style>
  .tabInfoPet2{
    margin-left: 30px;
  }
</style>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stypd.css"/>
    <title>Informações do Pet</title>
    
</head>
<body>
<h1 class="infodopet">Informações do Pet</h1>
    
  <?php
     echo"<table class='tabInfoPet'>";
     $user_data = mysqli_fetch_assoc($result);

      echo"<td>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Nome de usuário</th>";
        echo"<td class='tdInfoPet' >".$user_data['user']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Nome do Pet</th>";
      echo"<td class='tdInfoPet' >".$user_data['petname']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Nome do Tutor</th>";
      echo"<td class='tdInfoPet' >".$user_data['nomeDono']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>CPF do tutor</th>";
      echo"<td class='tdInfoPet' >".$user_data['cpfD']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Raça do pet</th>";
      echo"<td class='tdInfoPet' >".$user_data['raca']."</td>";
    echo"</tr>";  
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Peso do pet</th>";
      echo"<td class='tdInfoPet' >".$user_data['peso']."</td>";
    echo"</tr>";  
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Idade do pet</th>";
      echo"<td class='tdInfoPet' >".$user_data['idade']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>E-mail</th>";
      echo"<td class='tdInfoPet' >".$user_data['email']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Telefone</th>";
      echo"<td class='tdInfoPet' >".$user_data['telefone']."</td>";
    echo"</tr>";
        echo"</td>";
  echo"</table>";

    echo"<table class='tabInfoPet2'>";
     
        echo"<td>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Rua</th>";
      echo"<td class='tdInfoPet' >".$user_data['rua']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Número</th>";
      echo"<td class='tdInfoPet' >".$user_data['numero']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Bairro</th>";
      echo"<td class='tdInfoPet' >".$user_data['bairro']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Cidade</th>";
      echo"<td class='tdInfoPet' >".$user_data['cidade']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>UF</th>";
      echo"<td class='tdInfoPet' >".$user_data['uf']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th class='thInfoPet' scope='col'>Cep</th>";
      echo"<td class='tdInfoPet' >".$user_data['cep']."</td>";
    echo"</tr>";
        echo"</td>";
  
   echo"</table>";
  ?>

<a class="arrowLeft" href="./pagPet.php"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"  viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
</svg>
</a>
  
</body>
</html>