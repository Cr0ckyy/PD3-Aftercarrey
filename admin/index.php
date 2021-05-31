<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>AfterCarrey Admin System</title>


        <?php
        session_start();

        if (!isset($_SESSION['login_id'])) {
            header('location:login.php');
        }

        include('./header.php');
        ?>

    </head>
    <style>
        body{
            background: royalblue;
        }
        .modal-dialog.large {
            width: 80% !important;
            max-width: unset;
        }
        .modal-dialog.mid-large {
            width: 50% !important;
            max-width: unset;
        }
    </style>

    <body>
        <?php include 'navbar.php'; ?>





        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body text-white">
            </div>
        </div>
        <main id="view-panel" >

            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            include $page . '.php';
            ?>


        </main>

        <div id="preloader"></div>
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


        <div class="modal fade" id="confirm_modal" role='dialog'>
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <div id="delete_content"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="my_modal" role='dialog'>
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id='submit' onclick="$('#my_modal form').submit()">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </body>


    <script>
        window.start_load = function () {
            $('body').prepend('<di id="preloader2"></di>');
        };

        window.end_load = function () {
            $('#preloader2').fadeOut('fast', function () {
                $(this).remove();
            });
        };

        window.my_modal = function ($title = '', $url = '', $size = "") {
            start_load();

            $.ajax({
                url: $url,
                error: err => {

                    alert("An error occured " + err);
                },

                success: function (response) {
                    if (response) {
                        $('#my_modal .modal-title').html($title);
                        $('#my_modal .modal-body').html(response);
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

        window._conf = function ($msg = '', $func = '', $params = []) {
            $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")");
            $('#confirm_modal .modal-body').html($msg);
            $('#confirm_modal').modal('show');
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

        $(document).ready(function () {
            $('#preloader').fadeOut('fast', function () {
                $(this).remove();
            });
        });

    </script>	
</html>