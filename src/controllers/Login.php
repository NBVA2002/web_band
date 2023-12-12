<?php
class Login extends Controller
{
    public $data = [];
    public $model_tour;

    public function __construct()
    {
        $this->model_tour = $this->model('TourModel');
    }

    public function index()
    {
        $dataList  = $this->model_tour->getList();
        $this->data['tour_list'] = $dataList;
        $this->render('login/login',$this->data);
    }
}
