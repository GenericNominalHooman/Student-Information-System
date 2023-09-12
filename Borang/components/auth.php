<?php
// PROJECTS CONFIG BEGIN
$projects_config_file = $_SERVER["DOCUMENT_ROOT"] . "/projects_config.php";
if (file_exists($projects_config_file)) {
    require_once($projects_config_file);
}
// PROJECTS CONFIG ENDS
require_once(BORANG_DIR . "/site_config.php"); // Import site configuration
require_once(BORANG_COMPONENTS_DIR . "/config.php"); // Import header
require_once(COMPONENTS_DIR . "/sanitize.php"); // Import sanitize
require_once(BORANG_COMPONENTS_DIR . "/config.php"); // Import config
require_once(COMPONENTS_DIR . "/redirect.php"); // Import redirect
?>
<?php
class Auth{
    public $conn;
    
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($username, $password, $role){
        // Sanitize user input
        $username = Sanitize::sanitize($username);
        $password = Sanitize::sanitize($password);
        $role = Sanitize::sanitize($role);
        
        // Verify input

        // Password hashing
        $password_hash = password_hash($this->conn, $password);

        // Add new user entry into DB
        mysqli_query($this->conn, "INSERT INTO pengguna(username, password_hash, role) VALUES('NULL', '".$password_hash."', '".$role."')");

        // Login user
        $this->login($username, $password);
    }

    public function login($username, $password){
        // Sanitize
        $username = Sanitize::sanitize($username);
        $password = Sanitize::sanitize($password);
        
        // Verify with db
        $password_hash = mysqli_query($this->conn, "SELECT password_hash FROM pengguna WHERE username='".$username."'");
        if(password_verify($password, $password_hash)){
            // Redirect user
            Redirect::redirectPOST(BORANG_URL."/borang.php", []);
        }else{
            // Redirect user to login page with error message
            Redirect::redirectPOST(BORANG_URL."/login.php", ["msg" => "Kata laluan atau nama pengguna yang anda masukkan salah"]);
        }

    }
    }
?>