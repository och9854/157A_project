<?php

require 'Main.php';

class Dashboard extends Main
{
    /**
     * @var int
     */
    public $total_student = 0;

    /**
     * @var int
     */
    public $total_teachers = 0;

    /**
     * @var int
     */
    public $total_classes = 0;

    /**
     * @var int
     */
    public $total_subjects = 0;

    /**
     * @var int
     */
    public $total_sections = 0;

    /**
     * Constructor to assign total
     */


    public function Dashboard()
    {
        $this->total_student = $this->_getStudentCount();
        $this->total_teachers = $this->_getTeacherCount();
        $this->total_classes = $this->_getClassesCount();
        $this->total_sections = $this->_getSectionCount();
        $this->total_subjects = $this->_getSubjectCount();
    }

    /**
     * Method to get total students
     * @return mixed
     */

    private function _getStudentCount()
    {
        $query = "SELECT * FROM `" . DB_PREFIX . "students`";
        $res = Main::select($query);
        return $res->num_rows;
    }

    /**
     * Method to get total teachers
     * @return mixed
     */

    private function _getTeacherCount()
    {
        $query = "SELECT * FROM `" . DB_PREFIX . "teachers`";
        $res = Main::select($query);
        return $res->num_rows;
    }

    /**
     * Method to get total classes
     * @return mixed
     */

    private function _getClassesCount()
    {
        $query = "SELECT * FROM `" . DB_PREFIX . "classes`";
        $res = Main::select($query);
        return $res->num_rows;
    }

    /**
     * Method to get total sections
     * @return mixed
     */

    private function _getSectionCount()
    {
        $query = "SELECT * FROM `" . DB_PREFIX . "sections`";
        $res = Main::select($query);
        return $res->num_rows;

    }

    /**
     * Method to get total subjects
     * @return mixed
     */

    private function _getSubjectCount()
    {
        $query = "SELECT * FROM `" . DB_PREFIX . "subjects`";
        $res = Main::select($query);
        return $res->num_rows;
    }
}