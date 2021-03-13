<h2>Add Vehicle Make</h2>
<form action="." method="POST" class="add_form">
    <input type="hidden" name="action" value="add_make">
    <div class="form_group">
        <label for="make_name" class="form_label">Name: </label>
        <input class="form_field" type="text" name="make_name" id="make_name" maxlength="100" autocomplete="off" aria-required="true" required>
    </div>
    <div class="form_group">
        <div></div>
        <button class="submit_btn">Add Make</button>
    </div>
</form>