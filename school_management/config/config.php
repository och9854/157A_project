<?php

define("ADMIN_URL", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/school_management/");
const BASE_URL = ADMIN_URL . 'index.php?';
const ADMIN_ASSETS_DIR = ADMIN_URL . "assets/";
const SERVER_NAME = "localhost";
const USER_NAME = "root";
const PASSWORD = "";
const DB_NAME = "school_db";
const DB_PREFIX = "tbl_";
const RECORD_SAVED = "Record saved successfully";
const RECORD_SAVED_ERROR = "Oops! some error occurred";
const RECORD_UPDATED = "Record saved successfully";
const RECORD_UPDATED_ERROR = "Oops! some error occurred";
const RECORD_DELETED = 'Record deleted successfully';
const ERROR = RECORD_SAVED_ERROR;
const SUCCESS_LOGIN = 'Logged in successfully';
const FAILURE_LOGIN = 'Incorrect email or password';
define("SITE_DIRECTORY", strtok(str_replace(realpath($_SERVER['DOCUMENT_ROOT']), '', __FILE__), DIRECTORY_SEPARATOR));
define("SITE_DIRECTORY_PATH", $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . SITE_DIRECTORY);
const UPLOAD_FOLDER = SITE_DIRECTORY_PATH . DIRECTORY_SEPARATOR . 'assets/uploads/';
