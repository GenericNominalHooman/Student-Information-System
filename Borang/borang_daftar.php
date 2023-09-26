<?php
// PROJECTS CONFIG BEGIN
$projects_config_file = $_SERVER["DOCUMENT_ROOT"] . "/projects_config.php";
if (file_exists($projects_config_file)) {
    require_once($projects_config_file);
}
// PROJECTS CONFIG ENDS
require_once(BORANG_DIR . "/site_config.php"); // Import site configuration
require_once(COMPONENTS_DIR . "/header_bootstrap.php"); // Import header
require_once(BORANG_COMPONENTS_DIR . "/navbar.php"); // Import navbar
require_once(BORANG_COMPONENTS_DIR . "/auth.php"); // Import auth module
require_once(BORANG_COMPONENTS_DIR . "/redirect_if_not_guest.php"); // Import auth module
?>

<!-- CONTENT BEGIN -->

<!-- Jquery begin -->
<script>
    $(document).ready(function() {
        function validate(e) {
            let username = $("#username").val();
            let password = $("#password").val();
            let password_confirmation = $("#password_confirmation").val();
            let role = $("#role").val();

            // Check whether username/password is filled out
            if (username == '' && password == '' &&  password_confirmation == '' && role == '') {
                window.alert("Sila isi setiap medan infomasi pendaftaran");
                return false;
            } else {
                // Check whether each field is empty
                if (username == '') {
                    window.alert("Username tidak diisi");
                } else if (password == '') {
                    window.alert("Password tidak diisi");
                } else if (password_confirmation == '') {
                    window.alert("Password tidak diisi");
                } else if (role == '') {
                    window.alert("Jenis pengguna tidak dipilih");
                }

                // Check whether each field is valid
                console.log(username.match(/^[a-zA-Z0-9_\ ]+$/));
                if (!username.match(/^[a-zA-Z0-9_\ ]+$/)) {
                    window.alert("Maaf, hanya huruf, ruang kosong dan _ sahaja dibenarkan");
                } else if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/)) {
                    window.alert("Maaf, password mesti mempunyai 1 huruf besar, 1 huruf kecil, 1 simbol dan tanpa ruang kosong");
                } else if (password_confirmation != password) {
                    window.alert("Kata kunci yang diisi tidak sama");
                }
            }
        }

        $(document).on("submit", "#register_form", validate);
    });
</script>
<!-- Jquery ends -->

<div class="container-fluid !direction !spacing ">
    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col-1-1 text-center">
            <h1>Sistem Maklumat Pelajar</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-11 col-md-8 m-md-2 p-4 shadow-lg rounded">
            <form id="register_form" action="daftar.php" method="POST" class="row g-3 needs-validation">
                <div class="col-12 text-center">
                    <h2>Pendaftaran Akaun Pengguna</h2>
                    <hr>
                </div>
                <div class="col-12">
                    <label for="username" class="form-label">Nama pengguna</label>
                    <input type="text" class="form-control" id="username" value="" name="username" required>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Kata laluan</label>
                    <input type="password" class="form-control" id="password" value="" name="password" required>
                </div>
                <div class="col-12">
                    <label for="password_confirmation" class="form-label">Kata laluan pengesahan</label>
                    <input type="password" class="form-control" id="password_confirmation" value="" name="password_confirmation" required>
                </div>
                <div class="col-12">
                    <div class="form-group m-4">
                        <label for="role" class="form-label"> Jenis pengguna: </label>
                        <select required class="dropdown form-control-sm" id="role" name="role">
                            <div class="dropdown-menu">
                                <option value="" class="dropdown-item" selected disabled>
                                    Jenis pengguna
                                </option>
                                <option value="admin" class="dropdown-item">
                                    Pentadbir
                                </option>
                                <option value="lecturer" class="dropdown-item">
                                    Pensyarah
                                </option>
                                <option value="student" class="dropdown-item">
                                    Student
                                </option>
                            </div>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-muted">Anda sudah mempunyai akaun? <a href="<?php echo(BORANG_URL."/index.php");?>">Klik di sini</a></p>
                </div>

                <div class="col-12">
                    <button id="register" name="register" class="btn btn-primary w-100 p-4" type="submit">Daftar Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- CONTENT ENDS -->

<?php
// IMPORT FOOTER BEGIN
require_once(COMPONENTS_DIR . "/footer_bootstrap.php"); // Import navbar
// IMPORT FOOTER ENDS
?>