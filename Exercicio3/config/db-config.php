<?php

    class DBController {
        private $hostname       =       "localhost";
        private $username       =       "root";
        private $password       =       "123456";
        private $db             =       "cruddb_organizacoes";

        public function connect() {

            $conn               =       new mysqli($this->hostname, $this->username, $this->password, $this->db)or die("Database connection error." . $conn->connect_error);

            return $conn;           
        }

        public function close($conn) {
            $conn->close();
        }

    }
?>