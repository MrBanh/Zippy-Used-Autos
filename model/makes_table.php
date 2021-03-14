<?php
    /**
     * Returns a collection of all makes in the makes table
     * @return { Object[] } - An array of all make records in makes table
     */
    function get_makes() {
        global $db;
        $query = "SELECT * FROM makes ORDER BY make_id";
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    };

    /**
     * Gets the vehicle name based on id
     *  @param { int } $make_id - primary key for makes table
     * @return { string } - the make name that corresponds to make id
     */
    function get_make_name($make_id) {
        global $db;
        $query = "SELECT * FROM makes
                    WHERE make_id = :make_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $make = $statement->fetch();
        $statement->closeCursor();
        return $make['make_name'] ?? null;
    }

    /**
     * Add a new vehicle make to the makes table in the database
     * @param { string } $make_name - Vehicle make name
     * @return { int } $count - Row affected in database
     */
    function add_make($make_name) {
        global $db;
        $count = 0;
        $query = "INSERT INTO makes (make_name)
                    VALUES (:make_name)";
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':make_name', $make_name);
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
     * Deletes a vehicle make from the makes table in the db
     * @param { int } $make_id - Vehicle make id
     * @return { int } $count - Row affected in database
     */
    function delete_make($make_id) {
        global $db;
        $count = 0;
        $query = "DELETE FROM makes
                    WHERE make_id = :make_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }
?>