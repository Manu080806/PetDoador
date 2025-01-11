<?php
session_start();
include_once('../config.php');

    if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['user']);
        unset($_SESSION['senha']);
        header('Location: login.php'); 
    }

    $logado = $_SESSION['user'];

    $sql = "SELECT * FROM vet ORDER BY id DESC";

    $result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistema</title>
    <link rel="stylesheet" type="text/css" href="../stypd.css"/>
</head>
<style>

</style>
<body>
<h1 class="clinicascads">Clinicas veterinárias cadastradas </h1> 
    <table class="tabVetCad">
  <thead>
    <tr>
      <th class='thVetCad' scope="col">Nome da Clínica</th>
      <th class='thVetCad' scope="col">E-mail</th>
      <th class='thVetCad' scope="col">Telefone</th>
      <th class='thVetCad' scope="col">Cidade</th>
      <th class='thVetCad' scope="col">UF</th>
    </tr>
  </thead>      <tbody>
    <?php
         while($user_data = mysqli_fetch_assoc($result))
         {
             echo"<tr>";
             echo"<td class='tdVetCad' >".$user_data['vetname']."</td>";
             echo"<td class='tdVetCad' >".$user_data['email']."</td>";
             echo"<td class='tdVetCad' >".$user_data['telefone']."</td>";
             echo"<td class='tdVetCad' >".$user_data['cidade']."</td>";
             echo"<td class='tdVetCad' >".$user_data['uf']."</td>";
             echo"</tr>";
         }    
    ?>
  </tbody>
</table>

<a class="arrowLeft" href="./pagPet.php"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"  viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
</svg>
</a>

</body>
</html>