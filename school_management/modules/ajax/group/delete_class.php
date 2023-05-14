<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Group.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = $_GET;
    $obj = new Group($postData);
    echo $obj->delete();
    exit();
}