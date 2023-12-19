<?php
class Forgot extends Controller
{
    public $data = [];
    public $model_user;

    public function __construct()
    {
        $this->model_user = $this->model('UserModel');
    }

    public function index()
    {
        $this->data['err_email'] = "";
        $this->data['success'] = "";
        $this->render('forgot/forgot', $this->data);
    }

    public function authenticate()
    {
        $email = $_POST['email'];
        $user = $this->model_user->findByEmail($email);
        if ($email == '') {
            $this->data['err_email'] = "Email is required";
            $this->data['success'] = "";
            $this->render('forgot/forgot', $this->data);
        } else {
            if (isset($user[0])) {
                $mail = new MailSender();
                $mail->sendMail($email, 'scs', 'cs');
                $this->data['err_email'] = "";
                $this->data['success'] = "Success check mail";
                $this->render('forgot/forgot', $this->data);
            } else {
                $this->data['err_email'] = "Email not exist";
                $this->data['success'] = "";
                $this->render('forgot/forgot', $this->data);
            }
        }
    }

}
