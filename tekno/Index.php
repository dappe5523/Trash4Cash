<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front Page</title>
    <style>
        .container-fluid {
            padding: 10px;
            text-align: center;
        }

        #logo {
            width: 100%; /* Adjust the image size as needed */
            max-width: 300px;
            height: auto;
        }

        #login_button,
        #signin_button {
            width: 100%; /* Adjust the button width as needed */
            margin-top: 10px;
            background-color: #37b24d; /* Green background color */
            color: #fff; /* Text color */
            border: none; /* Remove border */
            border-radius: 25px; /* Rounded corners */
            padding: 12px 20px; /* Adjust padding as needed */
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="image-container">
            <img src="aset\logoAPP.png" id="logo">
            <div>
                <button onclick="window.location.href='login_page.php'" id="login_button">LOG IN</button>
            </div>
            <div>
                <button onclick="window.location.href='signin_page.php'" id="signin_button">SIGN IN</button>
            </div>
        </div>
    </div>
</body>
</html>
