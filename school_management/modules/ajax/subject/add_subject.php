<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Subject.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = $_POST;
    $obj = new Subject($postData);
    echo $obj->add();
    exit();
}