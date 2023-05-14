<?php

require 'Main.php';

class Teacher extends Main
{
    /**
     * @var int
     */

    public $ID = 0;

    /**
     * @var string
     */
    public $first_name = "";

    /**
     * @var string
     */
    public $middle_name = "";

    /**
     * @var string
     */
    public $sur_name = "";

    /**
     * @var bool
     */
    public $is_active = 1;

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
    public $profile_pic = "";

    /**
     * @var
     */
    public $contact_no = "";

    /**
     * @var
     */

    public $alternate_contact_no = "";

    /**
     * @var string
     */

    public $path = '../../assets/uploads/';

    /**
     * @var array
     */
    public $subjects = [];

    /**
     * @var int
     */
    public $experience = 0;

    /**
     * Construct Method
     * @param array $data
     */

    public function Teacher($data = [])
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
     * Method to set teacher data
     * @param $data
     */

    public function setData($data)
    {
        $this->first_name = isset($data['first_name']) ? $data['first_name'] : '';
        $this->middle_name = isset($data['middle_name']) ? $data['middle_name'] : '';
        $this->sur_name = isset($data['sur_name']) ? $data['sur_name'] : '';
        $this->contact_no = isset($data['contact_no']) ? $data['contact_no'] : '';
        $this->alternate_contact_no = isset($data['alternate_contact_no']) ? $data['alternate_contact_no'] : '';
        $this->subjects = isset($data['subjects']) ? implode(',', $data['subjects']) : 0;
        $this->experience = isset($data['experience']) ? $data['experience'] : '';

        if (isset($data['file']['pic']['name']) && !empty($data['file']['pic']['name'])) {
            if (!file_exists(UPLOAD_FOLDER . 'teacher')) {
                mkdir(UPLOAD_FOLDER . 'teacher', 0777);
            }

            $this->profile_pic = $this->uploadFile($data['file']['pic'], UPLOAD_FOLDER . 'teacher');
        }

        $date = date("Y-m-d H:i:s");
        $this->created = $this->modified = $date;
    }

    /**
     * Method to add new teacher record
     */
    public function add()
    {
        $contact_no = str_replace('(', '', $this->contact_no);
        $contact_no = str_replace(')', '', $contact_no);
        $contact_no = str_replace('-', '', $contact_no);
        $contact_no = str_replace(' ', '', $contact_no);
        $alternate_contact_no = "";
        if (!empty($this->alternate_contact_no)) {
            $alternate_contact_no = str_replace('(', '', $this->alternate_contact_no);
            $alternate_contact_no = str_replace(')', '', $alternate_contact_no);
            $alternate_contact_no = str_replace('-', '', $alternate_contact_no);
            $alternate_contact_no = str_replace(' ', '', $alternate_contact_no);
        }

        $data = [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'sur_name' => $this->sur_name,
            'password' => Main::createPassword(),
            'contact_no' => $contact_no,
            'alternate_contact_no' => $alternate_contact_no,
            'subjects' => $this->subjects,
            'experience' => $this->experience,
            'profile_pic' => $this->profile_pic,
            'is_active' => $this->is_active,
            'created' => $this->created,
            'modified' => $this->modified
        ];
        if (Main::insertData('teachers', $data)) {
            $this->response['status'] = true;
            $this->response['message'] = RECORD_SAVED;
        } else {
            $this->response['status'] = false;
            $this->response['message'] = RECORD_SAVED_ERROR;
        }
        return Main::returnJson($this->response);
    }

    /**
     * Method to edit teacher record
     */

    public function edit()
    {
        $teacherDetail = $this->getDetail();
        $contact_no = str_replace('(', '', $this->contact_no);
        $contact_no = str_replace(')', '', $contact_no);
        $contact_no = str_replace('-', '', $contact_no);
        $contact_no = str_replace(' ', '', $contact_no);
        $alternate_contact_no = "";
        if (!empty($this->alternate_contact_no)) {
            $alternate_contact_no = str_replace('(', '', $this->alternate_contact_no);
            $alternate_contact_no = str_replace(')', '', $alternate_contact_no);
            $alternate_contact_no = str_replace('-', '', $alternate_contact_no);
            $alternate_contact_no = str_replace(' ', '', $alternate_contact_no);
        }

        $data = [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'sur_name' => $this->sur_name,
            'contact_no' => $contact_no,
            'alternate_contact_no' => $alternate_contact_no,
            'subjects' => $this->subjects,
            'experience' => $this->experience,
            'modified' => $this->modified
        ];

        if ($this->profile_pic) {
            $data['profile_pic'] = $this->profile_pic;
            unlink(UPLOAD_FOLDER . 'teacher' . '/' . $teacherDetail['profile_pic']);
        }
        $condition = ['id' => $this->ID];
        if (Main::updateData('teachers', $data, $condition)) {
            $this->response['status'] = true;
            $this->response['message'] = RECORD_UPDATED;
        } else {
            $this->response['status'] = false;
            $this->response['message'] = RECORD_UPDATED_ERROR;
        }
        return Main::returnJson($this->response);
    }

    /**
     * Method to delete teacher record
     */

    public function delete()
    {
        global $dbConn;
        $query = "DELETE FROM " . DB_PREFIX . "teachers WHERE id=" . $this->ID;
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
     * Method to get teacher detail
     */

    public function getDetail()
    {
        global $dbConn;
        $query = "SELECT * FROM " . DB_PREFIX . "teachers WHERE id = " . $this->getID();
        $resQuery = $dbConn->query($query);
        return $resQuery->fetch_assoc();
    }

    /**
     * Method to get teachers
     */

    public function getTeachers()
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
            $searchQuery = " and ( first_name like '%" . $searchValue . "%' or 
        middle_name like'%" . $searchValue . "%' or
        sur_name like'%" . $searchValue . "%' or
        contact_no like'%" . $searchValue . "%' or
        alternate_contact_no like'%" . $searchValue . "%' or
        experience like'%" . $searchValue . "%' or
        is_active like'%" . $searchValue . "%') ";
        }

        ## Total number of records without filtering
        $sel = mysqli_query($dbConn, "select count(*) as allcount from " . DB_PREFIX . "teachers");
        $records = mysqli_fetch_assoc($sel);
        $totalRecords = $records['allcount'];

        ## Total number of record with filtering
        $sel = mysqli_query($dbConn, "select count(*) as allcount from " . DB_PREFIX . "teachers WHERE 1 " . $searchQuery);
        $records = mysqli_fetch_assoc($sel);
        $totalRecordwithFilter = $records['allcount'];

        ## Fetch records
        $teacherQuery = "select * from " . DB_PREFIX . "teachers WHERE 1 " . $searchQuery . " order by " . $columnName . " " . $columnSortOrder . " limit " . $row . "," . $row_per_page;
        $teacherRecords = mysqli_query($dbConn, $teacherQuery);
        $data = array();

        while ($row = mysqli_fetch_assoc($teacherRecords)) {
            $data[] = array(
                "id" => $row['id'],
                "first_name" => $row['first_name'],
                "middle_name" => $row['middle_name'],
                "sur_name" => $row['sur_name'],
                "contact_no" => $row['contact_no'],
                "alternate_contact_no" => $row['alternate_contact_no'],
                'subjects' => $this->getSubjectsName($row['subjects']),
                'experience' => $row['experience'],
                "is_active" => $row["is_active"] == 1 ? 'Active' : 'Inactive'
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
     * Method to get subjects name by ids
     * @param $subjectIds
     * @return string
     */

    public function getSubjectsName($subjectIds)
    {
        global $dbConn;
        $query = "SELECT * FROM " . DB_PREFIX . "subjects WHERE `id` IN ({$subjectIds})";
        $res = $dbConn->query($query);
        while ($row = $res->fetch_assoc()) {
            $data[] = $row['name'];
        }
        return !empty($data) ? implode(',', $data) : "";
    }

    /**
     * Method to get class list
     * @return array
     */

    public function getClassList()
    {
        return Main::_getClassList();
    }

    /**
     * Method to get class list
     * @return array
     */

    public function getSubjectList()
    {
        return Main::_getSubjectList();
    }
}
