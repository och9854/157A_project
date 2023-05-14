<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Teacher.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $objTeacher = new Teacher();
    echo $objTeacher->getTeachers();
    exit();
}



