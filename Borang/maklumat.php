<?php
// PROJECTS CONFIG BEGIN
$projects_config_file = $_SERVER["DOCUMENT_ROOT"] . "/projects_config.php";
if (file_exists($projects_config_file)) {
    require_once($projects_config_file);
}
// PROJECTS CONFIG ENDS
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maklumat Pelajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="col-8 card shadow-lg m-4">
            <div class="card-body">
                <div class="card-title h2 text-center">
                    Maklumat Pelajar
                    <hr>
                </div>
                <div class="card-text container-fluid">
                    <?php
                    // OUTPUTS ALL POST VARIABLES BEGIN
                    if (isset($_POST["hantar"])) {
                        // Entry row format
                        $output = "
                        <div class='row m-4'>
                            <div class='col-lg-3 h4 text-nowrap'>
                                %s
                            </div>
                            <div class='col-lg-9 p-2'>
                                %s
                            </div>
                        </div>
                        ";

                        // Fetch all post variables
                        $nama = empty($_POST["nama"]) ? "Anda tidak mengisi maklumat nama":$_POST["nama"];
                        $jantina = empty($_POST["jantina"]) ? "Anda tidak mengisi maklumat jantina":$_POST["jantina"];
                        $tlahir = empty($_POST["tarikh_lahir"]) ? "Anda tidak mengisi maklumat tarikh lahir":$_POST["tarikh_lahir"];
                        $peringkat = empty($_POST["peringkat_pengajian"]) ? "Tidak dipilih":$_POST["peringkat_pengajian"];
                        $program = empty($_POST["program"]) ? "Tidak dipilih":$_POST["program"];
                        $alamat = empty($_POST["alamat"]) ? "Anda tidak mengisi alamat":$_POST["alamat"];

                        // Outputs all post variables
                        printf($output, "Nama:", $nama);
                        printf($output, "Jantina:", $jantina);
                        printf($output, "Tarikh lahir:", $tlahir);
                        printf($output, "Peringkat:", $peringkat);
                        printf($output, "Program:", $program);
                        printf($output, "Alamat:", $alamat);
                    } else {
                    }
                    // OUTPUTS ALL POST VARIABLES ENDS
                    ?>
                    <div class="row m-4">
                        <a href="<?php echo(BORANG_URL."/borang1.php")?>" class="btn btn-primary p-4">Kembali Ke Senarai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>