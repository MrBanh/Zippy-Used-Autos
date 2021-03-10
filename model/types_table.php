<?php

    /**
     * @return {Object[]} - An array of all type records in types table
     */
    function get_types() {
        global $db;
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
        global $db;
        $query = "SELECT * FROM types
                    WHERE type_id = :type_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        return $type['type_name'] ?? null;
    }

?>