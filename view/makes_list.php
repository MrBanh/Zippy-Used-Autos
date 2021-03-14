<?php include('admin_header.php'); ?>
<section class="makes_list">
    <h2 class="text-primary">Vehicle Make List</h2>
    <div class="table_container table-responsive">
        <?php if (!empty($makes_list)) { ?>
            <table class="table table-hover align-middle">
                <tr>
                    <th>Name</th>
                    <?= $isAdmin ? '<th></th>' : ''; ?>
                </tr>

                <?php foreach($makes_list as $make)  { ?>
                    <tr>
                        <td><?= $make['make_name'] ?></td>
                        <?php if($isAdmin) { ?>
                            <td>
                                <form action="." METHOD="POST" class="delete_form text-end">
                                    <input type="hidden" name="action" value="delete_make">
                                    <input type="hidden" name="make_id" value="<?= $make['make_id'] ?>">
                                    <button class="btn btn-sm btn-danger ">Remove</button>
                                </form>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No Vehicle Makes exist yet.</p>
        <?php } ?>
    </div>

    <?php include('add_make_form.php'); ?>
    <?php include('status.php'); ?>
</section>
<?php include('admin_footer.php'); ?>