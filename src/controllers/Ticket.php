<?php
class Ticket extends Controller
{
    public $data = [];
    public $model_ticket;

    public function __construct()
    {
        $this->model_ticket = $this->model('TicketModel');
    }

    public function index()
    {
        
        // $dataList  = $this->model_ticket->getList();
        // $this->data['tour_list'] = $dataList;
        $this->render('admin/ticket',$this->data);
        // $this->model_ticket = $this->delete(2);
    }
    public function create() {
        $currentDateTime = new DateTime();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $datar = [
            'email' => 'ng@gmail.com',
            'password' => 'anhassnh2202',
            'name' => 'nbva3',
            'phone' => '00232135',
            'address' => 'Ha Noii',
            'role' => 'ROLE_USER',
            'create_date' => $formattedDateTime,
        ];
        return $this->model_ticket->createHome($datar);
    }

    public function update($id) {
        $currentDateTime = new DateTime();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $datar = [
            'email' => 'ng@gmail.com',
            'password' => 'anhanh2002',
            'name' => 'anhanh',
            'phone' => '00232135',
            'address' => 'Ha Noii',
            'role' => 'ROLE_USER',
            'create_date' => $formattedDateTime,
        ];
        return $this->model_ticket->updateHome($id, $datar);
    }

    public function delete($id) {
        return $this->model_ticket->deleteHome($id);
    }
    
    public function list() {
        $data= $this->model_ticket->getList();
        echo '<pre>';
        echo print_r($data);
        echo '</pre>';
    }

    public function detail($id) {
        $dataDetail  = $this->model_ticket->getDetail($id);

        $this->data['tour_detail'] = $dataDetail;
        $this->render('tour/detail',$this->data);
    }
}
