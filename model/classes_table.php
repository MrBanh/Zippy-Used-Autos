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

    /**
     * Add a new vehicle class to the classes table in the database
     * @param { string } $class_name - Vehicle class name
     * @return { int } $count - Row affected in database
     */
    function add_class($class_name) {
        global $db;
        $count = 0;
        $query = "INSERT INTO classes (class_name)
                    VALUES (:class_name)";
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':class_name', $class_name);
            if ($statement->execute()) {
                $count = $statement->rowCount();
            }
        } catch (PDOException $e) {
            $count = 0;
        } finally {
            $statement->closeCursor();
        }
        return $count;
    }

    /**
     * Deletes a vehicle class from the classes table in the db
     * @param { int } $class_id - Vehicle class id
     * @return { int } $count - Row affected in database
     */
    function delete_class($class_id) {
        global $db;
        $count = 0;
        $query = "DELETE FROM classes
                    WHERE class_id = :class_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }
?>