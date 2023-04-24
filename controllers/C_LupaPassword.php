<?php
session_start();
require_once 'models/M_LupaPassword.php';

class Forgot {
    private $forgotModel;

    public function __construct() {
        $this->forgotModel = new ForgotModel();
    }

}
?>