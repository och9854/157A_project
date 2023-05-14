<?php

require 'Main.php';

class Section extends Main
{
    /**
     * @var int
     */

    public $ID = 0;

    /**
     * @var int
     */

    public $class_id = 0;

    /**
     * @var string
     */
    public $name = "";

    /**
     * @var string
     */
    public $created = "0000-00-00 00:00:00";

    /**
     * @var string
     */
    public $modified = "0000-00-00 00:00:00";

    /**
     * Construct Method
     * @param array $data
     */

    public function Section($data = [])
    {
        if (empty($data)) {
            return;
        }

        $data = trimArray($data);

        if (isset($data['id'])) {
            /** @var TYPE_NAME $id */
            $this->ID = $data['id'];
        }

        $this->setData($data);
    }

    /**
     * Method to set section data
     * @param $data
     */

    public function setData($data)
    {
        $this->name = isset($data['name']) ? $data['name'] : '';
        $this->class_id = isset($data['class_id']) ? $data['class_id'] : '';
        $date = date("Y-m-d H:i:s");
        $this->created = $this->modified = $date;
    }

    /**
     * Method to add new section record
     */
    public function add()
    {
        $data = [
            'name' => $this->name,
            'class_id' => $this->class_id,
            'created' => $this->created,
            'modified' => $this->modified
        ];
        if (Main::insertData('sections', $data)) {
            $this->response['status'] = true;
            $this->response['message'] = RECORD_SAVED;
        } else {
            $this->response['status'] = false;
            $this->response['message'] = RECORD_SAVED_ERROR;
        }
        return Main::returnJson($this->response);
    }

    /**
     * Method to edit section record
     */

    public function edit()
    {
        $data = [
            'class_id' => $this->class_id,
            'name' => $this->name,
            'modified' => $this->modified
        ];

        $condition = ['id' => $this->ID];
        if (Main::updateData('sections', $data, $condition)) {
            $this->response['status'] = true;
            $this->response['message'] = RECORD_UPDATED;
        } else {
            $this->response['status'] = false;
            $this->response['message'] = RECORD_UPDATED_ERROR;
        }
        return Main::returnJson($this->response);
    }

    /**
     * Method to delete section record
     */

    public function delete()
    {
        global $dbConn;
        $query = "DELETE FROM " . DB_PREFIX . "sections WHERE id=" . $this->ID;
        if ($dbConn->query($query)) {
            $this->response['status'] = true;
            $this->response['message'] = RECORD_DELETED;
        } else {
            $this->response['status'] = false;
            $this->response['message'] = ERROR;
        }
        return Main::returnJson($this->response);
    }

    /**
     * Method to get section detail
     */

    public function getDetail()
    {
        global $dbConn;
        $query = "SELECT * FROM " . DB_PREFIX . "sections WHERE id = " . $this->getID();
        $resQuery = $dbConn->query($query);
        return $resQuery->fetch_assoc();
    }

    /**
     * Method to get sections
     */

    public function getSections()
    {
        global $dbConn;
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $row_per_page = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = mysqli_real_escape_string($dbConn, $_POST['search']['value']); // Search value

        ## Search
        $searchQuery = " ";
        if ($searchValue != '') {
            $searchQuery = " and ( name like '%" . $searchValue . "%') ";
        }

        ## Total number of records without filtering
        $sel = mysqli_query($dbConn, "select count(*) as allcount from " . DB_PREFIX . "sections");
        $records = mysqli_fetch_assoc($sel);
        $totalRecords = $records['allcount'];

        ## Total number of record with filtering
        $sel = mysqli_query($dbConn, "select count(*) as allcount from " . DB_PREFIX . "sections WHERE 1 " . $searchQuery);
        $records = mysqli_fetch_assoc($sel);
        $totalRecordwithFilter = $records['allcount'];

        ## Fetch records
        $subjectQuery = "select * from " . DB_PREFIX . "sections WHERE 1 " . $searchQuery . " order by " . $columnName . " " . $columnSortOrder . " limit " . $row . "," . $row_per_page;
        $subjectRecords = mysqli_query($dbConn, $subjectQuery);
        $data = array();

        while ($row = mysqli_fetch_assoc($subjectRecords)) {
            $data[] = array(
                "id" => $row['id'],
                "class_name" => $this->_getClassName($row['class_id']),
                "name" => $row['name']
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
        return Main::returnJson($response);
    }

    /**
     * Method to get class name by class ID
     * @param $class_ID
     * @return string
     */

    private function _getClassName($class_ID)
    {
        $query = "SELECT * FROM `" . DB_PREFIX . "classes` WHERE `id` = " . $class_ID;
        $res = Main::select($query);
        $result = $res->fetch_object();
        return !empty($result->name) ? $result->name : 0;
    }

    /**
     * Method to get class list
     * @return array
     */

    public function getClassList()
    {
        return Main::_getClassList();
    }
}
