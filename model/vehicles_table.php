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
        $query = "SELECT * FROM vehicles " . (count($filters) > 0 ? 'WHERE ' : '');

        // Prepare dynamic query based on filters selected
        $query_array = array();
        foreach($filters as $key => $value) {
            if ($value != '') {
                // Generate WHERE clause
                $query_array[] = $key . ' = ' . $value;
            }
        }

        // Concat WHERE clause to query
        $query .= implode(' AND ', $query_array);

        // ORDER by clause
        $query .= " ORDER BY {$sort_by} DESC";

        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
?>