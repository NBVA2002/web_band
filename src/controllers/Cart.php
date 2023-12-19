<?php
class Cart extends Controller
{
    public $data = [];
    public $model_user;
    public $model_order;
    public $model_order_line;
    public $model_ticket;
    public $model_tour;
    public $file;

    public function __construct()
    {
        $this->file = new FileUpload();
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
        for ($i = 0; $i < sizeof($cart); $i++) {
            $cart[$i]['tour_id'] = $this->model_tour->getDetailModel($cart[$i]['tour_id']);
        }

        $this->data['cart_list'] = $cart;

        $this->render('cart/cart', $this->data);
    }

    public function create()
    {
        $ticket = [];
        $totalPrice = [];
        $cart = json_decode($_COOKIE['cart'], true);
        for ($i = 0; $i < sizeof($cart); $i++) {
            $ticket[$i] = $this->model_ticket->getTicketInStock($cart[$i]['tour_id'], $cart[$i]['quantity']);
            $totalPrice[$i] = 0;
            for ($j = 0; $j < sizeof($ticket[$i]); $j++) {
                $ticket[$i][$j]['status'] = 'OUT_OF_STOCK';
                $totalPrice[$i] = $totalPrice[$i] + $ticket[$i][$j]['price'];
                $this->model_ticket->updateModel($ticket[$i][$j]['id'], $ticket[$i][$j]);
            }
        }

        $dataUser = $this->model_user->getDetailModel($_SESSION['id']);
        $currentDateTime = new DateTime();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $dataOrder = [
            'address' => $dataUser['address'],
            'order_date' => $formattedDateTime,
            'user_id' => $dataUser['id'],
            'total_price' => array_sum($totalPrice),
        ];
        $this->model_order->createModel($dataOrder);
        $order = ($this->model_order->getLastModel())[0];

        for ($i = 0; $i < sizeof($ticket); $i++) {
            for ($j = 0; $j < sizeof($ticket[$i]); $j++) {
                $dataOrderLine = [
                    'ticket_id' => $ticket[$i][$j]['id'],
                    'order_id' => $order['id'],
                    'price' => $ticket[$i][$j]['price'],
                ];
                $this->model_order_line->createModel($dataOrderLine);
            }
        }

        echo '<pre>';
        print_r($order);
        echo '</pre>';
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

    public function fileupload()
    {
        $this->file->fileUpload('user/');
        $this->index();
    }

    public function readfile($imgFolder, $imgName)
    {
        $this->file->getFileContent($imgFolder . '/' . $imgName);
    }
}
