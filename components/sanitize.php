<?php
session_start();

// PROJECTS CONFIG BEGIN
$projects_config_file = $_SERVER["DOCUMENT_ROOT"] . "/projects_config.php";
if (file_exists($projects_config_file)) {
    require_once($projects_config_file);
}
// PROJECTS CONFIG ENDS
?>

<?php
class Sanitize{
    public static function sanitize($input){
        // Remove HTML tags
        $input = strip_tags($input);
        // Remove whitespace from both sides of the input
        $input = trim($input);
        // Remove backslashes
        $input = stripcslashes($input);
        // Convert special characters to their HTML entities
        $input = htmlentities($input, ENT_QUOTES, 'UTF-8');
        return $input;
    }

    public static function mysqli_safe($input, $conn){
        // Apply the general sanitization first
        $input = self::sanitize($input);
        // Then apply the MySQL-specific escaping
        return mysqli_real_escape_string($conn, $input);
    }
}
?>
