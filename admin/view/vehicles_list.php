<?php include('view/header.php'); ?>
<section class="vehicles_list">
    <?php include('view/get_vehicles_form.php'); ?>

    <div class="table_container table-responsive">
        <?php if (!empty($vehicles_list)) { ?>
            <table class="table table-hover align-middle">
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Class</th>
                    <th>Price</th>
                    <th></th>
                </tr>

                <?php foreach($vehicles_list as $vehicle)  {
                    $year = $vehicle['year'];
                    $model = $vehicle['model'];
                    $price = $vehicle['price'];
                    $make_name = $vehicle['make_name'] ?? 'n/a';
                    $type_name = $vehicle['type_name'] ?? 'n/a';
                    $class_name = $vehicle['class_name'] ?? 'n/a';
                ?>
                    <tr>
                        <td><?= $year ?></td>
                        <td><?= $make_name ?></td>
                        <td><?= $model ?></td>
                        <td><?= $type_name ?></td>
                        <td><?= $class_name ?></td>
                        <td><?= get_currency($price); ?></td>

                        <td>
                            <form action="." METHOD="POST" class="delete_form text-end">
                                <input type="hidden" name="action" value="delete_vehicle">
                                <input type="hidden" name="year" value="<?= $year ?>">
                                <input type="hidden" name="model" value="<?= $model ?>">
                                <input type="hidden" name="price" value="<?= $price ?>">
                                <input type="hidden" name="make_id" value="<?= $vehicle['make_id'] ?>">
                                <input type="hidden" name="type_id" value="<?= $vehicle['type_id'] ?>">
                                <input type="hidden" name="class_id" value="<?= $vehicle['class_id'] ?>">
                                <button class="btn btn-sm btn-danger ">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No vehicles exist yet.</p>
        <?php } ?>
    </div>
</section>
<?php include('view/footer.php'); ?>
