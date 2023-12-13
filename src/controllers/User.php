<?php
class User extends Controller
{
    public $data = [];
    public $model_user;

    public function __construct()
    {
        $this->model_user = $this->model('AdminModel');
    }

    public function index()
    {
        // $dataList  = $this->model_user->getList();
        // $this->data['tour_list'] = $dataList;
        $this->render('admin/user',$this->data);
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
        return $this->model_user->createHome($datar);
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
        return $this->model_user->updateHome($id, $datar);
    }

    public function delete($id) {
        return $this->model_user->deleteHome($id);
    }
    
    public function list() {
        $data= $this->model_user->getList();
        echo '<pre>';
        echo print_r($data);
        echo '</pre>';
    }

    public function detail($id) {
        $dataDetail  = $this->model_user->getDetail($id);

        $this->data['tour_detail'] = $dataDetail;
        $this->render('tour/detail',$this->data);
    }
}
