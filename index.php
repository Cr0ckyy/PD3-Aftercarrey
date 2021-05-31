<!DOCTYPE html>
<html lang="en">
    <?php
    // session_start — Start new or resume existing session
    session_start();

    // ob_start — Turn on output buffering
    ob_start();

    include('header.php');
    include('admin/db_connect.php');

    $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();

    foreach ($query as $key => $value) {
        if (!is_numeric($key)) {
            $_SESSION['setting_' . $key] = $value;
        }
    }
    // ob_end_flush — Flush (send) the output buffer and turn off output buffering
    ob_end_flush();
    ?>

    <style>
        header.masthead {
            background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <body id="page-top">

        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body text-white">
            </div>
        </div>

        <?php
//          <!-- Navigation-->
        include 'navbar.php';
        $page = isset($_GET['page']) ? $_GET['page'] : "home";
        include $page . '.php';
        ?>


        <!-- Bootstrap modal -->
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
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->

        <!-- Bootstrap modal -->
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
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->


        <!-- Bootstrap modal -->
        <div class="modal fade" id="my_modal_right" role='dialog'>
            <div class="modal-dialog modal-full-height  modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="fa fa-arrow-right"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->


        <?php
        include('contact.php');
        include('footer.php');
        ?>
    </body>

    <?php $conn->close() ?>

</html>
