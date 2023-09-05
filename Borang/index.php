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
?>

<!-- CONTENT BEGIN -->

<!-- Jquery begin -->
<script>
    $(document).ready(function(){
        function validate(e){
            let username = $("#username").val();
            let password = $("#password").val();

            // Check whether username/password is filled out
            if(username == '' && password == ''){
                window.alert("Username dan password tidak diisi");
                return false;
            }else{
                if(username == ''){
                    window.alert("Username tidak diisi");
                }else if(password == ''){
                    window.alert("Password tidak diisi");
                }
                return false;
            }
        }

        $("#logMasukBtn").on("click", function(e){
            validate();
        });
    });
</script>
<!-- Jquery ends -->

<div class="container-fluid !direction !spacing ">
    <div class="row justify-content-center mt-4">
        <div class="col-11 col-md-8 m-md-2 p-4 shadow-lg rounded">
            <form action="auth.php" method="POST" class="row g-3 needs-validation">
                <div class="col-12 text-center">
                    <h2>Log Masuk</h2>
                    <hr>
                </div>
                <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value="" name="username" required>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" value="" name="password" required>
                </div>
                <div class="col-12">
                    <button id="logMasukBtn" class="btn btn-primary" type="submit">Log Masuk</button>
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