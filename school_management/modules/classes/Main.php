<?php

/**
 * Main Class
 */

class Main
{
    /**
     * @var
     */
    public $ID;

    /**
     * @var array
     */

    public $response = [
        'status' => false,
        'message' => ''
    ];

    /**
     * @var string
     */
    public $created = "0000-00-00 00:00:00";

    /**
     * @var string
     */
    public $modified = "0000-00-00 00:00:00";

    /**
     * @var
     */
    public $roll_no = "";


    public function __construct()
    {
    }

    /**
     * Method to set ID
     * @param $id
     */

    public function setID($id)
    {
        $this->ID = $id;
    }

    /**
     * Method to get ID
     * @return mixed
     */

    public function getID()
    {
        return $this->ID;
    }

    /**
     * Method to insert single record
     * @param $table
     * @param $data
     * @return bool|mysqli_result
     */
    public static function insertData($table, $data)
    {
        global $dbConn;
        $keys = $values = "";
        $i = 0;
        foreach ($data as $key => $value) {
            $keys .= ($i == (sizeof($data) - 1)) ? "`{$key}`" : "`{$key}`,";
            $values .= ($i == (sizeof($data) - 1)) ? "'{$value}'" : "'{$value}',";
            $i++;
        }
        $query = "INSERT INTO `" . DB_PREFIX . "{$table}` ({$keys}) VALUES ({$values})";
        return $dbConn->query($query);
    }

    /**
     * Method to insert bulk record
     * @param $table
     * @param $data
     * @return bool|mysqli_result
     */

    public static function insertBulk($table, $data)
    {
        global $dbConn;
        $query = "";
        foreach ($data as $value) {
            $keys = $values = "";
            $i = 0;
            foreach ($value as $key => $val) {
                $keys .= ($i == (sizeof($value) - 1)) ? "`{$key}`" : "`{$key}`,";
                $values .= ($i == (sizeof($value) - 1)) ? "'{$val}'" : "'{$val}',";
                $i++;
            }

            $query .= "INSERT INTO {$table} {$keys} {$values}";
        }
        return $dbConn->query($query);
    }

    /**
     * Method to update single record data
     * @param $table
     * @param $data
     * @param $condition
     * @return bool|mysqli_result
     */

    public static function updateData($table, $data, $condition)
    {
        global $dbConn;
        $query = $set = $where = "";
        $i = 0;
        foreach ($data as $key => $value) {
            $set .= ($i == (sizeof($data) - 1)) ? "`{$key}` = '" . $value . "'" : "`{$key}` = '" . $value . "',";
            $i++;
        }
        foreach ($condition as $key => $value) {
            $where .= "`{$key}` = '" . $value . "'";
        }
        $query .= "UPDATE `" . DB_PREFIX . $table . "` SET " . $set . " WHERE " . $where;
        return $dbConn->query($query);
    }

    /**
     * Method to update bulk data
     * @param $table
     * @param $data
     * @param $condition
     */

    public static function updateBulk($table, $data, $condition)
    {

    }

    /**
     * Method to upload file
     * @param $fileArray
     * @param $folder
     */

    public function uploadFile($fileArray, $path)
    {
        if (move_uploaded_file($fileArray['tmp_name'], $path . '/' . $fileArray['name'])) {
            return $fileArray['name'];
        } else {
            return '';
        }
    }

    /**
     * Method to create random password
     * @return string
     */

    public static function createPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    /**
     * Method to create json from array and return to the caller
     * @param $data
     * @return false|string
     */

    public static function returnJson($data)
    {
        if (empty($data))
            return false;

        return json_encode($data);
    }

    /**
     * Method to get records
     * @param $query
     * @return bool|mysqli_result
     */

    public static function select($query)
    {
        global $dbConn;
        return $dbConn->query($query);
    }

    /**
     * Method to get class list
     * @return array
     */

    public static function _getClassList()
    {
        $query = "SELECT * FROM " . DB_PREFIX . "classes";
        $res = Main::select($query);
        $classList = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $classList[$row['id']] = $row['name'];
            }
        }
        return $classList;
    }

    /**
     * Method to get subject list
     * @return array
     */

    public static function _getSubjectList()
    {
        $query = "SELECT * FROM " . DB_PREFIX . "subjects";
        $res = Main::select($query);
        $subjectList = [];
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $subjectList[$row['id']] = $row['name'];
            }
        }
        return $subjectList;
    }
}