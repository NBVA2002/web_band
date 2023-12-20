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
        if (isset($_SESSION['id'])) {
            $dataUser  = $this->model_user->getDetailModel($_SESSION['id']);
            $this->data['user_context'] = $dataUser;
            $this->render('user/user', $this->data);
        } else {
            Header("Location:" . _WEB_ROOT . "/login");
        }
    }

    public function logout()
    {
        session_destroy();
        Header("Location:" . _WEB_ROOT . "/login");
    }

    public function update()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        echo $email."/".$password."/".$name."/".$phone."/".$address;
    }

    public function change_avatar()
    {
        $filename = $_FILES["fileToUpload"]["name"];
        $dataUser  = $this->model_user->getDetailModel($_SESSION['id']);
        $dataUser['img_url'] = $filename;
        $this->model_user->updateModel($_SESSION['id'], $dataUser);

        echo $filename;
        $this->file->fileUpload('user/', 'fileToUpload');
        $this->index();
    }

    public function readfile($imgName)
    {
        $this->file->getFileContent('user/' . $imgName);
    }
}
