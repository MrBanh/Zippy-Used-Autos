<?php include('header.php'); ?>
<section class="vehicles_list">

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
                </tr>

                <?php foreach($vehicles_list as $vehicle)  {
                    $year = $vehicle['year'];
                    $model = $vehicle['model'];
                    $price = $vehicle['price'];
                    // TODO: Query type name by id
                    $type_id = $vehicle['type_id'];
                    // TODO: Query class name by id
                    $class_id = $vehicle['class_id'];
                    // TODO: Query make name by id
                    $make_id = $vehicle['make_id'];
                    // TODO: Update table below to show type, class, make names
                ?>
                    <tr>
                        <td><?= $year ?></td>
                        <td><?= $make_id ?></td>
                        <td><?= $model ?></td>
                        <td><?= $type_id ?></td>
                        <td><?= $class_id ?></td>
                        <td><?= get_currency($price); ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>

        <?php } ?>
    </div>
</section>
<?php include('footer.php'); ?>
