<?php
session_start();
include_once('../config.php');

    if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['password']) == true))
    {
        unset($_SESSION['user']);
        unset($_SESSION['password']);
        header('Location: login.php'); 
    }

    $logado = $_SESSION['user'];

    $sql = "SELECT * FROM pet ORDER BY id DESC";

    $result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet's Cadastrados</title>
    <link rel="stylesheet" type="text/css" href="../stypd.css"/>
</head>
<style>
  .tabPetCad{
    padding: 20px;
  }
  </style>
<body>
<h1 class="petscads">Pet's cadastrados</h1>
    <table class="tabPetCad">
  <thead>
    <tr>
      <th class='thPetCad' scope="col">Nome de usuário</th>
      <th class='thPetCad' scope="col">Nome do Pet</th>
      <th class='thPetCad' scope="col">Nome do Tutor</th>
      <th class='thPetCad' scope="col">Raça do pet</th>
      <th class='thPetCad' scope="col">Peso do pet</th>
      <th class='thPetCad' scope="col">Idade do pet</th>
      <th class='thPetCad' scope="col">E-mail</th>
      <th class='thPetCad' scope="col">Telefone</th>
    </tr>
  </thead>      <tbody>
    <?php
         while($user_data = mysqli_fetch_assoc($result))
         {
             echo"<tr>";
             echo"<td class='tdPetCad' >".$user_data['user']."</td>";
             echo"<td class='tdPetCad' >".$user_data['petname']."</td>";
             echo"<td class='tdPetCad' >".$user_data['nomeDono']."</td>";
             echo"<td class='tdPetCad' >".$user_data['raca']."</td>";
             echo"<td class='tdPetCad' >".$user_data['peso']."</td>";
             echo"<td class='tdPetCad' >".$user_data['idade']."</td>";
             echo"<td class='tdPetCad' >".$user_data['email']."</td>";
             echo"<td class='tdPetCad' >".$user_data['telefone']."</td>";
         }
             
    ?>
  </tbody>
</table>
<a class="arrowLeftPV" href="./pagVet.php"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"  viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
</svg>
</a>

</body>
</html>