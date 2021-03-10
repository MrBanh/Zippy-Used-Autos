<?php include('header.php'); ?>
<section class="vehicles_list">

    <form action="." method="GET" class="filter_vehicles_list">
        <input type="hidden" name="action" value="vehicles_list">

        <div class="form_group">
            <label for="make_id" aria-label="Filter by Make"></label>
            <select name="make_id" id="make_id">
                <option value="" <?= (!$make_id ? 'selected' : '') ?>>View All Makes</option>
                <?php foreach ($makes_list as $make) { ?>
                    <option
                    value="<?= $make['make_id'] ?>"
                    <?= (isset($make_id) && $make_id == $make['make_id'] ? 'selected' : '') ?>
                    ><?= $make['make_name'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form_group">
            <label for="type_id" aria-label="Filter by Type"></label>
            <select name="type_id" id="type_id">
                <option value="" <?= (!$type_id ? 'selected' : '') ?>>View All Types</option>
                <?php foreach ($types_list as $type) { ?>
                    <option
                    value="<?= $type['type_id'] ?>"
                    <?= (isset($type_id) && $type_id == $type['type_id'] ? 'selected' : '') ?>
                    ><?= $type['type_name'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form_group">
            <label for="class_id" aria-label="Filter by Class"></label>
            <select name="class_id" id="class_id">
                <option value="" <?= (!$class_id ? 'selected' : '') ?>>View All Classes</option>
                <?php foreach ($classes_list as $class) { ?>
                    <option
                    value="<?= $class['class_id'] ?>"
                    <?= (isset($class_id) && $class_id == $class['class_id'] ? 'selected' : '') ?>
                    ><?= $class['class_name'] ?></option>
                <?php } ?>
            </select>
        </div>


        <span class="sort_by">Sort by: </span>
        <input type="radio" name="sort_by" id="sort_by_price" value="price" checked>
        <label for="sort_by_price">Price</label>
        <input type="radio" name="sort_by" id="sort_by_year" value="year" <?= $sort_by == 'year' ? 'checked' : '' ?>>
        <label for="sort_by_year">Year</label>
        <button type="submit" class="submit_btn">Submit</button>
    </form>

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
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>

        <?php } ?>
    </div>
</section>
<?php include('footer.php'); ?>
