<?php
require_once('model/database.php');
require_once('util/util.php');

// Model - table php files
require_once('model/vehicles_table.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'vehicles_list';
    }
}

switch ($action) {
    case 'vehicles_list':
        $vehicles_list = get_vehicles();
        include('view/vehicles_list.php');
        break;

    default:

        break;
}

?>