<?php

class DB
{

    /**
     * @var string
     */
    private static $serverName = SERVER_NAME;

    /**
     * @var string
     */
    private static $username = USER_NAME;

    /**
     * @var string
     */
    private static $password = PASSWORD;

    /**
     * @var string
     */
    private static $db_name = DB_NAME;

    /**
     * @var
     */
    public static $conn;

    private final function __construct()
    {
        // Instantiated only once
    }

    /**
     * Method to create DB connection
     * @return mysqli
     */

    public static function createConnection()
    {
        if (!isset(self::$conn)) {
            self::$conn = new mysqli(self::$serverName, self::$username, self::$password, self::$db_name);
        }

        return self::$conn;
    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

global $dbConn;
$dbConn = DB::createConnection();