<?php
include_once 'app/database.php';
class User  extends Database{
    
 private $table_name = "users";
        public $id;
        public $email;
        public $name;
        public $password;
    public function register() {
          try {
                $query = "INSERT INTO " . $this->table_name . " (email, name, password) VALUES (:email, :name, :password)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':name', $this->name);
                $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
                $stmt->bindParam(':password', $passwordHash);
                return $stmt->execute();
            } catch (PDOException $e) {
                throw new Exception("Error registering user: " . $e->getMessage());
            }   
    
    } 

   

    public function login(){
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($this->password, $user['password'])) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception("Error logging in: " . $e->getMessage());
        }
    }
}
    