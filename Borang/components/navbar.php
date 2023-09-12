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
<nav class="navbar navbar-expand-lg navbar-light p-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo (BORANG_URL . "/borang.php"); ?>">
            <i class="fa-regular fa-user"></i>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li id="borangBtn" class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo (BORANG_URL . "/borang.php"); ?>">Borang</a>
                </li>
                <li id="senaraiBtn" class="nav-item">
                    <a class="nav-link" href="<?php echo (BORANG_URL . "/senarai.php"); ?>">Senarai</a>
                </li>
                <li id="senaraiBtn" class="nav-item">
                    <a class="nav-link" href="<?php echo (BORANG_URL . "/log_masuk.php"); ?>">Log masuk</a>
                </li>
                <li id="senaraiBtn" class="nav-item">
                    <a class="nav-link" href="<?php echo (BORANG_URL . "/daftar_borang.php"); ?>">Daftar masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- NAVBAR ENDS -->