<?php
require_once '../include/connect.php';
session_start();
$id_user = $_SESSION['Id_user'];
$sampah_plastik = $_POST['sampah_plastik'];
$sampah_kertas = $_POST['sampah_kertas'];


// Prepare and execute the SQL statement
$sql = "INSERT INTO `order` (id_order, id_user, sampah_plastik, sampah_kertas) VALUES (NULL, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$id_user, $sampah_plastik, $sampah_kertas]);
    echo "success";
} catch (PDOException $e) {
    echo "error";
}

$stmt->closeCursor();
?>
