<h2>Add Vehicle Type</h2>
<form action="." method="POST" class="add_form">
    <input type="hidden" name="action" value="add_type">
    <div class="form_group">
        <label for="type_name" class="form_label">Name: </label>
        <input class="form_field" type="text" name="type_name" id="type_name" maxlength="100" autocomplete="off" aria-required="true" required>
    </div>
    <div class="form_group">
        <div></div>
        <button class="submit_btn">Add Type</button>
    </div>
</form>