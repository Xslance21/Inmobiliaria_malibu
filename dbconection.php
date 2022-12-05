<?php
    class database
    {
        private $host = "localhost";
        private $dbname = "id19950353_inmobiliaria_malibu";
        private $username = "id19950353_josesafir";
        private $password = "BZ-n9C#P|%e_RC^Q";
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