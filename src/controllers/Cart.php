<?php
class Cart extends Controller
{
    public $data = [];
    public $model_user;
    public $model_order;
    public $model_order_line;
    public $model_ticket;
    public $model_tour;

    public function __construct()
    {
        $this->model_user = $this->model('UserModel');
        $this->model_order = $this->model('OrderModel');
        $this->model_order_line = $this->model('OrderLineModel');
        $this->model_ticket = $this->model('TicketModel');
        $this->model_tour = $this->model('TourModel');
    }

    public function index()
    {
        if (!isset($_COOKIE['cart'])) {
            setcookie("cart", json_encode([]), time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        // setcookie("cart", json_encode([
        //     [
        //         'tour_id' => 1,
        //         'quantity' => 2,
        //     ],
        //     [
        //         'tour_id' => 2,
        //         'quantity' => 5,
        //     ]
        // ]), time() + (86400 * 30), "/");

        $cart = json_decode($_COOKIE['cart'], true);
        for($i = 0; $i < sizeof($cart); $i++) {
            $cart[$i]['tour_id'] = $this->model_tour->getDetailModel($cart[$i]['tour_id']);
        }
        $this->data['cart_list'] = $cart;
        $this->render('cart/cart', $this->data);
    }

    public function create()
    {
        // $dataUser = $this->model_user->getDetailModel($_SESSION['id']);
        // $currentDateTime = new DateTime();
        // $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        // $data_request = [
        //     'address' => $dataUser['address'],
        //     'order_date' => $formattedDateTime,
        //     'order_date' => $formattedDateTime,
        //     'user_id' => $dataUser['id'],
        //     'total_price' => $dataUser['id'],
        // ];
        // return $this->model_order->createModel($data_request);

        $tour_id = $_POST['tour_id'];
        echo $tour_id;
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

    public function file()
    {
        $file = new FileUpload();
        return $file->fileUpload();
    }
}
