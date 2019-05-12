<?php

class DB {
    public static function getConnection() {
        $dsn = 'mysql:host=localhost;dbname=mydb';
        $user = 'root';
        $pass = '';
        try {
            $pdo = new PDO($dsn, $user, $pass);
            return $pdo;
        } catch (PDOException $exc) {
            echo 'Erro:' . $exc->getMessage();
        }
    }
}
