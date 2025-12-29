<?php

require_once "connect.php"; 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $sql = "DELETE FROM visites_guidees WHERE id = $id";
    if ($connect->query($sql)) {
        header("Location: ../index.php?status=deleted");
    } else {
        header("Location: ../index.php?status=error");
    }
    exit();
} else {
    header("Location: ../index.php");
    exit();
}
?>