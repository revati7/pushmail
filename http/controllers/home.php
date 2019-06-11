<?php
require "http/models/User.php";

class home extends Controller{
    function __construct() {
        //@session_start();
	parent::__construct();
    }
    function first(){
		//print_r($_POST);
		if ($_POST){
			$UserObj = new UserModel();
			$response = $UserObj->checkUser($_POST['username'],sha1($_POST['password']));
			if (count($response) > 0){
				if ($response[0]['role'] == 'EMPLOYEE'){
						//set sessions
					$_SESSION['uid'] = $response[0]['id'];
					$_SESSION['username'] = $response[0]['username'];
					$this->view->message = "Success <script>window.reload();</script>";
					}else{
						$this->view->message = "UnAuthorized Access";
					}
				}else{
					$this->view->message = "Please check the username and password";
				}
		}
    //print_r($_SESSION);
        if (@$_SESSION['uid']){
        		
			$this->view->title = "Dashboard | "._COMPANY_NAME_;
			$this->view->render("index/dashboard");
			
		}else{
			$this->view->title="Welcome to "._COMPANY_NAME_;
			$this->view->render("index/index");
			
		}
	}
}
?>