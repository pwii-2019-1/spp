<?php

    class Conexao {

        private static $host = "mysql:host=localhost;dbname=spp";
        private static $user = 'root';
        private static $password = 'Espa01t009dia';
        
        public static function conectar() {
            try {
                $conexao = new PDO(
                    self::$host,
                    self::$user,
                    self::$password
                );

                return $conexao;
            } catch (PDOException $e) {
                echo "Erro: ".$e->getMessage();
            }
        }
    }    