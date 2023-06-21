<?php
session_start();
require_once '../include/connect.php'; // Include your database connection file

$email_user = $_POST['email_user'];

// Perform the search operation (you may need to modify this part based on your database structure)
$query = "SELECT * FROM user WHERE email_user = :email_user";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':email_user', $email_user);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the email exists in the database
if ($user) {
    // Email found
    echo 'success';
} else {
    // Email not found
    echo 'error';
}
?>
