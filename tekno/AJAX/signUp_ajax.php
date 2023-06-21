<?php
require_once '../include/connect.php';


$firstname_user = $_POST['firstname_user'];
$lastname_user = $_POST['lastname_user'];
$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];
$alamat_user = $_POST['alamat_user'];
$username_user = $_POST['username_user'];
$saldo = 0;

// Prepare the INSERT statement
$sql = 'INSERT INTO `user`(`id_user`, `email_user`, `password_user`, `firstname_user`, `lastname_user`, `alamat_user`, `username_user`,`saldo` ) VALUES (NULL, ?, ?, ?, ?, ?, ?,?)';
$checksql = $pdo->prepare($sql);

// Execute the prepared statement
if ($checksql->execute([$email_user, $password_user, $firstname_user, $lastname_user, $alamat_user, $username_user,$saldo])) {
    echo "success";
} else {
    echo "error";
}
?>