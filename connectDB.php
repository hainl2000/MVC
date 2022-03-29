<?php
    //get db config
    include_once './Application/Configs/database.php';
    class Database
    {
        
        private static $conn = NULL;
        

        public static function getConnection(){
            $connectInformation = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME ;
            if(!isset(self::$conn)) {
                try {
                    // Create connection by PDO
                    self::$conn= new PDO($connectInformation, DB_USER, DB_PASSWORD);
                    self::$conn->exec("SET NAMES 'utf8'");
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
                }catch(PDOException $e){
                    die("Error: " . $e);   
                }
            }
            return self::$conn;
        }
    }
 
?>