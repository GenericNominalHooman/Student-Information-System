<!-- NAVBAR BEGIN -->

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

<?php
// Display navbar content based on user authenthication state begin
$loggedIn = false;
session_start();
var_dump($_SESSION);
if(isset($_SESSION["auth"])){
    $loggedIn = true;
}
// Display navbar content based on user authenthication state ends
?>

<nav class="navbar navbar-expand-lg navbar-light p-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo ($loggedIn) ? (BORANG_URL . "/borang_profail.php") : (BORANG_URL . "/index.php"); ?>">
            <i class="fa-regular fa-user"></i>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li id="borangBtn" class="nav-item">
                    <a class="nav-link <?php echo (!$loggedIn) ? "d-none" : null;?>" aria-current="page" href="<?php echo (BORANG_URL . "/borang_profail.php"); ?>">Borang</a>
                </li>
                <li id="senaraiBtn" class="nav-item">
                    <a class="nav-link <?php echo (!$loggedIn) ? "d-none" : null;?>" href="<?php echo (BORANG_URL . "/senarai.php"); ?>">Senarai</a>
                </li>
                <li id="senaraiBtn" class="nav-item">
                    <a class="nav-link <?php echo ($loggedIn) ? "d-none" : null;?>" href="<?php echo (BORANG_URL . "/index.php"); ?>">Log masuk</a>
                </li>
                <li id="senaraiBtn" class="nav-item">
                    <a class="nav-link <?php echo ($loggedIn) ? "d-none" : null;?>" href="<?php echo (BORANG_URL . "/borang_daftar.php"); ?>">Daftar masuk</a>
                </li>
                <li id="senaraiBtn" class="nav-item">
                    <a class="nav-link <?php echo (!$loggedIn) ? "d-none" : null;?>" href="<?php echo (BORANG_URL . "/log_keluar.php"); ?>">Log keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- NAVBAR ENDS -->