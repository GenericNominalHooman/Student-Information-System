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
    $it = empty($_GET["it"]) ? getDefaultColumnValue($conn, $_GET["id"], "it") : $_GET["it"];
    $peranti = empty($_GET["peranti"]) ? getDefaultColumnValue($conn, $_GET["id"], "peranti0") : $_GET["peranti"];// This logic is bad, will fetch peranti0 only if get variable is not set
    
    // Convert peranti array input into individual columns values
    $peranti0 = "";
    $peranti1 = "";
    $peranti2 = "";
    $peranti3 = "";
    $peranti4 = "";
    foreach($peranti as $perkakasan_peranti){
        switch($perkakasan_peranti){
            case "smartphone":
                $peranti0 = "smartphone";
            break;
            case "laptop":
                $peranti1 = "laptop";        
            break;
            case "tablet":
                $peranti2 = "tablet";        
            break;
            case "lain":
                $peranti3 = "lain";        
            break;
        }
    }
    
    // Update db row
    $statement = "UPDATE pelajar SET nama='".$nama."', jantina='".$jantina."', tlahir='".$tlahir."', peringkat='".$peringkat."', program='".$program."', alamat='".$alamat."', peranti0='".$peranti0."', peranti1='".$peranti1."', peranti2='".$peranti2."', peranti3='".$peranti3."', peranti4='".$peranti4."', it='".$it."'  WHERE pengguna_id='".$_GET["id"]."'";
    $isUpdated = mysqli_query($conn, $statement);

    if($isUpdated){
        header("Location: senarai.php"); // Redirect the user to senarai.php if successfully entry is successfully manipulated
    }else{
        echo("Error occured: ".mysqli_error($conn));
    }
}else{
    header("Location: senarai.php");
}
// CONTENT END
?>