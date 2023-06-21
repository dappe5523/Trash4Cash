<?php
require_once '../include/connect.php';

session_start();
$id_user = $_SESSION['Id_user'];
$asal_pengiriman = $_POST['asal_pengiriman'];
$lokasi_bankSampah = $_POST['lokasi_bankSampah'];

try {
    // Prepare and execute the SQL statement using prepared statements
    $sql = "UPDATE `hire_driver` SET asal_pengiriman = ?, lokasi_bankSampah = ? WHERE id_user = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$asal_pengiriman, $lokasi_bankSampah, $id_user]);

    echo "success";
} catch (PDOException $e) {
    echo "error";
    // Handle the exception as desired (e.g., log the error, display a user-friendly message)
}

$stmt->closeCursor();
?>
