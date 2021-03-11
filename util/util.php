<?php
    /**
     * @param {Integer | Float } $num - Price to be converted to USD format
     * @return {String} - USD format for given price, e.g. $49,999.00
     */
    function get_currency($num) {
        return '$' . number_format($num, 2, '.', ',') . '';
    }

    /**
     * Generates an array of equal comparison expressions to be used in SQL WHERE clause
     *
     * @param {Array[]} $arr - Associative array of key, value pairs
     * @return {String[]} - Array of equal comparison expressions, e.g. ["make_id = 1", "type_id = 2"]
     */
    function get_query_expressions($arr) {
        $query_array = array();
        foreach($arr as $key => $value) {
            if ($value != '') {
                $query_array[] = $key . ' = ' . $value;
            }
        }
        return $query_array;
    }
?>