<?php

require 'shared/helper.php';
require 'config/config.php';
require 'modules/classes/User.php';

if (isset($_SESSION['logged_in'])) {
    $obj = new User();
    $obj->sign_out();
}