<?php
include('dbconn.php');

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $query = "DELETE FROM personinfotbl WHERE Id=:id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(["id" => $id]);

    if ($stmt) {
        header("Location:../index.php");
    }
}
