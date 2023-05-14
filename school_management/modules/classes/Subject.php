<?php

require 'Main.php';

class Subject extends Main
{
    /**
     * @var int
     */

    public $ID = 0;

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

    public function Subject($data = [])
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
     * Method to set subject data
     * @param $data
     */

    public function setData($data)
    {
        $this->name = isset($data['name']) ? $data['name'] : '';
        $date = date("Y-m-d H:i:s");
        $this->created = $this->modified = $date;
    }

    /**
     * Method to add new subject record
     */
    public function add()
    {
        $data = [
            'name' => $this->name,
            'created' => $this->created,
            'modified' => $this->modified
        ];
        if (Main::insertData('subjects', $data)) {
            $this->response['status'] = true;
            $this->response['message'] = RECORD_SAVED;
        } else {
            $this->response['status'] = false;
            $this->response['message'] = RECORD_SAVED_ERROR;
        }
        return Main::returnJson($this->response);
    }

    /**
     * Method to edit subject record
     */

    public function edit()
    {
        $data = [
            'name' => $this->name,
            'modified' => $this->modified
        ];

        $condition = ['id' => $this->ID];
        if (Main::updateData('subjects', $data, $condition)) {
            $this->response['status'] = true;
            $this->response['message'] = RECORD_UPDATED;
        } else {
            $this->response['status'] = false;
            $this->response['message'] = RECORD_UPDATED_ERROR;
        }
        return Main::returnJson($this->response);
    }

    /**
     * Method to delete subject record
     */

    public function delete()
    {
        global $dbConn;
        $query = "DELETE FROM " . DB_PREFIX . "subjects WHERE id=" . $this->ID;
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
     * Method to get subject detail
     */

    public function getDetail()
    {
        global $dbConn;
        $query = "SELECT * FROM " . DB_PREFIX . "subjects WHERE id = " . $this->getID();
        $resQuery = $dbConn->query($query);
        return $resQuery->fetch_assoc();
    }

    /**
     * Method to get subjects
     */

    public function getSubjects()
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
            $searchValue = trim(strtolower($searchValue)) == 'active' ? '1' : trim(strtolower($searchValue)) == 'inactive' ? 'inactive' : $searchValue;
            $searchQuery = " and ( name like '%" . $searchValue . "%') ";
        }

        ## Total number of records without filtering
        $sel = mysqli_query($dbConn, "select count(*) as allcount from " . DB_PREFIX . "subjects");
        $records = mysqli_fetch_assoc($sel);
        $totalRecords = $records['allcount'];

        ## Total number of record with filtering
        $sel = mysqli_query($dbConn, "select count(*) as allcount from " . DB_PREFIX . "subjects WHERE 1 " . $searchQuery);
        $records = mysqli_fetch_assoc($sel);
        $totalRecordwithFilter = $records['allcount'];

        ## Fetch records
        $subjectQuery = "select * from " . DB_PREFIX . "subjects WHERE 1 " . $searchQuery . " order by " . $columnName . " " . $columnSortOrder . " limit " . $row . "," . $row_per_page;
        $subjectRecords = mysqli_query($dbConn, $subjectQuery);
        $data = array();

        while ($row = mysqli_fetch_assoc($subjectRecords)) {
            $data[] = array(
                "id" => $row['id'],
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
}
