<?php
    function get_currency($num) {
        return '$' . number_format($num, 2, '.', ',') . '';
    }
?>