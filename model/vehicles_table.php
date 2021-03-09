<?php
    function get_vehicles() {
        global $db;
        $query = "SELECT * FROM vehicles ORDER BY price DESC";
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    };

?>