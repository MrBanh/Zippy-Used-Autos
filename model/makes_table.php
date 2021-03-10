<?php
    /**
     * @return {Object[]} - An array of all make records in makes table
     * 
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
     *  @param $make_id - primary key for makes table
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

?>