<?php include('admin_header.php'); ?>
<section class="classes_list">
    <h2 class="text-primary">Vehicle Class List</h2>
    <div class="table_container table-responsive">
        <?php if (!empty($classes_list)) { ?>
            <table class="table table-hover align-middle">
                <tr>
                    <th>Name</th>
                    <?= $isAdmin ? '<th></th>' : ''; ?>
                </tr>

                <?php foreach($classes_list as $class)  { ?>
                    <tr>
                        <td><?= $class['class_name'] ?></td>
                        <?php if($isAdmin) { ?>
                            <td>
                                <form action="." METHOD="POST" class="delete_form text-end">
                                    <input type="hidden" name="action" value="delete_class">
                                    <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">
                                    <button class="btn btn-sm btn-danger ">Remove</button>
                                </form>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No Vehicle Class exist yet.</p>
        <?php } ?>
    </div>

    <?php include('add_class_form.php'); ?>
    <?php include('status.php'); ?>
</section>
<?php include('admin_footer.php'); ?>