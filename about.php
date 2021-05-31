<!-- Masthead-->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4 page-title">
                <h3 class="text-white">About us</h3>
                <hr class="divider my-4" />
            </div>

        </div>
    </div>
</header>

<section class="page-section">
    <div class="container">
        <?php echo html_entity_decode($_SESSION['setting_about_content']) ?>        

    </div>
</section>