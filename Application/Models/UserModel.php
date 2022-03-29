<?php
    include_once "connectDB.php";
    class User{
        public $id;
        public $username;
        public $password;
        
        function __construct($id,$username,$password){
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
        }

        public static function index(){

        }


        public static function register($username, $password){
            // echo("kek");
            $conn = Database::getConnection();
            //check is username existed?
            $sql = 'SELECT * FROM users WHERE username = :username';
            $statement =  $conn->prepare($sql);
            $statement->execute([
                ':username' => $username
            ]);
            $response = $statement->fetchColumn();
            if($response)
            {   
                return false;
            }
            else{
                //in1sert into DB
                $sql1 = 'INSERT INTO users(username, password) VALUES (:username , :password)';
                // die($sql);
                $statement = $conn->prepare($sql1);
                $statement->execute([
                    ':username' => $username,
                    ':password' => $password
                ]);
                $publisher_id = $conn->lastInsertId();
                // die($publisher_id);
                // echo 'The publisher id ' . $publisher_id . ' was inserted';
                return $publisher_id;
            }
        }

        public static function login($username,$password)
        {
            $conn = Database::getConnection();
            $sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
            $statement =  $conn->prepare($sql);
            $statement->execute([
                ':username' => $username,
                ':password' => $password
            ]);
            $count = $statement->fetchColumn();
            return $count;
        }

        public static function getAllUsers()
        {
            $conn = Database::getConnection();
            $listUsers = [];
            $sql = 'SELECT * FROM users';
            $statement = $conn->query($sql);
            foreach ($statement->fetchAll() as $user) {
                $list[] = new User($user['id'], $user['username'], $user['password']);
            }
            return $list;
        }
    }

?>