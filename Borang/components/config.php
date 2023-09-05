<?php
// CONFIG PHP BEGIN
require_once(BORANG_DIR."/site_config.php"); // Import site configuration

// Establish mysqli connection
$conn = mysqli_connect(HOST, USER, PASS, DB);
if(!$conn){
    die("Connection Error: ".mysqli_connect_error());
}
// CONFIG PHP ENDS
?>