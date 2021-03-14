<?php include('admin_header.php'); ?>
<section class="classes_list">
    <h2>Vehicle Class List</h2>
    <div>
        <?php if (!empty($classes_list)) { ?>
            <table>
                <tr>
                    <th>Name</th>
                    <?= $isAdmin ? '<th></th>' : ''; ?>
                </tr>

                <?php foreach($classes_list as $class)  { ?>
                    <tr>
                        <td><?= $class['class_name'] ?></td>
                        <?php if($isAdmin) { ?>
                            <td>
                                <form action="." METHOD="POST" class="delete_form">
                                    <input type="hidden" name="action" value="delete_class">
                                    <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">
                                    <button class="delete_btn">Remove</button>
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