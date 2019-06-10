<?php 
require "http/models/User.php";
class user extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function add(){
        if ($_POST){
            $UserObj = new UserModel();
            if ($UserObj->add($_POST)){
                $this->view->message = "Successfully Added.";
            }else{
                $this->view->message = "Problem Occur";
            }
        }
        $this->view->title = "Add User | "._COMPANY_NAME_;
        $this->view->render("admin/user/add");
    }
    public function update(){
        echo "update function ";
    }
    public function delete(){
        echo "remove function";
    }
    public function view(){
        $UserObj = new UserModel();
        $this->view->data = $UserObj->getAll();
        $this->view->title = "View Users | "._COMPANY_NAME_;
        $this->view->render("admin/user/view");
    }
}
?>