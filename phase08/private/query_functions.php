<?php
/**
 * Database query functions for salamander operations
 */

// Include validation functions if not already included
require_once('validation_functions.php');

/**
 * Retrieve all salamanders from database
 * 
 * @return mysqli_result Result set of all salamanders
 */
function find_all_salamanders() 
{
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

/**
 * Find salamander by ID
 * 
 * @param int $id Salamander ID to find
 * @return array Associated array of salamander data
 */
function find_salamander_by_id($id) 
{
    global $db;
    // Using prepared statement to prevent SQL injection
    $sql = "SELECT * FROM salamander WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    confirm_result_set($result);
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander;
}

/**
 * Validate salamander data
 * 
 * @param array $salamander Salamander data to validate
 * @return array Array of validation errors (empty if valid)
 */
function validate_salamander($salamander) 
{
    $errors = [];

    // name
    if (is_blank($salamander['name'])) {
        $errors[] = "Name cannot be blank.";
    } elseif (!has_length($salamander['name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Name must be between 2 and 255 characters.";
    }

    // habitat
    if (is_blank($salamander['habitat'])) {
        $errors[] = "Habitat cannot be blank.";
    } elseif (!has_length($salamander['habitat'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Habitat must be between 2 and 255 characters.";
    }
    
    // description - fixed typo in the key name 'decription'
    if (is_blank($salamander['description'])) {
        $errors[] = "Description cannot be blank.";
    } elseif (!has_length($salamander['description'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Description must be between 2 and 255 characters.";
    }
    
    return $errors;
}

/**
 * Insert a new salamander into the database
 * 
 * @param array $salamander Salamander data to insert
 * @return bool|array True on success, array of errors on validation failure
 */
function insert_salamander($salamander) 
{
    global $db;
    
    // Validate data first
    $errors = validate_salamander($salamander);
    if (!empty($errors)) {
        return $errors;
    }
    
    // Using prepared statement to prevent SQL injection
    $sql = "INSERT INTO salamander (name, habitat, description) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param(
        $stmt, 
        "sss", 
        $salamander['name'], 
        $salamander['habitat'], 
        $salamander['description']
    );
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

/**
 * Update an existing salamander
 * 
 * @param array $salamander Salamander data to update
 * @return bool|array True on success, array of errors on validation failure
 */
function update_salamander($salamander) 
{
    global $db;
    
    // Validate data first
    $errors = validate_salamander($salamander);
    if (!empty($errors)) {
        return $errors;
    }
    
    // Using prepared statement to prevent SQL injection
    $sql = "UPDATE salamander SET name = ?, habitat = ?, description = ? ";
    $sql .= "WHERE id = ? LIMIT 1";
    
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param(
        $stmt, 
        "sssi", 
        $salamander['name'], 
        $salamander['habitat'], 
        $salamander['description'],
        $salamander['id']
    );
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

/**
 * Delete a salamander by ID
 * 
 * @param int $id Salamander ID to delete
 * @return bool True on success
 */
function delete_salamander($id) 
{
    global $db;
    
    // Using prepared statement to prevent SQL injection
    $sql = "DELETE FROM salamander WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}