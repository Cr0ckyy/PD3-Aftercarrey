<?php session_start() ?>
<div class="container-fluid">

    <form action="" id="signup-form">

        <!--name-->
        <div class="form-group">
            <label for="" class="control-label">Name</label>
            <input type="text" name="name" required="" class="form-control">
        </div>

        <!--contact-->
        <div class="form-group">
            <label for="" class="control-label">Contact</label>
            <input type="text" name="contact" required="" class="form-control">
        </div>

        <!--address-->
        <div class="form-group">
            <label for="" class="control-label">Address</label>
            <textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
        </div>

        <!--email-->
        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" name="email" required="" class="form-control">
        </div>

        <!--password-->
        <div class="form-group">
            <label for="" class="control-label">Password</label>
            <input id="password" type="password" name="password" required="" class="form-control">
            <input type="checkbox" onclick="showPassword()">Show Password
        </div>

        <button class="button btn btn-info btn-sm">Create</button>
    </form>

</div>

<style>
    #my_modal .modal-footer{
        display:none;
    }
</style>
<script>
    function showPassword() {
        var ps = document.getElementById("password");
        if (ps.type === "password") {
            ps.type = "text";
        } else {
            ps.type = "password";
        }
    }

    $('#signup-form').submit(function (form) {
        form.preventDefault();

        $('#signup-form button[type="submit"]').attr('disabled', true).html('Saving...');

        if ($(this).find('.alert-danger').length > 0) {
            $(this).find('.alert-danger').remove();
        }

        $.ajax({
            url: 'admin/ajax.php?action=signup',
            method: 'POST',
            data: $(this).serialize(),

            error: err => {
                alert("An error occured " + err);
                $('#signup-form button[type="submit"]').removeAttr('disabled').html('Create');

            },

            success: function (response) {
                if (response == 1) {
                    location.reload();
                } else {
                    $('#signup-form').prepend('<div class="alert alert-danger">This email address is already in use.</div>');
                    $('#signup-form button[type="submit"]').removeAttr('disabled').html('Create');
                }
            }
        });
    });
</script>