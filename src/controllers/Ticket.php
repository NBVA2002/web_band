<?php
class Ticket extends Controller
{
    public $data = [];
    public $model_ticket;

    public function __construct()
    {
        $this->model_ticket = $this->model('TourModel');
    }

    public function index()
    {
        echo "ticket";
    }
    
    public function list() {
        $dataList  = $this->model_ticket->getListModel("WHERE id = 2");
        $this->data['tour_list'] = $dataList;
        $this->render('tour/list',$this->data);
    }

    public function detail($id) {
        $dataDetail  = $this->model_ticket->getDetailModel($id);
        $this->data['ticket_detail'] = $dataDetail;
        $this->render('ticket/detail',$this->data);
    }
}
