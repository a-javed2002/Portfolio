<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  form{
    width:500px;
    padding:10px;
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
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form id="registration-form" class="row g-3 needs-validation" action="_partials/_user.php" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                      <label for="Name" class="form-label">Your Name</label>
                      <input type="text" name="user_name"  title="Please enter a  name with only letters and spaces!" class="form-control" id="user-name" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>


                    <div class="col-12">
                      <label for="Email" class="form-label">Your Email</label>
                      <input type="email" name="user_email" pattern="/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/" title="Please enter a valid Email address!" class="form-control" id="user-email" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
<div class="col-12">
  <label for="password" class="form-label">Your password</label>
  <div class="input-group transparent-append">
    <input type="password" class="form-control" pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/" title="Please enter  password at least 6 characters long and contains at least 1 uppercase,1 lowercase letter,1 number!" name="user_password" id="user-password" placeholder="Choose a safe one.." required>
    <span class="input-group-text show-pass">
      <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;color: black;"></i>
    </span>
  
  </div>
  
    <p id="pass" style="color:#dc3545; font-size:.875em;"></p>
  
  
</div>

                  
                    <div class="col-12">
                      <label for="gender" class="form-label">Your gender</label><br>
                      <label for="male" class="form-label">Male</label>
                      <input type="radio" name="user_gender" id="male" value="male" required>
                      <label for="female" class="form-label">Female</label>
                      <input type="radio" name="user_gender" id="female" value="female" required>
                      <div class="invalid-feedback">Please check !</div>
                    </div>
                  
              
              
                    <div class="col-12">
                      <label for="image" class="form-label">Image</label>
                      <div class="input-group has-validation">
                        <input type="file" name="user_image" class="form-control" id="user-image" required>
                        <div class="invalid-feedback">Please Select Image</div>
                      </div>
                    </div>
           
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="btn_user_insert" id="btn-user-insert">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

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

              <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Get form and input fields
const form = document.getElementById("registration-form");
const nameInput = document.getElementById("user-name");
const emailInput = document.getElementById("user-email");
const passwordInput = document.getElementById("user-password");

// Add event listener to name field on blur
nameInput.addEventListener("blur", function (event) {
  const nameRegex = /^[A-Za-z\s]{3,}$/;
  if (nameInput.value.trim() === "") {
    nameInput.classList.add("is-invalid");
    nameInput.nextElementSibling.innerText = "Please fill this field!";
  }
 else if (!nameRegex.test(nameInput.value.trim())) {
    nameInput.classList.add("is-invalid");
    nameInput.nextElementSibling.innerText = "Please enter a valid name with only letters and spaces!";
  } else {
    nameInput.classList.remove("is-invalid");
  }

});

// Add event listener to email field on blur
emailInput.addEventListener("blur", function (event) {
  const emailRegex = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
  if (nameInput.value.trim() === "") {
    emailInput.classList.add("is-invalid");
    emailInput.nextElementSibling.innerText = "Please fill this field!";
  }
 else  if (!emailRegex.test(emailInput.value.trim())) {
  
    emailInput.classList.add("is-invalid");
    emailInput.nextElementSibling.innerText = "Please enter a valid Email address!";
  } else {
    emailInput.classList.remove("is-invalid");
  }
});

// Add event listener to password field on blur
passwordInput.addEventListener("blur", function (event) {
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/;
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
  if (!nameInput.classList.contains("is-invalid") && !emailInput.classList.contains("is-invalid") && !passwordInput.classList.contains("is-invalid")) {
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
      $(function() {
        $('#registration-form').submit(function(e) {
          e.preventDefault(); // Prevent the default form submission

          // Get form data
          var formData = new FormData(this);
          console.log("hi")
          console.log($("#user-name").val())
          console.log($("#user-email").val())
          console.log($("#user-password").val())
          console.log($("#user-image").val())
          console.log($("#user-image").val())
          // Submit form data via AJAX
          $.ajax({
            url: 'partials/_user.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
              // Handle successful form submission              
              $('#modal-main-body').css("background-color", "#bccccb");
              $('#modal-head').html(data.status);
              $('#modal-body-msg').html(data.msg);
              // console.log(data);
              // console.log(data.msg);
              // console.log(data['msg']);
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
      });
    });
  </script>

</body>

</html>