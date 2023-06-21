<?php
require_once '../include/connect.php';

// Place the database connection code here

session_start();
$id_user = $_SESSION['Id_user'];
$sampah_plastik = $_POST['sampah_plastik'];
$sampah_kertas = $_POST['sampah_kertas'];



try {
    // Prepare and execute the SQL statement using prepared statements
    $sql = "INSERT INTO `hire_driver` (id_orderMap, id_user, sampah_plastik, sampah_kertas) VALUES (NULL, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_user, $sampah_plastik, $sampah_kertas]);

    echo "success";
} catch (PDOException $e) {
    echo "error";
    // Handle the exception as desired (e.g., log the error, display a user-friendly message)
}

$stmt->closeCursor();

?>
