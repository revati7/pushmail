<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/POP3.php';
require 'vendor/phpmailer/phpmailer/src/OAuth.php';
require "http/models/User.php";
require "http/models/Course.php";
require "http/models/CourseSelected.php";
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
        $CourseSelectedObj = new CourseSelectedModel();
        $this->view->data = $CourseSelectedObj->getAppliedCourse($_SESSION['uid']);
        $this->view->title = "View Courses | "._COMPANY_NAME_;
        $this->view->render("user/course/viewstatus");
    }
    public function apply(){
        $CourseSelectedObj = new CourseSelectedModel();
        $UserObj = new UserModel();
        if ($_GET['cid']){

            $CourseSelectedObj->add(array(
                "cid" => $_GET['cid'],
                "uid" => $_SESSION['uid'],
                "status" => 0
            ));
        //send mail 
            $mail = new PHPMailer(true);

            try {
                //Server settings
                set_time_limit(0);
                $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp-mail.outlook.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'revati.chaudhari@capgemini.com';                     // SMTP username
                $mail->Password   = 'reva$7654321$';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('revati.chaudhari@capgemini.com', 'revati');            
                $mail->addAddress('revati.chaudhari@capgemini.com');     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                //nhsckvhjd
            }
        }

    }
}
?>