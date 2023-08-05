<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">



  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>
<style>
  .modal-btn {
    margin-top: 30px;
  }
</style>

<body>
  <!-- Modal -->
  <div class="modal fade" id="pop-up" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="modal-main-body">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-head">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body-msg">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Understood</button> -->
        </div>
      </div>
    </div>
  </div>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <div class="row g-3 needs-validation" id="registration-form">

                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="email">@</span>
                        <input type="email" name="user_email" class="form-control" id="user-email" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                        
                      </div>
                      
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Your password</label>
                      <div class="input-group transparent-append">
                        <input type="password" class="form-control" id="user-password" placeholder="Choose a safe one.." required>
                        <span class="input-group-text show-pass">
                          <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;color: black;"></i>
                      </div>
                      <div class="invalid-feedback">Please enter a password!</div>
                      <p id="pass" style="color:#dc3545; font-size:.875em;"></p>
                    </div>

                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="btn-remember">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                       
                      </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                          <a href="forgot_password.php">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" id="btn-login" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                    </div>
</div>

                  <?php
                  if (isset($_COOKIE["user_email"])) {
                    echo "Cookie is set";
                  } else {
                    echo "Cookie is not set";
                  }
                  ?>

                  <center style="display:none;">
                    <div class="mt-5">
                      <!-- Button trigger modal -->
                      <button type="button" id="msg-modal" class="btn btn-primary modal-btn" data-bs-toggle="modal" data-bs-target="#pop-up">
                        Launch static backdrop modal
                      </button>
                    </div>
                  </center>

                </div>
              </div>
              <div class="credits">Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// Get form and input fields
const form = document.getElementById("registration-form");

const emailInput = document.getElementById("user-email");
const passwordInput = document.getElementById("user-password");

// Add event listener to name field on blur

// Add event listener to email field on blur
emailInput.addEventListener("blur", function (event) {
  const emailRegex = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
  if (emailInput.value.trim() === "") {
    emailInput.classList.add("is-invalid");
    document.getElementById("pass2").innerHTML = "Please Fill This Field";
  } else if (!emailRegex.test(emailInput.value.trim())) {
    emailInput.classList.add("is-invalid");
    document.getElementById("user-email").nextElementSibling.innerHTML = "Please enter a valid email";

  } else {
    emailInput.classList.remove("is-invalid");
    document.getElementById("pass2").innerHTML = "";
  }
});


// Add event listener to password field on blur
passwordInput.addEventListener("blur", function (event) {
  const passwordRegex = /^[0-9]{2,}$/;
  if (passwordInput.value.trim() === "") {
    passwordInput.classList.add("is-invalid");
    document.getElementById("pass").innerHTML = "Please enter a password";
} else if (!passwordRegex.test(passwordInput.value.trim())) {
    passwordInput.classList.add("is-invalid");
    document.getElementById("pass").innerHTML = "Please enter a password that is at least 6 characters long and contains at least 1 uppercase letter, 1 lowercase letter, and 1 number";
} else {
    passwordInput.classList.remove("is-invalid");
    document.getElementById("pass").innerHTML = "";
}

});


// Add event listener to form on submit
form.addEventListener("submit", function (event) {
  event.preventDefault();

  // Check if all fields are valid
  if ( !emailInput.classList.contains("is-invalid") && !passwordInput.classList.contains("is-invalid")) {
    // Submit the form
    form.submit();
  }
});

</script>
  <script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#user-password");

    togglePassword.addEventListener("click", function() {
      // toggle the type attribute
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);

      // toggle the icon
      this.classList.toggle("bi-eye");
    });


    $('document').ready(function() {
      $('#btn-login').click(function() {
        var user_email = $('#user-email').val();
        var user_password = $('#user-password').val();
        if (document.getElementById("btn-remember").checked == true) {
          var remember = 1;
        } else {
          var remember = 0;
        }
        console.log(user_email)
        console.log(user_password)
        console.log(remember)
        $.ajax({
          url: 'partials/_login.php',
          type: "POST",
          data: {
            'user_email': user_email,
            'user_password': user_password,
            'btn_login': 1,
            'btn_remember': remember,
          },
          dataType: 'JSON',
          success: function(data) {
            if (data.status == 1) {
              $('#modal-main-body').css("background-color", "#bccccb");
              $('#modal-head').html(data);
              $('#modal-body-msg').html(data.msg);
              $('#user-email').val('');
              $('#user-password').val('');
              setTimeout(function() {
                location.replace("index.php");
              }, 1000);
            } else if (data.status == 0) {
              $('#modal-main-body').css("background-color", "#bccccb");
              $('#modal-head').html(data);
              $('#modal-body-msg').html(data.msg);
            }
          },
          error: function(xhr, textStatus, errorThrown) {
            // Handle error
            $('#modal-main-body').css("background-color", "#ffcccb");
            $('#modal-head').html("Failed");
            $('#modal-body-msg').html(xhr.responseText);
          }
        });

        document.getElementById("msg-modal").click();
      });
    })
  </script>

</body>

</html>