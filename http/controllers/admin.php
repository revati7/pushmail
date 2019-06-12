<?php 
require "http/models/User.php";
require "http/models/Course.php";
class admin extends Controller{
    function __construct(){
        parent::__construct();
    }
    function first(){ 
        $UserObj = new UserModel();
        $CourseObj = new CourseModel();
        if ($_POST){
           
            $response = $UserObj->checkUser($_POST['username'],sha1($_POST['password']));
            if (count($response) > 0){
                if ($response[0]['role'] == 'ADMIN'){
                    //set sessions
                    $_SESSION['admin_uid'] = $response[0]['id'];
                    $_SESSION['admin_username'] = $response[0]['username'];
                    $this->view->message = "Success <script>window.reload();</script>";
                }else{
                    $this->view->message = "UnAuthorized Access";
                }
            }else{
                $this->view->message = "Please check the username and password";
            }
        }
        if (@$_SESSION['admin_uid']){
            $this->view->userCount = number_format($UserObj->getCount());
            $this->view->courseCount = number_format($CourseObj->getCount());
            
            $this->view->title = "Dashboard | "._COMPANY_NAME_;
            
			$this->view->render("admin/index/dashboard");
			
		}else{
			$this->view->title="Welcome to "._COMPANY_NAME_;
			$this->view->render("admin/index/index");
			
		}
    }
    
    function logout(){
        session_destroy();
        echo "<script>window.location='"._ADMIN_PATH_."';</script>";
    }
}
?>