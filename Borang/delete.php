<?php
// IMPORT BEGIN
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php"); // Import projects configuration
require_once(BORANG_DIR."/site_config.php"); // Import site configuration
require_once(BORANG_COMPONENTS_DIR."/config.php"); // Import mysql config
// IMPORT END
?>

<?php
// CONTENT BEGIN
// Check whether row to delete is set
if(!empty($_GET["id"])){
    // Delete db row
    $statement = "DELETE FROM pelajar WHERE id='".$_GET["id"]."'";
    $isDeleted = mysqli_query($conn, $statement);

    if($isDeleted){
        header("Location: senarai.php"); // Redirect the user to senarai.php if successfully deleted
    }else{
        echo("Error occured: ".mysqli_error($conn));
    }
}else{
    header("Location: senarai.php");
}
// CONTENT END
?>