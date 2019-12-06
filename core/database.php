<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

class database {

    public static function load($DB) {
        return new database($DB);
    }

    public function __construct($DB) {
        try {
            $this->pdo = new PDO(
                    "mysql:host={$DB['HOSTNAME']};dbname={$DB['DATABASE']}",
                    $DB['USERNAME'],
                    $DB['PASSWORD'],
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql_statement, $mode = 'DEFAULT') {
        $result = $this->pdo->prepare($sql_statement);
        $result->execute();
        if ($mode == 'DEFAULT') {
            return $result->fetchAll();
        } elseif ($mode == 'NAME') {
            return $result->fetchAll(PDO::FETCH_NAMED);
        } elseif ($mode == 'NUMBER') {
            return $result->fetchAll(PDO::FETCH_NUM);
        } else {
            return null;
        }
    }

    public function insertQuery($sql_statement) {
        return $this->pdo->exec($sql_statement);
    }

}
