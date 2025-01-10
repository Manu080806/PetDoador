<?php
    session_start();
    include_once('../config.php');

    if (isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['password'])) 
    {
        $user = $_POST['user'];
        $password = $_POST['password'];

    $sql = "SELECT * FROM pet WHERE user = ? AND password = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $user, $password); 
    $stmt->execute();
    $result = $stmt->get_result();

        if(mysqli_num_rows($result) < 1 )
           {  
            unset($_SESSION['user']);
            unset($_SESSION['password']);
            header('Location: logPet.php'); 
         }else      {  
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            header('Location: ../pags/pagPet.php');  
        }  }
    else{
        header('Location: logPet.php'); }
?>