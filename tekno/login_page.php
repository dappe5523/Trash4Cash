<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

  <title>Login Akun</title>
  <style>
    .container-fluid {
      margin-top: 50px;
    }

    .card {
      margin-top: 15px;
    }

    .text-center {
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">LOGIN TRASH4CASH</h4>
            <hr>
            <div class="form-group">
              <label for="email_user">Email User</label>
              <input type="text" class="form-control" id="email_user" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
              <label for="password_user">Password User</label>
              <input type="password" class="form-control" id="password_user" placeholder="Masukkan Password">
            </div>
            <button class="btn btn-login btn-block btn-success">LOGIN</button>
            <button class="btn btn-link btn-block" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password?</button>
          </div>
        </div>
        <div class="text-center">
          <p style="margin-top: 15px">Belum punya akun? <a href="Index.php">Silahkan Register</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Forgot Password Modal -->
  <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="searchEmail">Enter Email</label>
            <input type="text" class="form-control" id="searchEmail" placeholder="Masukkan Email">
          </div>
          <button class="btn btn-primary btn-block" id="searchEmailButton">Search Email</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Change Password Modal -->
  <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Change password for email: <strong><span id="foundEmail"></span></strong></p>
          <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control" id="newPassword" placeholder="Masukkan Password Baru">
          </div>
          <button class="btn btn-primary btn-block" id="changePasswordButton">Change Password</button>
        </div>
      </div>
    </div>
  </div>

  <script>
$(document).ready(function() {
  $(".btn-login").click(function() {
    var email_user = $("#email_user").val();
    var password_user = $("#password_user").val();
    if (email_user.length == "") {
      Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Email Wajib Diisi!'
      });
    } else if (password_user.length == "") {
      Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Password Wajib Diisi!'
      });
    } else {
      $.ajax({
        url: "AJAX/login_ajax.php",
        type: "POST",
        data: {
          "email_user": email_user,
          "password_user": password_user
        },
        success: function(response) {
          if (response == 'success') {
            // Set session and cookie here
            sessionStorage.setItem("user_email", email_user);
            document.cookie = "user_email=" + email_user + "; expires=Thu, 18 Dec 2025 12:00:00 UTC; path=/";
            // Redirect to the home page or desired page after successful login
            window.location.href = "./home.php"; // Add the './' prefix to the URL
          } else {
            Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: 'Invalid email or password!'
            });
          }
        },
        error: function() {
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Server error!'
          });
        }
      });
    }
  });

  $("#searchEmailButton").click(function() {
    var searchEmail = $("#searchEmail").val();
    if (searchEmail.length == "") {
      Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'Email Wajib Diisi!'
      });
    } else {
      $.ajax({
        url: "AJAX/search_email_ajax.php", // Change the URL to the appropriate file name for searching email
        type: "POST",
        data: {
          "email_user": searchEmail
        },
        success: function(response) {
          if (response == 'success') {
            // Show change password form
            $("#foundEmail").text(searchEmail);
            $("#changePasswordModal").modal('show');
          } else {
            // Show error message
            Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: 'Email not found!'
            });
          }
        },
        error: function() {
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Server error!'
          });
        }
      });
    }
  });

  $("#changePasswordButton").click(function() {
    var newPassword = $("#newPassword").val();
    if (newPassword.length == "") {
      Swal.fire({
        type: 'warning',
        title: 'Oops...',
        text: 'New Password Wajib Diisi!'
      });
    } else {
      var foundEmail = $("#foundEmail").text();
      $.ajax({
        url: "AJAX/update_password_ajax.php", // Change the URL to the appropriate file name for changing password
        type: "POST",
        data: {
          "email_user": foundEmail,
          "new_password": newPassword
        },
        success: function(response) {
          if (response == 'success') {
            // Show success message
            Swal.fire({
              type: 'success',
              title: 'Password Changed',
              text: 'Your password has been changed successfully.'
            });
            // Close the modal
            $("#changePasswordModal").modal('hide');
          } else {
            // Show error message
            Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: 'Failed to change password. Please try again.'
            });
          }
        },
        error: function() {
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Server error!'
          });
        }
      });
    }
  });
});
</script>
</body>
</html>
