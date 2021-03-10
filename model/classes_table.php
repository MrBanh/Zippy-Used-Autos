<?php
    /**
     * @return {Object[]} - An array of all class records in classes table
     */
    function get_classes() {
        global $db;
        $query = "SELECT * FROM classes ORDER BY class_id";
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    };

    /**
     *  @param $class_id - primary key for classes table
     * @return { string } - the class name that corresponds to class id
     */
    function get_class_name($class_id) {
        global $db;
        $query = "SELECT * FROM classes
                    WHERE class_id = :class_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        return $class['class_name'] ?? null;
    }

?>