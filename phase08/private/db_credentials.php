<?php
/**
 * Database credentials
 * 
 * IMPORTANT: This file should be excluded from version control
 * Copy db_credentials.php-for-git.php to db_credentials.php and update values
 */

// Define database connection constants
define("DB_SERVER", "localhost");
define("DB_USER", "hannrgla_salamander_user");
define("DB_PASS", "WinPhoKey58?"); // Consider using environment variables for passwords
define("DB_NAME", "salamanders");

// Note: Removed direct connection code that was duplicating db_connect() function