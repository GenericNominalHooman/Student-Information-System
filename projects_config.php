<?php
// SITE CONFIGURATION BEGIN
define("CONNECTION_TYPE", (empty($_SERVER["HTTPS"]) ? "http://":"https://"));
define("SITE_URL", CONNECTION_TYPE.$_SERVER["SERVER_NAME"]);
define("SITE_DIR", $_SERVER["DOCUMENT_ROOT"]);
// SITE CONFIGURATION ENDS

// PROJECTS CONFIG BEGIN
define("COMPONENTS_DIR", SITE_DIR."/components"); // E-health project subdirectory name
// PROJECTS CONFIG ENDS

// Definition of projects subdirectory begin
// E_HEALTH BEGIN
define("E-HEALTH_DIR", SITE_DIR."/e-health"); // E-health project subdirectory name
// E_HEALTH ENDS

// BOARNG BEGINS
define("BORANG_DIR", SITE_DIR."/DKA3213/Borang"); // Borang project subdirectory name
define("BORANG_URL", SITE_URL."/DKA3213/Borang"); // Borang project subdirectory name
// BOARNG ENDS

// MYSQL CONFIG BEGIN
define("USER", "root");
define("PASS", "Kafin-12");
define("HOST", "localhost");
// MYSQL CONFIG ENDS
// Definition of projects subdirectory ends
?>