<?php
// PROJECTS CONFIG BEGIN
$projects_config_file = $_SERVER["DOCUMENT_ROOT"] . "/projects_config.php";
if (file_exists($projects_config_file)) {
    require_once($projects_config_file);
}
// PROJECTS CONFIG ENDS
require_once(BORANG_DIR . "/site_config.php"); // Import site configuration
require_once(BORANG_COMPONENTS_DIR . "/auth.php"); // Import redirect
require_once(BORANG_COMPONENTS_DIR . "/config.php"); // Import redirect
require_once(COMPONENTS_DIR . "/redirect.php"); // Import redirect
?>

<!-- ADMIN REDIRECT BEGIN -->
<?php
session_start();
if(isset($_SESSION["auth"])){
    switch($_SESSION["auth"]["role"]){
        case "admin":
            Redirect::redirectGET(BORANG_URL."/senarai.php", []);
        break;
        case "student":
            Redirect::redirectGET(BORANG_URL."/profail.php", ["id" => $_SESSION["auth"]["id"]]);
        break;
    }
}
?>
<!-- ADMIN REDIRECT ENDS -->