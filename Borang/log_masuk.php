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

<!-- DAFTAR BEGIN -->
<?php
$authObj = new Auth($conn);
// Registering user
if($authObj->login($_POST["username"], $_POST["password"])){
    // Redirecting user based on user types
    switch($_SESSION["auth"]["role"]){
        case "admin":
            Redirect::redirectPOST(BORANG_URL."/senarai.php", []);
        break;
        case "student":
            Redirect::redirectGET(BORANG_URL."/borang_profail.php", ["id" => $_SESSION["auth"]["id"]]);
        break;
        default:
            Redirect::redirectPOST(BORANG_URL."/index.php", []);
        break;
    }
}else{
    // Redirecting user w error message
    Redirect::redirectPOST(BORANG_URL."/borang_profail.php", ["error" => "Gagal mendaftar pengguna"]);
}
?>
<!-- DAFTAR ENDS -->