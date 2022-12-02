<?php
    class database
    {
        private $host = "127.0.0.1";
        private $dbname = "inmobiliaria_malibu";
        private $username = "root";
        private $password = "";
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