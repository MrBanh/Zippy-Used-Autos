<?php
require_once('../model/database.php');
require_once('../util/util.php');

// Model - table php files
require_once('../model/vehicles_table.php');
require_once('../model/makes_table.php');
require_once('../model/types_table.php');
require_once('../model/classes_table.php');
require_once('../model/admin_db.php');

$isAdmin = true;

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'vehicles_list';
    }
}

// Controllers
require_once('./controller/vehicles.php');
require_once('./controller/makes.php');
require_once('./controller/types.php');
require_once('./controller/classes.php');
require_once('./controller/admin.php');
?>