<?php
session_start();
require_once '../include/connect.php'; // Include your database connection file

$email_user = $_POST['email_user'];
$new_password = $_POST['new_password'];

// Perform the update operation (you may need to modify this part based on your database structure)
$query = "UPDATE user SET password_user = :new_password WHERE email_user = :email_user";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':new_password', $new_password);
$stmt->bindParam(':email_user', $email_user);
$result = $stmt->execute();

if ($result) {
    // Password updated successfully
    echo 'success';
} else {
    // Failed to update password
    echo 'error';
}
?>
