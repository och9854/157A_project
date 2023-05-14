<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Student.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentObj = new Student();
    echo $studentObj->getStudents();
    exit();
}



