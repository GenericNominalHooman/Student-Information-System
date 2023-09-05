<?php
// PROJECTS CONFIG BEGIN
$projects_config_file = $_SERVER["DOCUMENT_ROOT"] . "/projects_config.php";
if (file_exists($projects_config_file)) {
    require_once($projects_config_file);
}
// PROJECTS CONFIG ENDS
require_once(BORANG_DIR . "/site_config.php"); // Import site configuration
require_once(COMPONENTS_DIR . "/header_bootstrap.php"); // Import header
?>

<!-- CONTENT BEGIN -->
<?php
    require_once(BORANG_COMPONENTS_DIR."/config.php");// Import mysqli connection

    // Sanitize user input
    $username = stripslashes(mysqli_real_escape_string($conn, $_POST["username"]));
    $password = stripslashes(mysqli_real_escape_string($conn, $_POST["password"]));

    // Hash password
    $password = md5($password);

    // Mysqli query to see matching username-password combination
    $statement = "SELECT * FROM pengguna WHERE username='$username' AND password_hash='$password'";
    $result = mysqli_query($conn, $statement);
    $rows = mysqli_num_rows($result);
    
    if($rows == 1){
        // Redirect user to borang if successfully authenthicated
        header("Location: borang.php");
    }else{
        // Display error message if isn't successfull
        die(mysqli_error($conn));
    }
?>
<!-- CONTENT ENDS -->