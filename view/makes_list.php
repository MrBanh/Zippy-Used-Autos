<?php include('admin_header.php'); ?>
<section class="makes_list">
    <h2>Vehicle Make List</h2>
    <div>
        <?php if (!empty($makes_list)) { ?>
            <table>
                <tr>
                    <th>Name</th>
                    <?= $isAdmin ? '<th></th>' : ''; ?>
                </tr>

                <?php foreach($makes_list as $make)  { ?>
                    <tr>
                        <td><?= $make['make_name'] ?></td>
                        <?php if($isAdmin) { ?>
                            <td>
                                <form action="." METHOD="POST" class="delete_form">
                                    <input type="hidden" name="action" value="delete_make">
                                    <input type="hidden" name="make_id" value="<?= $make['make_id'] ?>">
                                    <button class="delete_btn">Remove</button>
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
</section>
<?php include('admin_footer.php'); ?>