<?php

class User {

    private $db;

    function __construct($DBH) {
        $this->db = $DBH;
    }

    public function register() {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $STH = $this->db->prepare("INSERT INTO users (username, password) values (:username, :hash)");

            $STH->bindParam(':username', $username);
            $STH->bindParam(':hash', $hash);

            $STH->execute();
            echo "got it";
            $DBH = null;
        } catch (Exception $e) {
            echo 'NO';
        }
    }

    public function login($username) {

        $STH = $this->db->prepare("SELECT * FROM users WHERE username = :username");

        $STH->bindParam(':username', $username);
//$STH->bindParam(':password', $password);

        $STH->execute();

        $DBH = null;

        if ($row = $STH->fetch()) {
            print_r($row['email']);

            if (password_verify($_POST['password'], $row['password'])) {
                echo $_POST['password'];
                echo $row['password'];
                $_SESSION['username'] = $row['username'];
                $url = $_SESSION['username'];
                echo "WELCOME " . $url;
                return true;
            }
        } else {
            return false;
        }
    }

}
