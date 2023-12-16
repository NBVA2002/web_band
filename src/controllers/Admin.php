<?php
class Admin extends Controller
{
    public $data = [];
    public $model_admin;

    public function __construct()
    {
        $this->model_admin = $this->model('AdminModel');
    }

    public function index()
    {
        // $dataList  = $this->model_admin->getList();
        // $this->data['tour_list'] = $dataList;
        $this->render('admin/admin',$this->data);
        // $this->model_admin = $this->delete(2);
    }
}
