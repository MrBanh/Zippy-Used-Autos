<h2>Add Vehicle Class</h2>
<form action="." method="POST" class="add_form">
    <input type="hidden" name="action" value="add_class">
    <div class="form_group">
        <label for="class_name" class="form_label">Name: </label>
        <input class="form_field" type="text" name="class_name" id="class_name" maxlength="100" autocomplete="off" aria-required="true" required>
    </div>
    <div class="form_group">
        <div></div>
        <button class="submit_btn">Add Class</button>
    </div>
</form>