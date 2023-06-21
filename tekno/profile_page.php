<?php
session_start();
// Retrieve the session variables
$username_user = $_SESSION['username_user'];
$email_user = $_SESSION['email_user'];
$firstname_user = $_SESSION['firstname_user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            margin-bottom: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: green;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TRASH4CASH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile_page.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout_page.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Profile</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Username:</strong> <?php echo $username_user; ?></p>
                <p><strong>Email:</strong> <?php echo $email_user; ?></p>
                <p><strong>Name:</strong> <?php echo $firstname_user; ?></p>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateUsernameModal">Update Username</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Update Username Modal -->
    <div class="modal fade" id="updateUsernameModal" tabindex="-1" aria-labelledby="updateUsernameModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUsernameModalLabel">Update Username</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">New Username:</label>
                        <input type="text" class="form-control" id="newUsername" name="newUsername">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary text-center" id="updateUsernameBtn">Update</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Update username AJAX request
            $('#updateUsernameBtn').click(function() {
                var newUsername = $('#newUsername').val();

                // Make an AJAX request to update the username
                $.ajax({
                    url: 'AJAX/update_username.php', // Provide the path to the separate PHP file
                    type: 'POST',
                    data: { newUsername: newUsername },
                    success: function(response) {
                        // Update the username in the profile page
                        $('p#username').text(response);
                        alert('Username updated successfully.');
                        $('#updateUsernameModal').modal('hide');
                    },
                    error: function() {
                        alert('An error occurred while processing the request.');
                    }
                });
            });
        });
    </script>
</body>
</html>
