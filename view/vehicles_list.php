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
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="message">No vehicles exist yet.</p>
        <?php } ?>
    </div>
</section>
<?php include('view/footer.php'); ?>
