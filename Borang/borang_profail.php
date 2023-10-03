<?php
// PROJECTS CONFIG BEGIN
$projects_config_file = $_SERVER["DOCUMENT_ROOT"] . "/projects_config.php";
if (file_exists($projects_config_file)) {
    require_once($projects_config_file);
}
// PROJECTS CONFIG ENDS
require_once(BORANG_DIR . "/site_config.php"); // Import site configuration
require_once(COMPONENTS_DIR . "/header_bootstrap.php"); // Import header
require_once(BORANG_COMPONENTS_DIR . "/navbar.php"); // Import header
require_once(COMPONENTS_DIR . "/redirect.php"); // Import header
require_once(BORANG_COMPONENTS_DIR . "/config.php"); // Import mysql config

// Redirect to lencong.php if form field is filled or not student start
if(isset($_SESSION["auth"])){
    if($_SESSION["auth"]["role"] == "student"){

        $query = "SELECT COUNT(*) AS rekod_pelajar FROM pelajar WHERE pengguna_id='".$_SESSION["auth"]["id"]."'";
        $result = mysqli_query($conn, $query);
        if(mysqli_fetch_assoc($result)["rekod_pelajar"] > 0){ // Rediretc if student already has a form
            Redirect::redirectGET(BORANG_URL."/profail.php", ["id" => $_SESSION["auth"]["id"]]);
        }
        
    }elseif($_SESSION["auth"]["role"] == "lecturer"){ // Rediretc if user isn't student
        Redirect::redirectGET(BORANG_URL."/lencong.php", []);
    }
}else{ // Rediretc if user is guest
    Redirect::redirectGET(BORANG_URL."/lencong.php", []);
}
// Redirect to lencong.php if form field is filled or not student ends
?>

<!-- CONTENT BEGIN -->

<!-- Jquery Begin -->
<script>
    $(document).ready(function() {})
</script>
<!-- Jquery Ends -->
<?php
// Check whether current user already has a borang form
session_start();
?>
<body>
    <!-- CONTENT BEGIN -->
    <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">
            <div class="card col-md-8 shadow-lg m-md-4 p-md-4">
                <div class="col-12 text-center">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Borang Maklumat Pelajar</h2>
                            <hr>
                        </div>
                        <div class="card-text container-fluid">
                            <div class="row">
                                <form action="<?php echo (BORANG_URL . "/tambah_rekod_pelajar.php"); ?>" method="post">
                                    <div class="col-12 text-start">
                                        <fieldset>
                                            <legend>Maklumat Diri</legend>
                                            <div class="form-floating m-4">
                                                <input required type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pelajar" value="<?php echo(isset($_SESSION["auth"]) ? $_SESSION["auth"]["username"] : "");?>" <?php echo(isset($_SESSION["auth"]) ? "readonly" : "")?>>
                                                <label for="nama">Nama Pelajar</label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="text" name="no_kp" id="no_kp" class="form-control" placeholder="No Kad Pengenalan Pelajar">
                                                <label for="no_kp">No Kad Pengenalan Pelajar</label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="number" min="0" step="0.1" name="berat" id="berat" class="form-control" placeholder="Berat(Kg)">
                                                <label for="berat">Berat(Kg)</label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="number" min="0" step="0.1" name="tinggi" id="tinggi" class="form-control" placeholder="Tinggi(m)">
                                                <label for="tinggi">Tinggi(m)</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="radio-inline">
                                                    Jantina:
                                                </label>
                                                <label class="radio-inline">
                                                    <input required type="radio" name="jantina" id="jantina_lelaki" value="lelaki">
                                                    Lelaki
                                                </label>
                                                <label class="radio-inline">
                                                    <input required type="radio" name="jantina" id="jantina_perempuan" value="perempuan">
                                                    Perempuan
                                                </label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="date" name="tarikh_lahir" class="form-control" id="tarikh_lahir" placeholder="Tarikh Lahir">
                                                <label for="tarikh_lahir" class="form-label">Tarikh Lahir:</label>
                                            </div>
                                            <div class="form-group m-4">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea rows="5" required name="alamat" id="alamat" class="form-control" placeholder="Alamat anda"></textarea>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Maklumat Pendidikan</legend>
                                            <div class="form-group m-4">
                                                <label for="peringkat_pengajian" class="form-label"> Peringkat
                                                    pengajian: </label>
                                                <select required class="dropdown form-control-sm" id="peringkat_pengajian" name="peringkat_pengajian">
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
                                            </div>
                                            <div class="form-group m-4">
                                                <label for="program" class="form-label"> Program:</label>
                                                <select required name="program" id="program" class="dropdown form-control-sm">
                                                    <option value="" class="dropdown-item" selected="selected" disabled>
                                                        Program</option>
                                                    <div class="dropdown-menu">
                                                        <option value="KPD" class="dropdown-item">KPD</option>
                                                        <option value="KSK" class="dropdown-item">KSK</option>
                                                        <option value="BAK" class="dropdown-item">BAK</option>
                                                        <option value="BPP" class="dropdown-item">BPP</option>
                                                        <option value="MTK" class="dropdown-item">MTK</option>
                                                        <option value="HSK" class="dropdown-item">HSK</option>
                                                        <option value="WTP" class="dropdown-item">WTP</option>
                                                    </div>
                                                </select>
                                            </div>
                                            <div class="form-group m-4">
                                                <label id="it_label" for="it" class="form-label">Kemahiran ICT(5): </label>
                                                <input min="0" step="1" max="10" value="5" required type="range" name="it" class="form-control-range" id="it" placeholder="Kemahiran ICT">
                                            </div>
                                            <script>
                                                // UPDATE KEMAHIRAN ICT COUNTER BEGIN
                                                $(document).ready(() => {
                                                    $("#it").on("input", (e)=>{
                                                        console.log("Inputted");
                                                        $("#it_label").text("Kemahiran ICT("+$("#it").val()+"): ");
                                                    });
                                                });
                                                // UPDATE KEMAHIRAN ICT COUNTER ENDS
                                            </script>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Peranti Dimiliki</legend>
                                            <div class="container-fluid">
                                                <div class="row"><p>Genre Filem Kegemaran (Klik pada kotak yang berkenaan. Anda boleh klik lebih daripada satu)</p></div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="smartphone" class="form-check-label">Smartphone</label>
                                                            <input  class="form-check-input" value="smartphone" type="checkbox" name="peranti[]" id="smartphone">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="laptop" class="form-check-label">Laptop</label>
                                                            <input  class="form-check-input" value="laptop" type="checkbox" name="peranti[]" id="laptop">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="tablet" class="form-check-label">Tablet</label>
                                                            <input  class="form-check-input" value="tablet" type="checkbox" name="peranti[]" id="tablet">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="lain" class="form-check-label">Lain-lain</label>
                                                            <input  class="form-check-input" value="lain" type="checkbox" name="peranti[]" id="lain">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                        <div class="form-check m-4">
                                            <label for="checkmark_betul" class="form-check-label">Adakah maklumat yang
                                                anda isi adalah betul?</label>
                                            <input required class="form-check-input" type="checkbox" name="checkmark_betul" id="checkmark_betul">
                                        </div>

                                        <!-- FORM BUTTON BEGIN -->
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" name="hantar" class="btn btn-primary w-100 shadow-lg py-4"><i class="fa-solid fa-paper-plane"></i><span class="ms-2">Hantar</span></button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="reset" name="reset" class="btn btn-secondary w-100 shadow-lg py-4"><i class="fa-solid fa-arrow-rotate-right"></i><span class="ms-2">Isi Semula</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FORM BUTTON ENDS -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-8 shadow-lg m-md-4 p-md-4">
                <div class="col-12 text-center">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Maklumat Pelajar</h2>
                            <hr>
                        </div>
                        <div class="card-text container-fluid">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT ENDS -->


    <?php
    // FOOTER BEGIN
    require_once(COMPONENTS_DIR . "/footer_bootstrap.php"); // Import site configuration
    // FOOTER END
    ?>