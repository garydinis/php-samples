<?php
//start a session
$session = session_start();

print "Session is $session" . PHP_EOL;

//session variables
$_SESSION['name'] = "myname";
$_SESSION['email'] = "myname@myemail.com";

print_r($_SESSION);

//unsetting a session variable
if (isset($_SESSION['email'])) {
    unset($_SESSION['email']);
}
print_r($_SESSION);
//end a session
session_destroy();

class Session {
    protected $db;

    public function __construct($db) {
        $this->db = db;
        
        session_set_save_handler(
            array($this, "_open"),
            array($this, "_close"),
            array($this, "_read"),
            array($this, "_write"),
            array($this, "_destroy"),
            array($this, "_gc")
        );
        session_start();
    }

    public function _open() {
        if ($this->db) {
            return true;
        }
        return false;
    }

    public function _read($id) {
        $sql = $this->db->query("SELECT data FROM sessions id = :id");
        $res = $this->db->execute($sql, ["id" => $id]);
        $data = $this->db->fetch($res);
        if (!empty($data)) {
            return $data;
        } else {
            return "";
        }
    }
}