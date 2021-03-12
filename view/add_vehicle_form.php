<?php include('admin_header.php'); ?>
<section class="add_vehicle_form">
    <h2>Add Vehicle</h2>
    <form action="." method="post" class="add_form">
        <input type="hidden" name="action" value="add_vehicle">

        <div class="form_container">
            <!-- Drop down for makes list -->
            <div class="form_group">
                <label for="make_id">Make:</label>
                <select name="make_id" id="make_id">
                    <?php foreach ($makes_list as $make) { ?>
                        <option value="<?= $make['make_id'] ?>"><?= $make['make_name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Drop down for types list -->
            <div class="form_group">
                <label for="type_id">Type:</label>
                <select name="type_id" id="type_id">
                    <?php foreach ($types_list as $type) { ?>
                        <option value="<?= $type['type_id'] ?>"><?= $type['type_name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Drop down for classes list -->
            <div class="form_group">
                <label for="class_id">Class:</label>
                <select name="class_id" id="class_id">
                    <?php foreach ($classes_list as $class) { ?>
                        <option value="<?= $class['class_id'] ?>"><?= $class['class_name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Vehicle Year -->
            <div class="form_group">
                <label for="year">Year:</label>
                <input type="text" name="year" id="year" minlength="4" maxlength="4" pattern="[0-9]{4}" autocomplete="off" class="form_field" aria-required="true" required>
            </div>

            <!-- Vehicle Model -->
            <div class="form_group">
                <label for="model">Model:</label>
                <input type="text" name="model" id="model" maxlength="100" autocomplete="off" class="form_field" aria-required="true" required>
            </div>

            <!-- Vehicle Price -->
            <div class="form_group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" step="0.01" min="0.00" autocomplete="off" class="form_field" aria-required="true" required>
            </div>

            <!-- Submit -->
            <div class="form_group">
                <button type="submit" class="submit_btn">Add Vehicle</button>
            </div>

        </div>      <!-- end of form_container -->
    </form>
</section>
<?php include('admin_footer.php'); ?>