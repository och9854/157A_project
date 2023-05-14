<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Section.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = $_GET;
    $obj = new Section($postData);
    echo $obj->delete();
    exit();
}