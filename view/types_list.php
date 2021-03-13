<?php include('admin_header.php'); ?>
<section class="types_list">
    <h2>Vehicle Type List</h2>
    <div>
        <?php if (!empty($types_list)) { ?>
            <table>
                <tr>
                    <th>Name</th>
                    <?= $isAdmin ? '<th></th>' : ''; ?>
                </tr>

                <?php foreach($types_list as $type)  { ?>
                    <tr>
                        <td><?= $type['type_name'] ?></td>
                        <?php if($isAdmin) { ?>
                            <td>
                                <form action="." METHOD="POST" class="delete_form">
                                    <input type="hidden" name="action" value="delete_type">
                                    <input type="hidden" name="type_id" value="<?= $type['type_id'] ?>">
                                    <button class="delete_btn">Remove</button>
                                </form>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No Vehicle Type exist yet.</p>
        <?php } ?>
    </div>

    <?php include('add_type_form.php'); ?>
</section>
<?php include('admin_footer.php'); ?>