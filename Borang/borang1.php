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
    <title>Borang Maklumat Pelajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid justify-content-center align-items-center">
        <div class="card shadow-lg row m-4 p-4">
            <div class="col-12 text-center">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Borang Maklumat Pelajar</h2>
                        <hr>
                    </div>
                    <div class="card-text container-fluid">
                        <div class="row">
                            <form action="<?php echo(BORANG_URL."/maklumat.php"); ?>" method="post">
                                <div class="col-12 text-start">
                                    <div class="form-floating m-4">
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pelajar">
                                        <label for="nama">Nama Pelajar</label>
                                    </div>
                                    <div class="form-check">
                                        <label class="radio-inline">
                                            Jantina:
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="jantina" id="jantina_lelaki" value="lelaki">
                                            Lelaki
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="jantina" id="jantina_perempuan" value="perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                    <div class="form-floating m-4">
                                        <input type="date" name="tarikh_lahir" class="form-control" id="tarikh_lahir" placeholder="Tarikh Lahir">
                                        <label for="tarikh_lahir" class="form-label">Tarikh Lahir:</label>
                                    </div>
                                    <div class="form-group m-4">

                                        <label for="peringkat_pengajian"  class="form-label"> Peringkat pengajian</label>
                                        <select class="dropdown form-control-sm" id="peringkat_pengajian" name="peringkat_pengajian">
                                            <div class="dropdown-menu">
                                                <option value="" class="dropdown-item" selected disabled>
                                                    Peringkat Pengajian
                                                </option>
                                                <option value="DVM" class="dropdown-item">
                                                    DVM
                                                </option>
                                                <option value="SVM" class="dropdown-item">
                                                    SVM
                                                </option>
                                            </div>
                                        </select>
                                        <label for="program" class="form-label"> Program:</label>
                                        <select name="program" id="program" class="dropdown form-control-sm">
                                            <option value="" class="dropdown-item" selected="selected" disabled>Program</option>
                                            <div class="dropdown-menu">
                                            <option value="KPD" class="dropdown-item">KPD</option>
                                            <option value="KSK" class="dropdown-item">KSK</option>
                                            <option value="KSK" class="dropdown-item">BAK</option>
                                            <option value="KSK" class="dropdown-item">BPP</option>
                                            <option value="KSK" class="dropdown-item">MTK</option>
                                            <option value="KSK" class="dropdown-item">HSK</option>
                                            <option value="KSK" class="dropdown-item">WTP</option>
</div>
                                        </select>
                                    </div>
                                    <div class="form-group m-4">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control form-control-lg"></textarea>
                                    </div>
                                    <div class="form-check m-4">
                                        <label for="checkmark_betul" class="form-check-label">Adakah maklumat yang anda isi adalah betul?</label>
                                        <input class="form-check-input" type="checkbox" name="checkmark_betul" id="checkmark_betul">
                                    </div>

                                    <button type="submit" name="hantar" class="btn btn-primary form-control shadow-lg py-4">Hantar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>