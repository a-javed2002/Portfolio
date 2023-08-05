        <!--**********************************
    Footer start
***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="###" target="_blank">Us</a> 2022</p>
            </div>
        </div>
        <!--**********************************
    Footer end
***********************************-->
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['btn_logout'])) {
                require 'partials/_connection.php';
                session_start();
                $current_user = $_SESSION['userId'];
                $sql = "DELETE from `login` where user_id_FK='$current_user'";
                $res = mysqli_query($con, $sql);

                session_unset();
                session_destroy();

                // header("location: log_in.php");
                // $data = array();
                // $data['status'] = 1;
                // $data['msg'] = '<h2>SIGN OUT!!!</h2><br><h4>PLEASE WAIT...</h4>';
                // echo json_encode($data);
                echo '<script>window.location.href="index.php"</script>';
                mysqli_close($con);
                exit();
            }
        }
        ?>

        <script>
            $('document').ready(function() {
                $('#btn-logout').click(function() {
                    $('#modal-alert-body').css("background-color", "#a5fda5");
                    $('#modal-alert-heading').html("ARE YOU SURE!!!");
                    $('#modal-alert-msg').html(`<h4>do you want to Sign out</h4>
                <div class="mb-3 row">
                    <div class="col-sm-10">
                    <form action="" method="POST">
                    <button name="btn_logout" class="btn btn-primary">Yes</button>
                    </form>
                    </div>
                </div>`);
                    document.getElementById("modal-toggle").click();
                });
            })

            // function logoutChk() {
            //     console.log("in")
            //     $(document).ready(function() {
            //         $.ajax({
            //             url: '_logout.php',
            //             type: "POST",
            //             data: {
            //                 // 'id': id,
            //                 'btn_logout': 1
            //             },
            //             success: function(data) {
            //                 if (data.status == 1) {
            //                     $('#modal-alert-body').css("background-color", "#a5fda5");
            //                     $('#modal-alert-heading').html("Successful");
            //                     $('#modal-alert-msg').html(data.msg);
            //                     location.replace("login.php");
            //                     setTimeout(function() {
            //                         location.replace("login.php");
            //                     }, 1000);
            //                 }
            //             },
            //             error: function() {
            //                 $('#modal-alert-heading').html("Failed");
            //                 $('#modal-alert-msg').html("Error In Php");
            //                 $('#modal-alert-body').css("background-color", "#fda5a5");
            //             }
            //         });
            //         document.getElementById("modal-toggle").click();
            //     });
            // }
        </script>

        <script src="public/assets/vendor/global/global.min.js"></script>
        <script src="public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

        <script src="public/assets/vendor/lightgallery/js/lightgallery-all.min.js"></script>

        <script src="public/assets/vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="public/assets/vendor/owl-carousel/owl.carousel.js"></script>

        <script src="public/assets/vendor/peity/jquery.peity.min.js"></script>
        <script src="public/assets/js/dashboard/dashboard-1.js"></script>
        <script src="public/assets/js/dz.carousel.js"></script>

        <script src="public/assets/js/custom.js"></script>
        <script src="public/assets/js/deznav-init.js"></script>
        <script src="public/assets/js/demo.js"></script>
        <script src="public/assets/js/styleSwitcher.js"></script>




        <!--**********************************
        Main wrapper end
    ***********************************-->