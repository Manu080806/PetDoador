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
    exit();     }

$sqlSelect = "SELECT * FROM pet WHERE user = ?";
$stmt = $conexao->prepare($sqlSelect);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "
        <script>
            if (confirm('Deseja excluir este usuário?')) {
                window.location.href = 'delPet.php?confirm=1&user=$id';
            } else {
                window.location.href = '../pags/pagPet.php';
            }
        </script>
    ";
    
    if (isset($_GET['confirm']) && $_GET['confirm'] == 1) {
        $sqlDelete = "DELETE FROM pet WHERE user = ?";
        $stmtDelete = $conexao->prepare($sqlDelete);
        $stmtDelete->bind_param("s", $id);

        if ($stmtDelete->execute()) {
            session_destroy();
            header('Location: ../index.html');
            exit();
        } else {
            header('Location: ../pags/pagPet.php');
            exit();
        }
    }
}
?>

