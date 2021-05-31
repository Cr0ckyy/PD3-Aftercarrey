<?php include 'admin/db_connect.php'; ?>



<!-- ======= Hero Section ======= -->
<?php include 'hero.php'; ?>
<!-- End Hero -->


<script>

    $('.view_prod').click(function () {
        my_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'));
    });
</script>

