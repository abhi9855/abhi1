<?php
    class Connect
    {
        //oop var declaration
    
        private $server = "localhost";
        private $user = "root";
        private $password = "root1234";
        private $dbname = "user";
        private $conn;
    
        // function or method declaration.
        public function connectMySql()
        {
            /** MySqli Connection */
            $conn = new mysqli($this->server, $this->user, $this->password, $this->dbname);
    
            //Status of connection.
            if ($conn->connect_error) {
                die("Not Connected" . $conn->connect_error);
            }
            else {
                //echo "Connected to DataBase";
            }


            /** PDO Connection */
            // try {
            //     $conn = new PDO("mysql:host=$this->server;$this->dbname", $this->user, $this->password);
            //     // set the PDO error mode to exception
            //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //     echo "Connected successfully"; 
            //     }
            // catch(PDOException $e)
            //     {
            //     echo "Connection failed: " . $e->getMessage();
            //     }
                return $conn;
        }
    }
    $obj = new Connect;
    $conn = $obj->connectMySql();
?>
