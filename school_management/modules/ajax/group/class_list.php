<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Group.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj = new Group();
    echo $obj->getClasses();
    exit();
}



