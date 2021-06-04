<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Medicio - v4.0.0
    * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span><?php echo $_SESSION['setting_name'] ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://lishufang1121.wixsite.com/blog">LI SHUFANG</a>
        </div>
    </div>
</footer>
<!-- End Footer -->

<style>
    .modal-dialog.large {
        width: 70% !important;
        max-width: unset;
    }

    .modal-dialog.mid-large {
        width: 70% !important;
        max-width: unset;
    }
</style>
<script>

    $('.datepicker').datepicker({
        format: "yyyy-mm-dd"
    });

    window.start_load = function () {
        $('body').prepend('<di id="preloader2"></di>');
    };

    window.end_load = function () {
        $('#preloader2').fadeOut('fast', function () {
            $(this).remove();
        });
    };

    window.my_modal = function ($title = '', $url = '', $size = '') {
        start_load();

        $.ajax({
            url: $url,
            error: err => {
                alert("An error occured " + err);
            },

            success: function (resp) {
                if (resp) {
                    $('#my_modal .modal-title').html($title);
                    $('#my_modal .modal-body').html(resp);
                    if ($size != '') {
                        $('#my_modal .modal-dialog').addClass($size);
                    } else {
                        $('#my_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md");
                    }
                    $('#my_modal').modal('show');
                    end_load();
                }
            }
        });
    };

    window.my_modal_right = function ($title = '', $url = '') {

        start_load();

        $.ajax({
            url: $url,
            error: err => {
                alert("An error occured " + err);
            },
            success: function (response) {
                if (response) {
                    $('#my_modal_right .modal-title').html($title);
                    $('#my_modal_right .modal-body').html(response);

                    $('#my_modal_right').modal('show');
                    end_load();
                }
            }
        });
    };
    window.alert_toast = function ($msg = 'TEST', $bg = 'success') {
        $('#alert_toast').removeClass('bg-success');
        $('#alert_toast').removeClass('bg-danger');
        $('#alert_toast').removeClass('bg-info');
        $('#alert_toast').removeClass('bg-warning');

        if ($bg == 'success') {
            $('#alert_toast').addClass('bg-success');
        }

        if ($bg == 'danger') {
            $('#alert_toast').addClass('bg-danger');
        }

        if ($bg == 'info') {
            $('#alert_toast').addClass('bg-info');
        }

        if ($bg == 'warning') {
            $('#alert_toast').addClass('bg-warning');
        }

        $('#alert_toast .toast-body').html($msg);
        $('#alert_toast').toast({delay: 3000}).toast('show');
    };


    window.load_cart = function () {
        $.ajax({
            url: 'admin/ajax.php?action=get_cart_count',
            success: function (response) {
                if (response > -1) {
                    response = response > 0 ? response : 0;
                    $('.item_count').html(response);
                }
            }
        });
    };

    // pop up login modal
    $('#login_now').click(function () {
        my_modal("Login Modal", 'login.php');
    });

    $(document).ready(function () {
        load_cart();
    });

</script>
<!-- Bootstrap core JS-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>