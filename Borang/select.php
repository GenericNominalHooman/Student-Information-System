<?php
// IMPORT BEGIN
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php"); // Import projects configuration
require_once(BORANG_DIR."/site_config.php"); // Import site configuration
require_once(BORANG_COMPONENTS_DIR."/config.php"); // Import site configuration
// IMPORT END
?>

<!-- CONTENT BEGIN -->
<?php
$mysqlStatement = "SELECT * FROM pelajar";
$pelajarRows = mysqli_query($conn, $mysqlStatement);
?>
<!-- CONTENT END -->