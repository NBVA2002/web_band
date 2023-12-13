<?php
class Login extends Controller
{
    public $data = [];
    public $model_user;

    public function __construct()
    {
        $this->model_user = $this->model('UserModel');
    }

    public function authenticate($email, $password)
    {
        // echo "ahsbciasbcjsc";
        $user = $this->model_user->findByEmail($email);
        if (isset($user[0])) {
            if ($password == $user[0]['password']) {
                $_SESSION['id'] = $user[0]['id'];
                $_SESSION['email'] = $user[0]['email'];
                $_SESSION['role'] = $user[0]['role'];
                // $this->render('home/index', $this->data);
                Header("Location:"._WEB_ROOT."/home");
            } else {
                $this->data['err'] = "Email not exist";
                $this->render('login/login', $this->data);
            }
        } else {
            $this->data['err'] = "Email not exist";
            $this->render('login/login', $this->data);
        }
    }

    public function index()
    {
        $this->data['err'] = "";
        $this->render('login/login', $this->data);
    }
}
