<?php
switch ($action) {
    case 'vehicles_list':
    case 'vehicles_list_filtered': {
        $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
        $sort_by = filter_input(INPUT_GET, 'sort_by', FILTER_SANITIZE_STRING);

        if ($make_id || $type_id || $class_id || $sort_by) {
            // filters array used to implement EC (a), where it filters
            // results based on combination of make, type, and class
            $filters = [];
            if ($make_id) {
                $filters['make_id'] = $make_id;
            }

            if ($type_id) {
                $filters['type_id'] = $type_id;
            }

            if ($class_id) {
                $filters['class_id'] = $class_id;
            }

            // This is the implementation WITHOUT EC, just simple if-elseif statements
            // make { + type || + class }, then it filters only by make due to precedence
            // type { +class }, returns records by type
            // if ($make_id) {
            //     $filters['make_id'] = $make_id;
            // } elseif ($type_id) {
            //     $filters['type_id'] = $type_id;
            // } else if ($class_id) {
            //     $filters['class_id'] = $class_id;
            // }

            $vehicles_list = get_vehicles_filtered($sort_by, $filters);
        } else {
            $vehicles_list = get_vehicles();
        }

        $makes_list = get_makes();
        $types_list = get_types();
        $classes_list = get_classes();

        foreach($vehicles_list as $key => $vehicle) {
            $vehicles_list[$key]['make_name'] = get_make_name($vehicle['make_id']);
            $vehicles_list[$key]['type_name'] = get_type_name($vehicle['type_id']);
            $vehicles_list[$key]['class_name'] = get_class_name($vehicle['class_id']);
        }

        include('../view/vehicles_list.php');
        break;
    }

    case 'add_vehicle_form': {
        $makes_list = get_makes();
        $types_list = get_types();
        $classes_list = get_classes();
        include('../view/add_vehicle_form.php');
        break;
    }

    case 'add_vehicle': {
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

        if ($year && $model && $price && $make_id && $type_id && $class_id) {
            $count = add_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
            header("Location: .?added_vehicle={$count}");
        } else {
            $error_message = 'Invalid vehicle data';
            include('../view/error.php');
        }

        break;
    }

    case 'delete_vehicle': {
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

        $ids = array(
            "make_id" => $make_id,
            "type_id" => $type_id,
            "class_id" => $class_id
        );

        if ($year && $model && $price) {
            $count = delete_vehicle($year, $model, $price, $ids);
            header("Location: ./?deleted_vehicle={$count}");
        } else {
            $error_message = 'Invalid vehicle data';
            include('../view/error.php');
        }
        break;
    }
}
?>