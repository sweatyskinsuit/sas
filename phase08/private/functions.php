<?php
/**
 * Helper functions for the application
 */

/**
 * Create a URL for the given script path
 * 
 * @param string $script_path Relative path to script
 * @return string Complete URL for the path
 */
function url_for($script_path) 
{
    // Add the leading '/' if not present
    if ($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

/**
 * URL encode a string
 * 
 * @param string $string String to encode
 * @return string URL encoded string
 */
function u($string = "") 
{
    return urlencode($string);
}

/**
 * Raw URL encode a string
 * 
 * @param string $string String to encode
 * @return string Raw URL encoded string
 */
function raw_u($string = "") 
{
    return rawurlencode($string);
}

/**
 * Convert special characters to HTML entities
 * 
 * @param string $string String to convert
 * @return string HTML-safe string
 */
function h($string = "") 
{
    return htmlspecialchars($string);
}

/**
 * Send 404 Not Found header and exit
 */
function error_404() 
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
}

/**
 * Send 500 Internal Server Error header and exit
 */
function error_500() 
{
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
}

/**
 * Redirect to the specified location
 * 
 * @param string $location URL to redirect to
 */
function redirect_to($location) 
{
    header("Location: " . $location);
    exit;
}

/**
 * Check if the current request is a POST request
 * 
 * @return bool True if POST request
 */
function is_post_request() 
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Check if the current request is a GET request
 * 
 * @return bool True if GET request
 */
function is_get_request() 
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

/**
 * Display form validation errors
 * 
 * @param array $errors Array of error messages
 * @return string HTML for displaying errors
 */
function display_errors($errors = []) 
{
    $output = '';
    if (!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:"; // Fixed typo 'fic' -> 'fix'
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}
