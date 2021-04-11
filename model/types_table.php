<?php

    /**
     * @return {Object[]} - An array of all type records in types table
     */
    function get_types() {
        $db = Database::getDB();
        $query = "SELECT * FROM types ORDER BY type_id";
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    };

    /**
     *  @param $type_id - primary key for types table
     * @return { string } - the type name that corresponds to type id
     */
    function get_type_name($type_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM types
                    WHERE type_id = :type_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        return $type['type_name'] ?? null;
    }

    /**
     * Add a new vehicle type to the types table in the database
     * @param { string } $type_name - Vehicle type name
     * @return { int } $count - Row affected in database
     */
    function add_type($type_name) {
        $db = Database::getDB();
        $count = 0;
        $query = "INSERT INTO types (type_name)
                    VALUES (:type_name)";
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':type_name', $type_name);
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
     * Deletes a vehicle type from the types table in the db
     * @param { int } $type_id - Vehicle type id
     * @return { int } $count - Row affected in database
     */
    function delete_type($type_id) {
        $db = Database::getDB();
        $count = 0;
        $query = "DELETE FROM types
                    WHERE type_id = :type_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }
?>