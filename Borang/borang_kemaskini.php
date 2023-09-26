<?php
// PROJECTS CONFIG BEGIN
require_once($_SERVER["DOCUMENT_ROOT"] . "/projects_config.php"); // Import projects configuration
// PROJECTS CONFIG ENDS
require_once(BORANG_DIR . "/site_config.php"); // Import site configuration
require_once(COMPONENTS_DIR . "/header_bootstrap.php"); // Import header
require_once(BORANG_COMPONENTS_DIR . "/config.php"); // Import mysql config
require_once(BORANG_COMPONENTS_DIR . "/navbar.php"); // Import header
require_once(COMPONENTS_DIR . "/redirect.php"); // Import header
?>

<!-- CONTENT BEGIN -->

<?php
    // Redirect student to borang if borang isn't created yet begin 
    $result = mysqli_query($conn, "SELECT * FROM pelajar WHERE pengguna_id='".$_SESSION["auth"]["id"]."'");
    if(!mysqli_fetch_assoc($result)){
        Redirect::redirectGET(BORANG_URL."/borang.php", []);
    }
    // Redirect student to borang if borang isn't created yet end
?>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="card col-md-8 shadow-lg m-md-4 p-md-4">
                <div class="col-12 text-center">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>Kemaskini Maklumat Pelajar</h2>
                            <hr>
                        </div>
                        <div class="card-text container-fluid">
                            <div class="row">
                                <?php
                                //  Fetch pelajar data row from ID
                                $result = mysqli_query($conn, "SELECT * FROM pelajar WHERE id='" . $_GET["id"] . "'");
                                $pelajarData = mysqli_fetch_object($result);
                                ?>
                                <form action="<?php echo htmlspecialchars(BORANG_URL . "/kemaskini.php"); ?>" method="get">
                                    <div class="col-12 text-start">
                                        <fieldset>
                                            <legend>Maklumat Peribadi</legend>
                                            <div class="form-floating m-4">
                                                <input type="text" name="id" id="id" class="d-none" value="<?php echo ($_GET["id"]); ?>">
                                                <input required type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pelajar" value="<?php echo ($pelajarData->nama); ?>">
                                                <label for="nama">Nama Pelajar</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="radio-inline">
                                                    Jantina:
                                                </label>
                                                <label class="radio-inline">
                                                    <input required type="radio" name="jantina" id="jantina_lelaki" value="lelaki" <?php ($pelajarData->jantina == "lelaki") ? (function () {
                                                                                                                                        echo ("checked");
                                                                                                                                    })() : null; ?>>
                                                    Lelaki
                                                </label>
                                                <label class="radio-inline">
                                                    <input required type="radio" name="jantina" id="jantina_perempuan" value="perempuan" <?php ($pelajarData->jantina == "perempuan") ? (function () {
                                                                                                                                                echo ("checked");
                                                                                                                                            })() : null; ?>>
                                                    Perempuan
                                                </label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="date" name="tlahir" class="form-control" id="tlahir" placeholder="Tarikh Lahir" value="<?php echo ($pelajarData->tlahir); ?>">
                                                <label for="tlahir" class="form-label">Tarikh Lahir:</label>
                                            </div>
                                            <div class="form-group m-4">

                                                <label for="peringkat" class="form-label"> Peringkat
                                                    pengajian</label>
                                                <select required class="dropdown form-control-sm" id="peringkat" name="peringkat">
                                                    <div class="dropdown-menu">
                                                        <option value="" class="dropdown-item" selected disabled>
                                                            Peringkat Pengajian
                                                        </option>
                                                        <option value="DVM" class="dropdown-item" <?php ($pelajarData->peringkat == "DVM") ? (function () {
                                                                                                        echo ("selected");
                                                                                                    })() : null; ?>>
                                                            DVM
                                                        </option>
                                                        <option value="SVM" class="dropdown-item" <?php ($pelajarData->peringkat == "SVM") ? (function () {
                                                                                                        echo ("selected");
                                                                                                    })() : null; ?>>
                                                            SVM
                                                        </option>
                                                    </div>
                                                </select>
                                                <label for="program" class="form-label"> Program:</label>
                                                <select required name="program" id="program" class="dropdown form-control-sm">
                                                    <option value="" class="dropdown-item" selected="selected" disabled>
                                                        Program</option>
                                                    <div class="dropdown-menu">
                                                        <option value="KPD" class="dropdown-item" <?php if ($pelajarData->program == "KPD") {
                                                                                                        echo ("selected");
                                                                                                    } ?>>KPD</option>
                                                        <option value="KSK" class="dropdown-item" <?php if ($pelajarData->program == "KSK") {
                                                                                                        echo ("selected");
                                                                                                    } ?>>KSK</option>
                                                        <option value="BAK" class="dropdown-item" <?php if ($pelajarData->program == "BAK") {
                                                                                                        echo ("selected");
                                                                                                    } ?>>BAK</option>
                                                        <option value="BPP" class="dropdown-item" <?php if ($pelajarData->program == "BPP") {
                                                                                                        echo ("selected");
                                                                                                    } ?>>BPP</option>
                                                        <option value="MTK" class="dropdown-item" <?php if ($pelajarData->program == "MTK") {
                                                                                                        echo ("selected");
                                                                                                    } ?>>MTK</option>
                                                        <option value="HSK" class="dropdown-item" <?php if ($pelajarData->program == "HSK") {
                                                                                                        echo ("selected");
                                                                                                    } ?>>HSK</option>
                                                        <option value="WTP" class="dropdown-item" <?php if ($pelajarData->program == "WTP") {
                                                                                                        echo ("selected");
                                                                                                    } ?>>WTP</option>
                                                    </div>
                                                </select>
                                            </div>
                                            <div class="form-group m-4">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea required name="alamat" id="alamat" class="form-control form-control-lg"><?php echo ($pelajarData->alamat); ?></textarea>
                                            </div>
                                            <div class="form-group m-4">
                                                <label id="it_label" for="it" class="form-label">Kemahiran ICT(5): </label>
                                                <input min="0" step="1" max="10" <?php
                                                    if(!empty($pelajarData->it)){
                                                        echo("value='".$pelajarData->it."'");
                                                    }else{
                                                        echo("value=\"0\"");
                                                    }
                                                ?> required type="range" name="it" class="form-control-range" id="it" placeholder="Kemahiran ICT">
                                            </div>
                                            <script>
                                                // UPDATE KEMAHIRAN ICT COUNTER BEGIN
                                                $(document).ready(() => {
                                                    $("#it_label").text("Kemahiran ICT(" + $("#it").val() + "): ");
                                                    $("#it").on("input", (e) => {
                                                        console.log("Inputted");
                                                        $("#it_label").text("Kemahiran ICT(" + $("#it").val() + "): ");
                                                    });
                                                });
                                                // UPDATE KEMAHIRAN ICT COUNTER ENDS
                                            </script>
                                            <fieldset>
                                                <legend>Peranti Dimiliki</legend>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <p>Genre Filem Kegemaran (Klik pada kotak yang berkenaan. Anda boleh klik lebih daripada satu)</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-6">
                                                            <div class="form-check m-4">
                                                                <label for="smartphone" class="form-check-label">Smartphone</label>
                                                                <input value="smartphone" class="form-check-input" type="checkbox" name="peranti[]" id="smartphone" <?php
                                                                    if(!empty($pelajarData->peranti0)){
                                                                        echo("checked");
                                                                    }
                                                                ?>>
                                                            </div>
                                                            <div class="form-check m-4">
                                                                <label for="laptop" class="form-check-label">Laptop</label>
                                                                <input value="laptop" class="form-check-input" type="checkbox" name="peranti[]" id="laptop" <?php
                                                                    if(!empty($pelajarData->peranti1)){
                                                                        echo("checked");
                                                                    }
                                                                ?>>
                                                            </div>
                                                            <div class="form-check m-4">
                                                                <label for="tablet" class="form-check-label">Tablet</label>
                                                                <input value="tablet" class="form-check-input" type="checkbox" name="peranti[]" id="tablet" <?php
                                                                    if(!empty($pelajarData->peranti2)){
                                                                        echo("checked");
                                                                    }
                                                                ?>>
                                                            </div>
                                                            <div class="form-check m-4">
                                                                <label for="lain" class="form-check-label">Lain-lain</label>
                                                                <input value="lain" class="form-check-input" type="checkbox" name="peranti[]" id="lain" <?php
                                                                    if(!empty($pelajarData->peranti3)){
                                                                        echo("checked");
                                                                    }
                                                                ?>>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </fieldset>


                                        <!-- FORM BUTTON BEGIN -->
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-lg-4 p-2">
                                                    <button type="submit" name="hantar" class="btn btn-primary w-100 shadow-lg py-4"><i class="fa-solid fa-floppy-disk"></i><span class="ms-2">Kemaskini</span></button>
                                                </div>
                                                <div class="col-12 col-lg-4 p-2">
                                                    <a class="btn btn-danger w-100 shadow-lg py-4" href="<?php echo (BORANG_URL . "/delete.php?id=" . $_GET["id"]); ?>"><i class="fa-solid fa-trash"></i><span class="ms-2">Buang</span></a>
                                                </div>
                                                <div class="col-12 col-lg-4 p-2">
                                                    <button type="reset" class="btn btn-secondary w-100 shadow-lg py-4"><i class="fa-solid fa-arrow-rotate-right"></i><span class="ms-2">Batal</span></button>
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
        </div>
    </div>
    <!-- CONTENT ENDS -->

    <?php
    // FOOTER BEGIN
    require_once(COMPONENTS_DIR . "/footer_bootstrap.php"); // Import site configuration
    // FOOTER END
    ?>