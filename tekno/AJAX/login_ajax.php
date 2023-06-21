<?php
require_once '../include/connect.php';

$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];

// Prepare the SELECT statement
$sql = 'SELECT * FROM `user` WHERE `email_user` = ? AND `password_user` = ?';
$checksql = $pdo->prepare($sql);

// Execute the prepared statement
$checksql->execute([$email_user, $password_user]);

// Fetch the matching user record
$user = $checksql->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // Login successful
    // Set session variables
    session_start();
    $_SESSION['user'] = $user;
    $_SESSION['Id_user'] = $user['Id_user'];
    $_SESSION['username_user'] = $user['username_user'];
    $_SESSION['firstname_user'] = $user['firstname_user'];
    $_SESSION['email_user'] = $user['email_user'];
    $_SESSION['saldo'] = $user['saldo'];
    echo "success";
} else {
    // Login failed
    echo "error";
}
?>
