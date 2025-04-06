<?php

    function find_all_subjects() {
        global $db;
        
        $sql = "SELECT * FROM subjects ";
        $sql .= "ORDER BUY position ASC";
        $result = mysqli_query($db, $sql);
        return $result;
    }

?>