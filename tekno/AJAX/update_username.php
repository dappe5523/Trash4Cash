<?php
session_start();
require_once '../include/connect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new username from the POST request
    $newUsername = $_POST['newUsername'];

    try {
        // Update the username in the database
        $id_user = $_SESSION['Id_user'];
        $sql = "UPDATE user SET username_user = :newUsername WHERE Id_user = :id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':newUsername', $newUsername);
        $stmt->bindValue(':id_user', $id_user);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            // Update the username in the session
            $_SESSION['username_user'] = $newUsername;

            // Echo the updated username as a response
            echo $newUsername;
            exit();
        } else {
            // Handle the case when no rows were affected (username not updated)
            echo "Failed to update username.";
            exit();
        }
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>
