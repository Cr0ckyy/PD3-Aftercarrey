<style>
    .logo {
        margin: auto;
        font-size: 20px;
        background: white;
        padding: 7px 11px;
        border-radius: 50% 50%;
        color: royalblue;
    }
</style>

<nav class="navbar navbar-light fixed-top " style="padding:0; background: royalblue!important">
    <div class="container-fluid mt-2 mb-2">
        <div class="col-lg-12">
            <div class="col-md-1 float-left" style="display: flex;">
                <div class="logo">
                    <span class="fa fa-laptop-medical"></span>
                </div>
            </div>
            <div class="col-md-4 float-left text-white">
                <large><b>AfterCarrey Admin System</b></large>
            </div>
            <div class="col-md-2 float-right text-white">

                <a href="ajax.php?action=logout" class="text-white">Log Off <i class="fa fa-power-off"></i></a><br>
                <a style=" font-weight: bold;"> <?php echo 'User: ' . $_SESSION['login_name'] ?> </a>
            </div>
        </div>
    </div>

</nav>
<nav id="sidebar" class='mx-lt-5 bg-dark'>

    <div class="sidebar-list">


        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i
                        class="fa fa-home"></i></span> Home</a>
        <a href="index.php?page=appointments" class="nav-item nav-appointments"><span class='icon-field'><i
                        class="fa fa-calendar"></i></span> Appointments</a>
        <a href="index.php?page=messages" class="nav-item nav-messages"><span class='icon-field'><i
                        class="fa fa-envelope"></i></span> Messages</a>
        <a href="index.php?page=doctors" class="nav-item nav-doctors"><span class='icon-field'><i
                        class="fa fa-user-md"></i></span> Doctors</a>
        <a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i
                        class="fa fa-book-medical"></i></span> Medical Specialties</a>


        <?php if ($_SESSION['login_type'] == 1): ?>
            <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i
                            class="fa fa-users"></i></span> Users</a>
            <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i
                            class="fa fa-cog"></i></span> Site Settings</a>
        <?php endif; ?>
    </div>
</nav>

<script>
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
</script>




