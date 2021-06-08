<?php ?>

<div class="container-fluid">


    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <table class="table-striped table-bordered col-md-12">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Visitor Name</th>
                        <th class="text-center">Visitor Email</th>
                        <th class="text-center">Visitor Subject</th>
                        <th class="text-center">Visitor Message</th>
                        <th class="text-center">Date Sent</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'db_connect.php';
                    $messages = $conn->query("SELECT * FROM messages order by id");
                    $i = 1;
                    while ($row = $messages->fetch_assoc()):
                        ?>
                        <tr>
                            <td style="text-align:center"><?php echo $i++ ?></td>

                            <!-- Visitor Name -->
                            <td><?php echo $row['visitor_name'] ?></td>

                            <!-- Visitor Email -->
                            <td><?php echo $row['visitor_email'] ?></td>

                            <!-- Visitor Subject -->
                            <td><?php echo $row['visitor_subject'] ?></td>

                            <!-- Visitor Message -->
                            <td><?php echo $row['visitor_message'] ?></td>

                            <!-- Date Sent -->
                            <td><?php echo $row['date_created'] ?></td>

                            <!-- Action -->
                            <td>
                                <div style="text-align: center;">
                                    <button class="btn btn-danger btn-sm delete_message" type="button"
                                            data-id="<?php echo $row['id'] ?>">Delete
                                    </button>
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

    $('.delete_message').click(function () {
        _conf("Are you sure to delete this message?", "delete_message", [$(this).attr('data-id')]);
    });

    function delete_message($id) {
        start_load();

        $.ajax({
            url: 'ajax.php?action=delete_message',
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