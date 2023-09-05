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
    // Fetch default values if null function
    function getDefaultColumnValue($conn, $rowId, $columnName){
        // Get entry row
        $result = mysqli_query($conn, "SELECT ".$columnName." FROM pelajar WHERE id='".$rowId."'");
        $row = mysqli_fetch_object($result);

        // Return column value
        return $row->$columnName;
    }

    // Fetch user credentials
    $nama = empty($_GET["nama"]) ? getDefaultColumnValue($conn, $_GET["id"], "nama") : $_GET["nama"];
    $jantina = empty($_GET["jantina"]) ? getDefaultColumnValue($conn, $_GET["id"], "jantina") : $_GET["jantina"];
    $tlahir = empty($_GET["tlahir"]) ? getDefaultColumnValue($conn, $_GET["id"], "tlahir") : $_GET["tlahir"];
    $peringkat = empty($_GET["peringkat"]) ? getDefaultColumnValue($conn, $_GET["id"], "peringkat") : $_GET["peringkat"];
    $program = empty($_GET["program"]) ? getDefaultColumnValue($conn, $_GET["id"], "program") : $_GET["program"];
    $alamat = empty($_GET["alamat"]) ? getDefaultColumnValue($conn, $_GET["id"], "alamat") : $_GET["alamat"];
    
    // Update db row
    $statement = "UPDATE pelajar SET nama='".$nama."', jantina='".$jantina."', tlahir='".$tlahir."', peringkat='".$peringkat."', program='".$program."', alamat='".$alamat."' WHERE id='".$_GET["id"]."'";
    $isUpdated = mysqli_query($conn, $statement);

    if($isUpdated){
        header("Location: senarai.php"); // Redirect the user to senarai.php if successfully deleted
    }else{
        echo("Error occured: ".mysqli_error($conn));
    }
}else{
    header("Location: senarai.php");
}
// CONTENT END
?>