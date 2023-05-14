<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Teacher.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = $_POST;
    $postData['file'] = isset($_FILES) ? $_FILES : [];
    $objTeacher = new Teacher($postData);
    echo $objTeacher->add();
    exit();
}