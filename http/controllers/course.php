<?php 
require "http/models/Course.php";
class course extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function add(){
        $CourseObj = new CourseModel();
        if ($_POST){
            
            if ($CourseObj->add($_POST)){
                     
                $this->view->message = "Successfully Created";
            }else{
                $this->view->message = "Problem Occur";
            }
        }
        
        $this->view->title = "Add Course | "._COMPANY_NAME_;
        $this->view->render("admin/course/add");
    }
    public function update(){
        echo "update function ";
    }
    public function delete(){
        echo "remove function";
    }
    public function view(){
        $CourseObj = new CourseModel();
        $this->view->data = $CourseObj->getAll();
        $this->view->title = "View Courses | "._COMPANY_NAME_;
        $this->view->render("admin/course/view");
    }
    public function view_applycourses(){
        $CourseObj = new CourseModel();
        $this->view->data = $CourseObj->getAll();
        $this->view->title = "View Courses | "._COMPANY_NAME_;
        $this->view->render("user/course/view");
    }
    public function view_coursestatus(){
        $CourseObj = new CourseModel();
        $this->view->data = $CourseObj->getAll();
        $this->view->title = "View Courses | "._COMPANY_NAME_;
        $this->view->render("user/course/viewstatus");
    }
}
?>