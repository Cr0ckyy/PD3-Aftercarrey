<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- carousel  -->
            <div class="carousel-item active"
                 style="background-image: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>)">
                <div class="container">
                    <h2>Welcome to <span> <?php echo $_SESSION['setting_name']; ?></span></h2>
                    <p>We aim to provide good quality, affordable and convenient aftercare services with science, love
                        and wisdom.</p>
                    <hr class="divider my-4"/>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="index.php?page=doctors">Book an
                        appointment with our physicians</a>

                </div>
            </div>


        </div>


    </div>
</section>