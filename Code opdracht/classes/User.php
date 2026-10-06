<?php
    // Functie: classdefinitie User 
    // Auteur: Simon

    session_start();

    class User{

        // Eigenschappen 
        public string $username = "";
        public string $email = "";
        private string $password = "";

        function connectdb() {
            
            define("DATABASE", "login");
            define("SERVERNAME", "localhost");
            define("USERNAME", "root");
            define("PASSWORD", "");

            define("CRUD_TABLE", "users");
            $servername = SERVERNAME;
            $username = USERNAME;
            $password = PASSWORD;
            $dbname = DATABASE;
        
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                //echo "Connected successfully";
                return $conn;
            } 
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        
        function setPassword($password){
            $this->password = $password;
        }
        function getPassword(){
            return $this->password;
        }

        public function showUser() {
            echo "<br>Username: $this->username<br>";
            echo "<br>Password: $this->password<br>";
            echo "<br>Email: $this->email<br>";
            
        }

        public function registerUser() : array {
            $status = false;
            $errors=[];
            if($this->username != ""){

                // Check user exist in database
                $conn = $this->connectdb();
                $sql = "SELECT COUNT(*) users WHERE username = $this->username";
                $query = $conn->prepare($sql);
                $query->execute();
                $result = $query->fetch();
                if($result == 1){
                    array_push($errors, "Username bestaat al.");
                } else {
                    // username opslaan in tabel login
                    // INSERT INTO `user` (`username`, `password`, `role`) VALUES ('kjhasdasdkjhsak', 'asdasdasdasdas', '');
                    // Manier 1
                    $conn = $this->connectdb();
                    $sql = "INSERT INTO `user` (`username`, `password`, `role`) VALUES ('kjhasdasdkjhsak', 'asdasdasdasdas', '')";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $result = $query->fetch();
                    $status = true;
                } 
            }
            return $errors;
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

        public function loginUser(): bool {

            $conn = $this->connectdb();
            $sql = "SELECT * users WHERE username = $this->username";
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetch();

            if ($query->rowCount() == 1) {
                if(password_verify($this->password, $result["password"])) {
                    
                    $_SESSION['gebruiker'] = $this->username;
                    return true;

                } else {
                    return false;
                }
            } else {
                return false;
            }

            // Zoek user in de table user met username = $this->username
            // Doe SELECT * from user WHERE username = $this->username


            // Indien gevonden EN password klopt dan sessie vullen

            // Return true indien gelukt anders false
        }

        // Check if the user is already logged in
        public function isLoggedin(): bool {
            if (isset($_SESSION['gebruiker'])) {
                return true;
            } else {
                return false;
            }
        }

        public function getUser(string $username): bool {
            // Connect database

		    // Doe SELECT * from user WHERE username = $username

            if (false){
                //Indien gevonden eigenschappen vullen met waarden uit de SELECT
                $this->username = 'Waarde uit de database';
                return true;
            } else {
                return false;
            }   
        }

        public function logout(){
            session_start();
            // remove all session variables
            session_unset();
            session_destroy();
            // destroy the session
            

        }


    }

?>