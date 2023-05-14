<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Section.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj = new Section();
    echo $obj->getSections();
    exit();
}



