<?php $isAdmin ? include('admin_header.php') : include('header.php'); ?>
<section class="vehicles_list">
    <?php include('get_vehicles_form.php'); ?>

    <div class="list_container">
        <?php if (!empty($vehicles_list)) { ?>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Class</th>
                    <th>Price</th>
                    <?= $isAdmin ? '<th></th>' : ''; ?>
                </tr>

                <?php foreach($vehicles_list as $vehicle)  {
                    $year = $vehicle['year'];
                    $model = $vehicle['model'];
                    $price = $vehicle['price'];
                    $make_name = $vehicle['make_name'];
                    $type_name = $vehicle['type_name'];
                    $class_name = $vehicle['class_name'];
                ?>
                    <tr>
                        <td><?= $year ?></td>
                        <td><?= $make_name ?></td>
                        <td><?= $model ?></td>
                        <td><?= $type_name ?></td>
                        <td><?= $class_name ?></td>
                        <td><?= get_currency($price); ?></td>

                        <?php if($isAdmin) { ?>
                            <td>
                                <form action="." METHOD="POST" class="delete_form">
                                    <input type="hidden" name="action" value="delete_vehicle">
                                    <input type="hidden" name="make_id" value="<?= $vehicle['make_id'] ?>">
                                    <input type="hidden" name="type_id" value="<?= $vehicle['type_id'] ?>">
                                    <input type="hidden" name="class_id" value="<?= $vehicle['class_id'] ?>">
                                    <button class="delete_btn">Remove</button>
                                </form>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No vehicles exist yet.</p>
        <?php } ?>
    </div>
</section>
<?php $isAdmin ? include('admin_footer.php') : include('footer.php'); ?>
