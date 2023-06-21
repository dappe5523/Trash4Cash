<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

  <title>Register Akun</title>
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
            <h4 class="card-title text-center">REGISTER TRASH4CASH</h4>
            <hr>
            <div class="form-group">
              <label for="firstname_user">First Name</label>
              <input type="text" class="form-control" id="firstname_user" placeholder="Masukkan Nama pertama">
            </div>
            <div class="form-group">
              <label for="lastname_user">Last Name</label>
              <input type="text" class="form-control" id="lastname_user" placeholder="Masukkan Nama akhir">
            </div>
            <div class="form-group">
              <label for="alamat_user">Alamat User</label>
              <input type="text" class="form-control" id="alamat_user" placeholder="Masukkan Alamat">
            </div>
            <div class="form-group">
              <label for="email_user">Email User</label>
              <input type="text" class="form-control" id="email_user" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
              <label for="password_user">Password User</label>
              <input type="password" class="form-control" id="password_user" placeholder="Masukkan Password">
            </div>
            <div class="form-group">
              <label for="username_user">Username</label>
              <input type="text" class="form-control" id="username_user" placeholder="Masukkan Username">
            </div>
            <button class="btn btn-register btn-block btn-success">REGISTER</button>
          </div>
        </div>
        <div class="text-center">
          <p style="margin-top: 15px">Sudah punya akun? <a href="Index.php">Silahkan Login</a></p>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    $(document).ready(function() {
      $(".btn-register").click(function() {
        var email_user = $("#email_user").val();
        var password_user = $("#password_user").val();
        var username_user = $("#username_user").val();
        var firstname_user = $("#firstname_user").val();
        var lastname_user =  $("#lastname_user").val();
        var alamat_user = $("#alamat_user").val();

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
        } else if (username_user.length == "") {
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Username Wajib Diisi!'
          });
        } else if (firstname_user.length == "") {
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'First name Wajib Diisi!'
          });
        } else if (lastname_user.length == "") {
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Last name Wajib Diisi!'
          });
        } else if (alamat_user.length == "") {
          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Alamat Wajib Diisi!'
          });
        } else {
          // AJAX request here
          $.ajax({
            url: "AJAX/signUp_ajax.php",
            type: "POST",
            data: {
              "email_user": email_user,
              "password_user": password_user,
              "firstname_user": firstname_user,
              "lastname_user": lastname_user,
              "alamat_user": alamat_user,
              "username_user": username_user
            },
            success: function(response) {
              if (response == 'success') {
                Swal.fire({
                  type: 'success',
                  title: 'Register Berhasil!',
                  text: 'Silahkan login!'
                });
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Register Gagal!',
                  text: 'Silahkan coba lagi!'
                });
              }
              console.log(response);
            },
            error: function(response) {
              Swal.fire({
                type: 'error',
                title: 'Oops!',
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
