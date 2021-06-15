<?php ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-success float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New user
            </button>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <table class="table-striped table-bordered col-md-12">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'db_connect.php';
                    $users = $conn->query("SELECT * FROM users order by name asc");
                    $i = 1;
                    while ($row = $users->fetch_assoc()):
                        ?>
                        <tr>
                            <td style="text-align:center"><?php echo $i++ ?></td>

                            <!--user's actual name-->
                            <td><?php echo $row['name'] ?></td>

                            <!--user's actual name-->
                            <td><?php echo $row['username'] ?></td>

                            <!--dropdown action list-->
                            <td>
                                <div style="text-align: center;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Action</button>
                                        <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">

                                            <!-- Edit action-->
                                            <a class="dropdown-item edit_user" href="javascript:void(0)"
                                               data-id='<?php echo $row['id'] ?>'>Edit</a>

                                            <div class="dropdown-divider"></div>

                                            <!-- Delete action-->
                                            <a class="dropdown-item delete_user" href="javascript:void(0)"
                                               data-id='<?php echo $row['id'] ?>'>Delete</a>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>

    $('#new_user').click(function () {
        my_modal('New User', 'manage_user.php');
    });

    $('.edit_user').click(function () {
        my_modal('Edit User', 'manage_user.php?id=' + $(this).attr('data-id'));
    });

    $('.delete_user').click(function () {
        _conf("Are you sure to delete this user?", "delete_user", [$(this).attr('data-id')]);
    });

    function delete_user($id) {

        start_load();

        $.ajax({
            url: 'ajax.php?action=delete_user',
            method: 'POST',
            data: {id: $id},

            success: function (resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(function () {
                        location.reload();
                    }, 1500);

                }
            }
        });
    }
</script>