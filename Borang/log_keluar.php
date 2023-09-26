<?php
// PROJECTS CONFIG BEGIN
$projects_config_file = $_SERVER["DOCUMENT_ROOT"] . "/projects_config.php";
if (file_exists($projects_config_file)) {
    require_once($projects_config_file);
}
// PROJECTS CONFIG ENDS
require_once(BORANG_DIR . "/site_config.php"); // Import site configuration
require_once(COMPONENTS_DIR . "/redirect.php"); // Import redirect
?>

<!-- LOG KELUAR BEGIN -->
<?php
session_start();
session_destroy();
Redirect::redirectGET(BORANG_URL."/index.php", []);
?>
<!-- LOG KELUAR BEGIN -->