<?php
include('db_connect.php');
if (isset($_GET['id'])) {
    $user = $conn->query("SELECT * FROM users where id =" . $_GET['id']);
    foreach ($user->fetch_array() as $key => $value) {
        $meta[$key] = $value;
    }
}
?>
<div class="container-fluid">

    <form action="" id="manage-user">
        <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">

        <!-- Name-->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>" required>
        </div>

        <!-- Username-->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control"
                   value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>" required>
        </div>

        <!-- Password-->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control"
                   value="<?php echo isset($meta['password']) ? $meta['password'] : '' ?>" required>
        </div>

        <!-- User Type-->
        <div class="form-group">
            <label for="type">User Type</label>
            <select name="type" id="type" class="custom-select">
                <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected' : '' ?>>Admin
                </option>
                <option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected' : '' ?>>Staff
                </option>
            </select>
        </div>

    </form>
</div>
<script>
    $('#manage-user').submit(function (form) {

        form.preventDefault();
        start_load();

        $.ajax({
            url: 'ajax.php?action=save_user',
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                if (response === 1) {
                    alert_toast("Data was successfully saved.", 'success');
                    setTimeout(function () {
                        location.reload();
                    }, 1500);
                }
            }
        });
    });
</script>