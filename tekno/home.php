<?php
session_start();
$id_user = $_SESSION['Id_user'];
$username_user = $_SESSION['username_user'];
$saldo = $_SESSION['saldo'];
$email_user=$_SESSION['email_user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycle Theme</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/js/all.js"></script>
    <style>
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .btn-custom 
        {
            background-color: #fff;
            border: 2px solid #000;
            color: #000;
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php" style="color: #fff;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile_page.php" style="color: #fff;">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout_page.php" style="color: #fff;">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <div class="card bg-white border-success text-success mb-3">
                    <div class="card-body center-content">
                        <h5 class="card-title" style="color: black">My Points</h5>
                    </div>
                    <div class="card-body center-content">
                        <p class="card-text" style="color: black;"><?php echo $saldo; ?></p>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button onclick="window.location.href='orderwithoutmap_page.php'" class="btn btn-primary btn-lg btn-block btn-custom">
                        <i class="fas fa-trash-alt"></i> SEND TRASH
                    </button>
                </div>
                <div class="text-center">
                    <button onclick="window.location.href='select_trash.php'" class="btn btn-primary btn-lg btn-block btn-custom">
                        <i class="fas fa-truck"></i> HIRE DRIVER
                    </button>
                </div>

    <!-- Add Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

