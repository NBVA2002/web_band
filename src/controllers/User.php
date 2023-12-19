<?php
class User extends Controller
{
    public $data = [];
    public $model_user;
    public $file;

    public function __construct()
    {
        $this->file = new FileUpload();
        $this->model_user = $this->model('UserModel');
    }

    public function index()
    {
        $dataUser  = $this->model_user->getDetail($_SESSION['id']);
        $this->data['user_context'] = $dataUser;

        $this->render('user/user',$this->data);
    }

    public function logout()
    {
        session_destroy();
        Header("Location:" . _WEB_ROOT . "/home");
    }

    public function fileupload()
    {
        $this->file->fileUpload('user/');
        $this->index();
    }

    public function readfile($imgName)
    {
        $this->file->getFileContent('user/'.$imgName);
    }
}
