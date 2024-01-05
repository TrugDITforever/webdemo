<?php
class Database {
    private $db_user = "root";
    private $db_pass = "";
    private $db_server = "mysql:host=localhost;dbname=useraccount";
    private $con;
    public function __construct() {
        try {
            $this->con = new PDO($this->db_server, $this->db_user, $this->db_pass);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function getConnection() {
        return $this->con;
    }
}
?>
<?php 
  $db_user="root";
  $db_pass="";
  $db_server="mysql:host=localhost; dbname=useraccount";
  $con= new PDO($db_server,$db_user,$db_pass);
 ?>