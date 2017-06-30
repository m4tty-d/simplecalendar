<?php

class Database {

    private static $db_instance = NULL;

    // theese are disabled, because only one instance is required

    private function __contructor() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance() {

        if( !isset(self::$db_instance) ) {

            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            );
            try {

                self::$db_instance = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);

            } catch(PDOException $e) {

                die("Database connection failed: " . $e->getMessage());

            }
        }

        return self::$db_instance;
    }

}