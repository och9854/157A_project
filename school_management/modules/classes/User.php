<?php
require 'Main.php';

class User extends Main
{

    /**
     * @var mixed|string
     */
    public $email = '';

    /**
     * @var mixed|string
     */
    public $password = '';

    /**
     * Constructor Method
     */
    public function User($data = [])
    {
        if (!empty($data)) {
            $this->email = isset($data['email']) ? $data['email'] : '';
            $this->password = isset($data['password']) ? $data['password'] : '';
        }
    }

    /**
     * Method to sign in
     * @return false|string
     */

    public function sign_in()
    {
        $query = "SELECT * FROM `" . DB_PREFIX . "admin` WHERE 1 AND (email='" . $this->email . "' AND password = '" . $this->password . "')";
        $res = Main::select($query);
        if ($res->num_rows == 1) {
            $result = $res->fetch_object();
            $_SESSION['logged_in'] = 1;
            $_SESSION['name'] = $result->name;
            $this->response['status'] = true;
            $this->response['message'] = SUCCESS_LOGIN;

            if (isset($_SESSION['referrer'])) {
                header("Location: " . $_SESSION['referrer']);
            } else {
                header("Location: " . BASE_URL . 'module=dashboard&action=index');
            }
            exit();
        } else {
            $this->response['status'] = false;
            $this->response['message'] = FAILURE_LOGIN;
        }
    }

    /**
     * Method to unset the session and log out
     * @return void
     */

    public function sign_out()
    {
        unset($_SESSION['logged_in'], $_SESSION['referrer'], $_SESSION['name']);
        header("Location: sign_in.php");
        exit();
    }
}