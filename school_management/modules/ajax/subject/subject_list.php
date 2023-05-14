<?php

require '../../../shared/helper.php';
require '../../../config/config.php';
require '../../../modules/classes/Subject.php';
require '../../../modules/classes/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj = new Subject();
    echo $obj->getSubjects();
    exit();
}



