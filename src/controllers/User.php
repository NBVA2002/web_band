<?php
class User extends Controller
{
    public $data = [];
    public $model_user;

    public function __construct()
    {
        $this->model_user = $this->model('UserModel');
    }

    public function index()
    {
        // echo 'snsc';
        // $dataList  = $this->model_admin->getList();
        // $this->data['tour_list'] = $dataList;
        $this->render('user/user',$this->data);
        // $this->model_admin = $this->delete(2);
    }
}
