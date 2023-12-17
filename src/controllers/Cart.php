<?php
class Cart extends Controller
{
    public $data = [];
    public $model_user;
    public $model_order;
    public $model_order_line;

    public function __construct()
    {
        $this->model_user = $this->model('UserModel');
        $this->model_order = $this->model('OrderModel');
        $this->model_order_line = $this->model('OrderLineModel');
    }

    public function index()
    {
        $dataUser = $this->model_user->getDetailModel($_SESSION['id']);
        $dataOrder = $this->model_order->getListModel();
        $dataOrderLine = $this->model_order_line->getListModel();
        $this->data['order'] = $dataOrder;
        $this->data['order_line'] = $dataOrderLine;
        $this->render('cart/cart', $this->data);
    }

    public function create($order_line_data)
    {
        $dataUser = $this->model_user->getDetailModel($_SESSION['id']);
        $currentDateTime = new DateTime();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $data_request = [
            'address' => $dataUser['address'],
            'order_date' => $formattedDateTime,
            'order_date' => $formattedDateTime,
            'user_id' => $dataUser['id'],
            'total_price' => $dataUser['id'],
        ];
        return $this->model_order->createModel($data_request);
    }

    public function update($id)
    {
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
        // return $this->model_tour->updateModel($id, $datar);
    }

    public function delete($id)
    {
        // return $this->model_tour->deleteModel($id);
    }

    public function list()
    {
        // $data = $this->model_tour->getListModel();
        // echo '<pre>';
        // echo print_r($data);
        // echo '</pre>';
    }

    public function detail($id)
    {
        // $dataDetail  = $this->model_tour->getDetailModel($id);

        // $this->data['tour_detail'] = $dataDetail;
        // $this->render('tour/detail', $this->data);
    }
}
