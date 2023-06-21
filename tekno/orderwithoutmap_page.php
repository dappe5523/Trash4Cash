<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    $id_user = $_SESSION['Id_user'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycle Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }
        .navbar {
            background-color: #37b24d;
        }
        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #37b24d;
            margin-bottom: 30px;
        }
        .btn-trashtype {
            margin-bottom: 10px;
            width: 100%;
            border: 2px solid #37b24d;
        }
        .btn-trashtype.active {
            background-color: #37b24d;
            color: #ffffff;
            border-color: #37b24d;
        }
        .btn-trashtype:hover {
            background-color: #2f922b;
            color: #ffffff;
            border-color: #2f922b;
        }
        .btn-submit {
            width: 100%;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #37b24d;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #2f922b;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
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
                        <a class="nav-link" href="profile_page.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout_page.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <form id="recycle-form">
            <h1>Select Trash Types for Recycling</h1>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-trashtype" data-trashtype="paper">Paper</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-trashtype" data-trashtype="plastic">Plastic</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('recycle-form').addEventListener('submit', function (e) {
    e.preventDefault();

    var selectedTrash = [];
    document.querySelectorAll('.btn-trashtype.active').forEach(function (button) {
        selectedTrash.push(button.getAttribute('data-trashtype'));
    });

    console.log('Selected Trash:', selectedTrash);

    if (selectedTrash.length === 0) {
        alert('Please select at least one trash type.');
        return;
    }

    var data = new URLSearchParams();
    data.append('id_user', '<?php echo $id_user; ?>');
    data.append('sampah_plastik', selectedTrash.includes('plastic') ? 1 : 0);
    data.append('sampah_kertas', selectedTrash.includes('paper') ? 1 : 0);

    console.log('Data:', Object.fromEntries(data));
    console.log('Is plastic selected:', selectedTrash.includes('plastic'));


    fetch('AjAX/sendtrash_ajax.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: data
    })
    .then(function(response) {
        if (response.ok) {
            return response.text();
        } else {
            throw new Error('Error submitting recycling data. Please try again.');
        }
    })
    .then(function(responseText) {
        if (responseText === 'success') {
            alert('Recycling data submitted successfully.');
            window.location.href = 'home.php' // Refresh the page
        } else {
            throw new Error('Error submitting recycling data. Please try again.');
        }
    })
    .catch(function(error) {
        alert(error.message);
    });
});

document.querySelectorAll('.btn-trashtype').forEach(function (button) {
    button.addEventListener('click', function () {
        var isActive = this.classList.contains('active');
        if (!isActive) {
            this.classList.add('active');
        } else {
            this.classList.remove('active');
        }
    });
});

</script>
</body>
</html>
