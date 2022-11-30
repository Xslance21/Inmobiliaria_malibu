<?php
    class database
    {
        private $host = "localhost";
        private $dbname = "inmobiliaria_malibu";
        private $username = "root";
        private $password = "Blue1216";
        private $charset = "utf8";

        public function connect(){
            $connection = "mysql: host=".$this->host."; dbname=".$this->dbname."; charset=".$this->charset;
            $option= [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
            try{
                $pdo =  new PDO($connection,$this->username,$this->password,$option);
                return $pdo;
            }catch(PDOException $e){
                return "Error: ".$e->getMessage();
                die();
            }
        }
    }
?>