<?php

    class Conexao {
        private $host = 'localhost';
        private $dbname = 'mydb';
        private $user = 'root';
        private $password = '';

        public function conectar() {
            try {
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->password"
                );

                return $conexao;
            } catch (PDOException $e) {
                echo "Erro: ".$e->getMessage()." Código: ".$e->getCode();
            }
        }
    }
