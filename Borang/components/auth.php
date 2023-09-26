<?php
session_start();

// PROJECTS CONFIG BEGIN
$projects_config_file = $_SERVER["DOCUMENT_ROOT"] . "/projects_config.php";
if (file_exists($projects_config_file)) {
    require_once($projects_config_file);
}
// PROJECTS CONFIG ENDS
require_once(BORANG_DIR . "/site_config.php"); // Import site configuration
require_once(COMPONENTS_DIR . "/sanitize.php"); // Import sanitize
?>
<?php
class Auth
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($username, $password, $role)
    {
        var_dump($username);
        // Sanitize user input
        $username = Sanitize::mysqli_safe(Sanitize::sanitize($username), $this->conn);
        $password = Sanitize::mysqli_safe(Sanitize::sanitize($password), $this->conn);
        $role = Sanitize::mysqli_safe(Sanitize::sanitize($role), $this->conn);

        // Verify input

        // Password hashing
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Add new user entry into DB
        return mysqli_query($this->conn, "INSERT INTO pengguna(username, password_hash, role) VALUES('" . $username . "', '" . $password_hash . "', '" . $role . "')") ? true : false;
    }

    public function login($username, $password)
    {
        // Sanitize user input
        $username = Sanitize::mysqli_safe($username, $this->conn);
        $password = Sanitize::mysqli_safe($password, $this->conn);

        // Verify with db
        $query = mysqli_query($this->conn, "SELECT * FROM pengguna WHERE username='" . $username . "'");
        $mysqliResult = mysqli_fetch_assoc($query);
        $password_hash = $mysqliResult["password_hash"];
        $role = $mysqliResult["role"];
        $id = $mysqliResult["id"];
        if (password_verify($password, $password_hash)) {
            // Set session variables
            $_SESSION["auth"] = [
                "username" => $username,
                "role" => $role,
                "id" => $id,
            ];
            return true;
        } else {
            return false;
        }
    }
}
?>