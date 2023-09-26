<?php
// Import begin
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php"); // Import projects configuration
require_once(BORANG_DIR."/site_config.php"); // Import site configuration
require_once(BORANG_COMPONENTS_DIR."/config.php"); // Import site component
require_once(COMPONENTS_DIR."/sanitize.php"); // Import project component
session_start();
// Import ends

// Redirect user if access through get
if($_SERVER["REQUEST_METHOD"] == "GET"){
    header("Location: ".BORANG_URL."/borang_profail.php");
}

// Merge user input into an array to apply batch processing
// [nama: NAMA VALUE]
$userInputs = [
    "nama" => empty($_POST["nama"]) ? null : $_POST["nama"],
    "jantina" => empty($_POST["jantina"]) ? null : $_POST["jantina"],
    "tlahir" => empty($_POST["tarikh_lahir"]) ? null : $_POST["tarikh_lahir"],
    "peringkat" => empty($_POST["peringkat_pengajian"]) ? null : $_POST["peringkat_pengajian"],
    "program" => empty($_POST["program"]) ? null : $_POST["program"],
    "alamat" => empty($_POST["alamat"]) ? null : $_POST["alamat"],
    "peranti" => empty($_POST["peranti"]) ? null : $_POST["peranti"],
    "it" => empty($_POST["it"]) ? null : $_POST["it"],
];

// Sanitizes user input
array_map(function($userInput){
    if(is_array($userInput)){
        // Handle peranti array input
        return array_map(function($peranti){
            return empty($peranti) ? null : Sanitize::sanitize($peranti);
        }, $userInput);
    }else{
        return Sanitize::sanitize($userInput);
    }
}, $userInputs);

// Check whether user has unfilled input
foreach($userInputs as $key => $value){
    if(is_null($value)){ // User left out a field
        // HANDLE ERROR MESASGE HERE
        header("Location: ".BORANG_URL."/borang_profail.php");
    }
}

// Convert peranti array input into individual columns values
$peranti0 = "";
$peranti1 = "";
$peranti2 = "";
$peranti3 = "";
$peranti4 = "";
// die(var_dump($userInputs["peranti"]));
foreach($userInputs["peranti"] as $perkakasan_peranti){
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
// die($peranti2);


// Insert SQL record into borang.pelajar table
$mysqlStatement = "INSERT INTO pelajar(nama, jantina, tlahir, peringkat, program, alamat, peranti0, peranti1, peranti2, peranti3, peranti4, it, pengguna_id) VALUES('".$userInputs["nama"]."', '".$userInputs["jantina"]."', '".$userInputs["tlahir"]."', '".$userInputs["peringkat"]."', '".$userInputs["program"]."', '".$userInputs["alamat"]."', '".$peranti0."', '".$peranti1."', '".$peranti2."', '".$peranti3."', '".$peranti4."', '".$userInputs["it"]."', '".$_SESSION["auth"]["id"]."')";
var_dump($mysqlStatement);
if(!mysqli_query($conn, $mysqlStatement)){
    die("MYSQL error occured: ".mysqli_error($conn)."<br>".$mysqlStatement);
}else{
    header("Location: ".BORANG_URL."/senarai.php");
}
?>