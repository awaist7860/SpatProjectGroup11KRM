<?php

class Database {
    /**
     * @var Database
     */
    protected static $_dbInstance = null;

    /**
     * @var PDO
     */
    protected $_dbHandle;

    /**
     * @return Database
     */
    public static function getInstance() {

//        $username ='sgb849';
//        $password = 'f1m9mHBhjktiNqf';
//        $host = 'poseidon.salford.ac.uk';
//        $dbName = 'sgb849';

        $username ='hc21-11';
        $password = 'j5zuR5rjKDGitbd';
        $host = 'poseidon.salford.ac.uk';
        $dbName = 'hc21_11';

//        $host = "82.19.89.2";
//        $username ='SA';
//        $password = 'Hamzah8378';
//        $dbName = 'TestDatabse';

       //Awais Personel server

       if(self::$_dbInstance === null) { //checks if the PDO exists
            // creates new instance if not, sending in connection info
            self::$_dbInstance = new self($username, $password, $host, $dbName);
        }
        return self::$_dbInstance;
    }

    /**
     * @param $username
     * @param $password
     * @param $host
     * @param $database
     */
    private function __construct($username, $password, $host, $database) {
        try { 
            $this->_dbHandle = new PDO("mysql:host=$host;dbname=$database",  $username, $password); // creates the database handle with connection info
        //$this->_dbHandle = new PDO('mysql:host=' . $host . ';dbname=' . $database,  $username, $password); // creates the database handle with connection info
            /**
             * The first setAttribute() line, which tells PDO to disable emulated prepared statements and use real prepared statements. This makes sure the statement and the values aren't parsed by PHP before sending it to the MySQL server (giving a possible attacker no chance to inject malicious SQL).
             */
            $this->_dbHandle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->_dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch (PDOException $e) { // catch any failure to connect to the database
	    echo $e->getMessage();
	}
    }

    /**
     * @return PDO
     */
    public function getdbConnection() {
        return $this->_dbHandle; // returns the PDO handle to be used                                        elsewhere
    }

    public function __destruct() {
        $this->_dbHandle = null; // destroys the PDO handle when nolonger needed                                        longer needed
    }
}
