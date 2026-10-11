<?php
    // Functie: classdefinitie User 
    // Auteur: Simon

    class Database {
        
        protected const DATABASE   = "login";
        protected const SERVERNAME = "localhost";
        protected const USERNAME   = "root";
        protected const PASSWORD   = "";
        protected const TABLE      = "users";

        public string $username = "";
        public string $email = "";
        protected string $password = "";

        function connectdb() {
            $conn = new PDO(
                "mysql:host=" . self::SERVERNAME . ";dbname=" . self::DATABASE . ";charset=utf8mb4",
                self::USERNAME,
                self::PASSWORD
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        }
    }
    class User extends Database{
        private function startSession(): void {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }
        
        function setPassword($password){
            $this->password = $password;
        }
        function getPassword(){
            return $this->password;
        }

        public function showUser() {
            echo "<br>Username: " . htmlspecialchars($this->username) . "<br>";
            echo "<br>Email: " . htmlspecialchars($this->email) . "<br>";
        }

        function validateUser(){
            $errors=[];

            if (empty($this->username)){
                array_push($errors, "Invalid username");
            } else if (empty($this->password)){
                array_push($errors, "Invalid password");
            } else if (strlen($this->username) < 3) {
                array_push($errors, "Invalid username");
            } else if (strlen($this->username) > 50) {
                array_push($errors, "Invalid username");
            }
            
            return $errors;
        }

        public function registerUser() : array {
            $errors = $this->validateUser();
            if (count($errors) > 0) {
                return $errors;
            }

            try {
                $conn = $this->connectdb();

                // Bestaat de username al?
                $sql = "SELECT COUNT(*) FROM `" . self::TABLE . "` WHERE username = :username";
                $query = $conn->prepare($sql);
                $query->execute([':username' => $this->username]);

                if ($query->fetchColumn() > 0) {
                    $errors[] = "Username bestaat al.";
                    return $errors;
                }

                $sql = "INSERT INTO `" . self::TABLE . "` (`username`, `password_hash`) 
                        VALUES (:username, :password_hash)";
                $query = $conn->prepare($sql);
                $query->execute([
                    ':username'      => $this->username,
                    ':password_hash' => password_hash($this->password, PASSWORD_DEFAULT)
                ]);

            } catch (PDOException $e) {
                $errors[] = "Database fout: " . $e->getMessage();
            }

            return $errors;
        }

        public function loginUser(): bool {
            if ($this->username === "" || $this->password === "") {
                return false;
            }

            try {
                $conn = $this->connectdb();
                $sql = "SELECT * FROM `" . self::TABLE . "` WHERE username = :username";
                $query = $conn->prepare($sql);
                $query->execute([':username' => $this->username]);
                $result = $query->fetch();
            } catch (PDOException $e) {
                return false;
            }

            // Gebruiker gevonden EN wachtwoord klopt?
            if ($result && password_verify($this->password, $result["password_hash"])) {
                $this->startSession();
                session_regenerate_id(true); // beveiliging tegen session fixation
                $_SESSION['gebruiker'] = $this->username;
                return true;
            }

            return false;
        }

        // Check if the user is already logged in
        public function isLoggedin(): bool {
            $this->startSession();
            return isset($_SESSION['gebruiker']);
        }

        public function getUser(string $username): bool {
            try {
                $conn = $this->connectdb();
                $sql = "SELECT * FROM `" . self::TABLE . "` WHERE username = :username";
                $query = $conn->prepare($sql);
                $query->execute([':username' => $username]);
                $result = $query->fetch();
            } catch (PDOException $e) {
                return false;
            }

            if ($result) {
                $this->username = $result['username'];
                return true;
            }
            return false;
        }

        public function logout(){
            $this->startSession();
            // remove all session variables
            session_unset();
            // destroy the session
            session_destroy();
        }

    }

?>