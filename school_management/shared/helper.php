<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/**
 * Method Dump and Die
 * @param $data
 */
function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit();
}

/**
 * Method to redirect to the given URL
 * @param $url
 */
function redirect($module, $action)
{
    header("Location: " . BASE_URL . 'module=' . $module . '&action=' . $action);
    exit();
}

/**
 * Method to trim array
 * @param $array
 * @return mixed
 */
function trimArray($array)
{
    foreach ($array as $key => $value) {
        $array[$key] = is_array($value) ? trimArray($value) : trim($value);
    }
    return $array;
}

/**
 * Method to get Dummy Class list
 * @return array[]
 */

function getDummyClassList()
{
    return [
        [
            'id' => 1,
            'class_name' => 'Class 1'
        ],
        [
            'id' => 2,
            'class_name' => 'Class 2'
        ],
        [
            'id' => 3,
            'class_name' => 'Class 3'
        ],
        [
            'id' => 4,
            'class_name' => 'Class 4'
        ],
        [
            'id' => 5,
            'class_name' => 'Class 5'
        ],
        [
            'id' => 6,
            'class_name' => 'Class 6'
        ],
        [
            'id' => 7,
            'class_name' => 'Class 7'
        ],
        [
            'id' => 8,
            'class_name' => 'Class 8'
        ],
        [
            'id' => 9,
            'class_name' => 'Class 9'
        ],
        [
            'id' => 10,
            'class_name' => 'Class 10'
        ],
        [
            'id' => 11,
            'class_name' => 'Class 11'
        ],
        [
            'id' => 12,
            'class_name' => 'Class 12'
        ],
    ];
}

/**
 * Method to get dummy roll no's
 * @return string
 */
function getDummyRollNo()
{
    return 'STU' . rand(000000, 999999);
}
