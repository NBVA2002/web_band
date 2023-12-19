<?php
class Change extends Controller
{
    public $data = [];
    public $model_user;
    private $user;

    public function __construct()
    {
        $this->model_user = $this->model('UserModel');
    }

    public function index($email)
    {
        $this->user = $this->model_user->findByEmail($email);;
        $this->data['err_password'] = "";
        $this->data['err_confirm_password'] = "";
        $this->render('change/change', $this->data);
    }

    public function authenticate()
    {
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        $this->data['err_password'] = "";
        $this->data['err_confirm_password'] = "";

        $err_validate = [];

        if ($password == '') {
            $err_validate['err_password'] = "Password is required";
        }
        if ($confirmPassword == '') {
            $err_validate['err_confirm_password'] = "Confirm password is required";
        } else if ($confirmPassword != $password) {
            $err_validate['err_confirm_password'] = "Password and Confirm Password do not match";
        }

        if (sizeof($err_validate) == 0) {
            $options = [
                'cost' => 11
            ];
            $data_request = [
                'name' => $this->user['name'],
                'phone' => $this->user['phone'],
                'email' => $this->user['email'],
                'password' => password_hash($password, PASSWORD_BCRYPT, $options),
                'address' => $this->user['address'],
                'role' => $this->user['role'],
                'create_date' => $this->user['create_date'],
            ];
            // $this->model_user->updateModel($user['id'], $data_request);
            // Header("Location:" . _WEB_ROOT . "/login");
        } else {
            $this->data['err_password'] = $err_validate['err_password'];
            $this->data['err_confirm_password'] = $err_validate['err_confirm_password'];
            $this->render('change/change', $this->data);
        }
    }

}
