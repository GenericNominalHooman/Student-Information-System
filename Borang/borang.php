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
require_once(BORANG_COMPONENTS_DIR . "/config.php"); // Import mysql config
?>

<!-- CONTENT BEGIN -->

<!-- Jquery Begin -->
<script>
    $(document).ready(function() {})
</script>
<!-- Jquery Ends -->

<body>
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
                                <form action="<?php echo (BORANG_URL . "/insert.php"); ?>" method="post">
                                    <div class="col-12 text-start">
                                        <fieldset>
                                            <legend>Maklumat Diri</legend>
                                            <div class="form-floating m-4">
                                                <input required type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pelajar">
                                                <label for="nama">Nama Pelajar</label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="text" name="no_kp" id="no_kp" class="form-control" placeholder="No Kad Pengenalan Pelajar">
                                                <label for="no_kp">No Kad Pengenalan Pelajar</label>
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
                                            <div class="form-group m-4">
                                                <label for="bangsa" class="form-label">Bangsa: </label>
                                                <select required class="dropdown form-control-sm" id="bangsa" name="bangsa">
                                                    <div class="dropdown-menu">
                                                        <option value="" class="dropdown-item" selected disabled>
                                                            Bangsa
                                                        </option>
                                                        <option value="melayu" class="dropdown-item">
                                                            Melayu
                                                        </option>
                                                        <option value="cina" class="dropdown-item">
                                                            Cina
                                                        </option>
                                                        <option value="India" class="dropdown-item">
                                                            India
                                                        </option>
                                                        <option value="bumiputera" class="dropdown-item">
                                                            Bumiputera Sabah/Sarawak
                                                        </option>
                                                        <option value="lain" class="dropdown-item">
                                                            Lain-lain
                                                        </option>
                                                    </div>
                                                </select>
                                            </div>
                                            <div class="form-group m-4">
                                                <label for="agama" class="form-label">Agama: </label>
                                                <select required class="dropdown form-control-sm" id="agama" name="agama">
                                                    <div class="dropdown-menu">
                                                        <option value="" class="dropdown-item" selected disabled>
                                                            Agama
                                                        </option>
                                                        <option value="islam" class="dropdown-item">
                                                            Islam
                                                        </option>
                                                        <option value="buddha" class="dropdown-item">
                                                            Buddha
                                                        </option>
                                                        <option value="hindu" class="dropdown-item">
                                                            Hindu
                                                        </option>
                                                        <option value="kristian" class="dropdown-item">
                                                            Kristian
                                                        </option>
                                                        <option value="lain" class="dropdown-item">
                                                            Lain-lain
                                                        </option>
                                                    </div>
                                                </select>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="date" name="tarikh_lahir" class="form-control" id="tarikh_lahir" placeholder="Tarikh Lahir">
                                                <label for="tarikh_lahir" class="form-label">Tarikh Lahir:</label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            </div>
                                            <div class="form-group m-4">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea rows="5" required name="alamat" id="alamat" class="form-control" placeholder="Alamat anda"></textarea>
                                            </div>
                                            <div class="form-group m-4">
                                                <label for="negeri" class="form-label">Negeri: </label>
                                                <select required class="dropdown form-control-sm" id="negeri" name="negeri">
                                                    <div class="dropdown-menu">
                                                        <option value="" class="dropdown-item" selected disabled>
                                                            Negeri
                                                        </option>
                                                        <option value="perlis" class="dropdown-item">
                                                            Perlis
                                                        </option>
                                                        <option value="kedah" class="dropdown-item">
                                                            kedah
                                                        </option>
                                                        <option value="pulau pinang" class="dropdown-item">
                                                            Pulau Pinang
                                                        </option>
                                                        <option value="perak" class="dropdown-item">
                                                            Perak
                                                        </option>
                                                        <option value="selangor" class="dropdown-item">
                                                            Selangor
                                                        </option>
                                                        <option value="negeri sembilan" class="dropdown-item">
                                                            Negeri Sembilan
                                                        </option>
                                                        <option value="melaka" class="dropdown-item">
                                                            Melaka
                                                        </option>
                                                        <option value="johor" class="dropdown-item">
                                                            Johor
                                                        </option>
                                                        <option value="pahang" class="dropdown-item">
                                                            Pahang
                                                        </option>
                                                        <option value="terengganu" class="dropdown-item">
                                                            Terengganu
                                                        </option>
                                                        <option value="kelantan" class="dropdown-item">
                                                            Kelantan
                                                        </option>
                                                        <option value="sabah" class="dropdown-item">
                                                            Sabah
                                                        </option>
                                                        <option value="sarawak" class="dropdown-item">
                                                            Sarawak
                                                        </option>
                                                        <option value="wilayah persekutuan labuan" class="dropdown-item">
                                                            Wilayah Persekutuan Labuan
                                                        </option>
                                                        <option value="wilayah persekutuan kuala lumpur" class="dropdown-item">
                                                            Wilayah Persekutuan Kuala Lumpur
                                                        </option>
                                                        <option value="wilayah persekutuan putrajaya" class="dropdown-item">
                                                            Wilayah Persekutuan Putrajaya
                                                        </option>
                                                    </div>
                                                </select>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="tel" name="no_telefon" class="form-control" id="no_telefon" placeholder="Nombor Telefon">
                                                <label for="no_telefon" class="form-label">Nombor Telefon</label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="email" name="email" class="form-control" id="email" placeholder="Email">
                                                <label for="email" class="form-label">Email</label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input required type="url" name="laman_peribadi" class="form-control" id="laman_peribadi" placeholder="Laman Peribadi/Blog">
                                                <label for="laman_peribadi" class="form-label">Laman Peribadi/Blog</label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input min="0" step="0.1" required type="number" name="tinggi" class="form-control" id="tinggi" placeholder="Tinggi(m)">
                                                <label for="tinggi" class="form-label">Tinggi (m)</label>
                                            </div>
                                            <div class="form-floating m-4">
                                                <input min="0" step="0.1" required type="number" name="berat" class="form-control" id="berat" placeholder="berat (Kg)">
                                                <label for="berat" class="form-label">Berat (Kg)</label>
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
                                            <div class="form-floating m-4">
                                                <input required type="text" name="institusi_pengajian" class="form-control" id="institusi_pengajian" placeholder="Institusi Pengajian">
                                                <label for="institusi_pengajian" class="form-label">Institusi Pengajian</label>
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
                                                <label id="kemahiran_ict_label" for="kemahiran_ict" class="form-label">Kemahiran ICT(5): </label>
                                                <input min="0" step="1" max="10" value="5" required type="range" name="kemahiran_ict" class="form-control-range" id="kemahiran_ict" placeholder="Kemahiran ICT">
                                            </div>
                                            <script>
                                                // UPDATE KEMAHIRAN ICT COUNTER BEGIN
                                                $(document).ready(() => {
                                                    $("#kemahiran_ict").on("input", (e)=>{
                                                        console.log("Inputted");
                                                        $("#kemahiran_ict_label").text("Kemahiran ICT("+$("#kemahiran_ict").val()+"): ");
                                                    });
                                                });
                                                // UPDATE KEMAHIRAN ICT COUNTER ENDS
                                            </script>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Minat dan Kegemaran</legend>
                                            <div class="container-fluid">
                                                <div class="row"><p>Hobi (Klik pada kotak yang berkenaan. Anda boleh klik lebih daripada satu)</p></div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="membaca" class="form-check-label">Membaca</label>
                                                            <input required class="form-check-input" type="checkbox" name="membaca" id="membaca">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="membeli_belah" class="form-check-label">Membeli-belah</label>
                                                            <input required class="form-check-input" type="checkbox" name="membeli_belah" id="membeli_belah">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="melancong" class="form-check-label">Melancong</label>
                                                            <input required class="form-check-input" type="checkbox" name="melancong" id="melancong">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="bersukan" class="form-check-label">Bersukan</label>
                                                            <input required class="form-check-input" type="checkbox" name="bersukan" id="bersukan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="muzik" class="form-check-label">Muzik</label>
                                                            <input required class="form-check-input" type="checkbox" name="muzik" id="muzik">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="melukis" class="form-check-label">Melukis</label>
                                                            <input required class="form-check-input" type="checkbox" name="membeli_belah" id="melukis">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="permainan_internet" class="form-check-label">Permainan Internet</label>
                                                            <input required class="form-check-input" type="checkbox" name="permainan_internet" id="permainan_internet">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="menonton_telivisyen" class="form-check-label">Menonton Telivisyen</label>
                                                            <input required class="form-check-input" type="checkbox" name="menonton_telivisyen" id="menonton_telivisyen">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="memancing" class="form-check-label">Memancing</label>
                                                            <input required class="form-check-input" type="checkbox" name="memancing" id="memancing">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="komputer" class="form-check-label">Komputer</label>
                                                            <input required class="form-check-input" type="checkbox" name="komputer" id="komputer">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="berkebun" class="form-check-label">Berkebun</label>
                                                            <input required class="form-check-input" type="checkbox" name="berkebun" id="berkebun">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="menjahit" class="form-check-label">Menjahit</label>
                                                            <input required class="form-check-input" type="checkbox" name="menjahit" id="menjahit">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="memasak" class="form-check-label">Memasak</label>
                                                            <input required class="form-check-input" type="checkbox" name="memasak" id="memasak">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="berbasikal" class="form-check-label">Berbasikal</label>
                                                            <input required class="form-check-input" type="checkbox" name="berbasikal" id="berbasikal">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="menonton_wayang" class="form-check-label">Menonton wayang</label>
                                                            <input required class="form-check-input" type="checkbox" name="menonton_wayang" id="menonton_wayang">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="santai_bersama_keluarga" class="form-check-label">Santai Bersama Keluarga</label>
                                                            <input required class="form-check-input" type="checkbox" name="santai_bersama_keluarga" id="santai_bersama_keluarga">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row"><p>Genre Filem Kegemaran (Klik pada kotak yang berkenaan. Anda boleh klik lebih daripada satu)</p></div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="aksi" class="form-check-label">Aksi</label>
                                                            <input required class="form-check-input" type="checkbox" name="aksi" id="aksi">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="drama" class="form-check-label">Drama</label>
                                                            <input required class="form-check-input" type="checkbox" name="drama" id="drama">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="fiksyen_sains" class="form-check-label">Fiksyen Sains</label>
                                                            <input required class="form-check-input" type="checkbox" name="fiksyen_sains" id="fiksyen_sains">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="kanak_kanak" class="form-check-label">Kanak-kanak / Keluarga</label>
                                                            <input required class="form-check-input" type="checkbox" name="kanak_kanak" id="kanak_kanak">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="pengembaraan" class="form-check-label">Pengembaraan</label>
                                                            <input required class="form-check-input" type="checkbox" name="pengembaraan" id="pengembaraan">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="epik" class="form-check-label">Epik / Sejarah</label>
                                                            <input required class="form-check-input" type="checkbox" name="epik" id="epik">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="perang" class="form-check-label">Perang</label>
                                                            <input required class="form-check-input" type="checkbox" name="perang" id="perang">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="fantasi" class="form-check-label">Fantasi</label>
                                                            <input required class="form-check-input" type="checkbox" name="fantasi" id="fantasi">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="komedi" class="form-check-label">Komedi</label>
                                                            <input required class="form-check-input" type="checkbox" name="komedi" id="komedi">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="seram" class="form-check-label">Seram</label>
                                                            <input required class="form-check-input" type="checkbox" name="seram" id="seram">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="western" class="form-check-label">Western</label>
                                                            <input required class="form-check-input" type="checkbox" name="western" id="western">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="romantik" class="form-check-label">Romantik</label>
                                                            <input required class="form-check-input" type="checkbox" name="romantik" id="romantik">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="jenayah" class="form-check-label">Jenayah & Gangster</label>
                                                            <input required class="form-check-input" type="checkbox" name="jenayah" id="jenayah">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="muzikal" class="form-check-label">Muzikal</label>
                                                            <input required class="form-check-input" type="checkbox" name="muzikal" id="muzikal">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="dokumentari" class="form-check-label">Dokumentari</label>
                                                            <input required class="form-check-input" type="checkbox" name="dokumentari" id="dokumentari">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="misteri" class="form-check-label">Misteri</label>
                                                            <input required class="form-check-input" type="checkbox" name="misteri" id="misteri">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-4">
                                                <label for="mutiara_kata" class="form-label">Mutiara kata kegemaran</label>
                                                <textarea placeholder="Masukkan mutiara kata kegemaran anda" required name="mutiara_kata" id="mutiara_kata" class="form-control" rows="5"></textarea>
                                            </div>
                                        </fieldset>
                                        <div class="form-check m-4">
                                            <label for="checkmark_betul" class="form-check-label">Adakah maklumat yang
                                                anda isi adalah betul?</label>
                                            <input required class="form-check-input" type="checkbox" name="checkmark_betul" id="checkmark_betul">
                                        </div>
                                        <fieldset>
                                            <legend>Peranti Dimiliki</legend>
                                            <div class="container-fluid">
                                                <div class="row"><p>Genre Filem Kegemaran (Klik pada kotak yang berkenaan. Anda boleh klik lebih daripada satu)</p></div>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="form-check m-4">
                                                            <label for="smartphone" class="form-check-label">Smartphone</label>
                                                            <input required class="form-check-input" type="checkbox" name="peranti[]" id="smartphone">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="laptop" class="form-check-label">Laptop</label>
                                                            <input required class="form-check-input" type="checkbox" name="peranti[]" id="laptop">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="tablet" class="form-check-label">Tablet</label>
                                                            <input required class="form-check-input" type="checkbox" name="peranti[]" id="tablet">
                                                        </div>
                                                        <div class="form-check m-4">
                                                            <label for="lain" class="form-check-label">Lain-lain</label>
                                                            <input required class="form-check-input" type="checkbox" name="peranti[]" id="lain">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>

                                        <!-- FORM BUTTON BEGIN -->
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" name="hantar" class="btn btn-primary w-100 shadow-lg py-4"><i class="fa-solid fa-paper-plane"></i><span class="ms-2">Hantar</span></button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="reset" name="reset" class="btn btn-danger w-100 shadow-lg py-4"><i class="fa-solid fa-arrow-rotate-right"></i><span class="ms-2">Reset</span></button>
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