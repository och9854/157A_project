<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Student.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = $_GET;
    $objStudent = new Student($postData);
    echo $objStudent->delete();
    exit();
}