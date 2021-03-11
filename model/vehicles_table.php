<?php
    /**
     * @return {Object[]} - An array of all vehicle records in vehicles table
     */
    function get_vehicles() {
        global $db;
        $query = "SELECT * FROM vehicles ORDER BY price DESC";
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    };

    /**
     * @param {string} $sort_by - ORDER BY clause for SQL query
     * @param {string[]} $filters - Array of key, value pairs for filters selected for SQL WHERE clause
     * @return {Object[]} - An array of vehicle records filtered and sorted
     */
    function get_vehicles_filtered($sort_by, $filters) {
        global $db;
        $query = "SELECT * FROM vehicles";

        // Get the array of query expressions for WHERE clause, if any
        $query_array = get_query_expressions($filters);

        // Concat WHERE clause to query, if filters provided
        if (count($query_array) > 0) {
            $query .= ' WHERE ';
            $query .= implode(' AND ', $query_array);
        }

        // ORDER by clause
        $query .= " ORDER BY {$sort_by} DESC";

        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    /**
     * Deletes a vehicle from the vehicles table based on provided
     * year, model, price, {+ make_id, type_id, and class_id }
     *
     * @param {string} $year - Vehicle's year
     * @param {string} $model - Vehicle's model
     * @param {string} $price - Vehicle's price
     * @param {Integer[]} $ids - Associative array for make_id, type_id, class_id
     * @return {Integer} $count - Count of rows affected in database
     */
    function delete_vehicle($year, $model, $price, $ids) {
        global $db;
        $query = "DELETE FROM vehicles WHERE year = :year AND model = :model AND price = :price";

        // Get the WHERE clause query expressions for provided ids
        $query_array = get_query_expressions($ids);

        // If the vehicle to be deleted has a make_id, type_id, and/or class_id
        // Concatenate to query
        if (count($query_array) > 0) {
            $query .= ' AND ';
            $query .= implode(' AND ', $query_array);
        }

        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        if ($statement->execute()) {
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }
?>