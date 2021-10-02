<?php


namespace classes;


use PDO;
use PDOException;

class DB {

    private $conn = null;

    /**
     * DB constructor.
     */
    public function __construct() {

        try {

            $this->conn = new PDO('mysql:host=localhost;dbname=2do_projekt', "root", "");
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die('Something wrong with DB');
        }
    }


}