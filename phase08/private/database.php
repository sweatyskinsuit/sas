<?php
/**
 * Database connection functions
 * 
 * Contains functions for database operations and connection management
 */

require_once('db_credentials.php');

/**
 * Connect to the database
 * 
 * @return mysqli Database connection object
 */
function db_connect() 
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
}

/**
 * Close the database connection
 * 
 * @param mysqli $connection Database connection to close
 */
function db_disconnect($connection) 
{
    if (isset($connection)) {
        mysqli_close($connection);
    }
}

/**
 * Confirm database connection was successful
 * 
 * @throws Exception If connection fails
 */
function confirm_db_connect() 
{
    if (mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error(); 
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

/**
 * Confirm query produced a valid result set
 * 
 * @param mixed $result_set Query result to check
 * @throws Exception If query fails
 */
function confirm_result_set($result_set) 
{
    if (!$result_set) {
        exit("Database query failed.");
    }
}