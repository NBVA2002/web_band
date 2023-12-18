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
        // $dataList  = $this->model_user->getList();
        // $this->data['tour_list'] = $dataList;
        $this->data['list-user'] = $this->list();
        $this->render('admin/user', $this->data);
    }
    public function create()
    {
        echo "chien";
        if (!isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
            die;
        }
        if (!isset($_FILES["user_image"])) {
            echo "Dữ liệu không đúng cấu trúc";
            die;
        }
        if ($_FILES["user_image"]['error'] != 0) {
            echo "Dữ liệu upload bị lỗi";
            die;
        }
        Session::init();
        if (isset($_POST['action'])) {
            if ($_POST['action'] == "Add") {
                $user_name = "";
                $user_email = "";
                $user_psw1 = "";
                $user_psw2 = "";
                $user_address = "";
                $user_phone = "";
                $user_image = "";
                $error_user_name = "";
                $error_user_email = "";
                $error_user_psw1 = "";
                $error_user_psw2 = "";
                $error_user_address = "";
                $error_user_phone = "";
                $error_user_image = "";
                $error = 0;

                $user_image = $_POST["hidden_user_image"];;
                if ($_FILES['user_image']['name'] != "") {
                    $file_name = $_FILES["user_image"]["name"];
                    $tmp_name = $_FILES["user_image"]["tmp_name"];
                    $extension_array = explode(".", $file_name);
                    $extension = strtolower($extension_array[1]);
                    $max_file_size = 30000000;
                    $allowed_extension = array('jpg', 'png');
                    $user_image = uniqid() . '.' . $extension;
                    $path_upload = 'public/uploads/user_image/' . $user_image;
                    $target_file = $path_upload . $_FILES["user_image"]["name"];
                    if (!in_array($extension, $allowed_extension)) {
                        $error_user_image = 'File ảnh chỉ đuôi .jpg và .png';
                        $error++;
                    }
                    if (getimagesize($_FILES["user_image"]["tmp_name"]) > $max_file_size) {
                        $error_user_image = "kích thước file quá lớn < $max_file_size (byte)";
                        $error++;
                    }
                    if (move_uploaded_file($tmp_name, $path_upload)) {
                    } else {
                        $error_user_image = "Có lỗi khi tải ảnh";
                        $error++;
                    }
                } else {
                    if ($user_image == "") {
                        $error_user_image = "Ảnh Bắt buộc";
                        $error++;
                    }
                }
                if (empty($_POST["user_name"])) {
                    $error_user_name = 'Tên bắt buộc';
                    $error++;
                } else {
                    $user_name = $_POST["user_name"];
                }
                if (empty($_POST["user_address"])) {
                    $error_user_address = 'Địa chỉ bắt buộc';
                    $error++;
                } else {
                    $user_address = $_POST["user_address"];
                }
                if (empty($_POST["user_email"])) {
                    $error_user_email = 'Địa chỉ email bắt buộc';
                    $error++;
                } else {
                    if (!filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL)) {
                        $error_user_email = 'Email không đúng định dạng';
                        $error++;
                    } else {
                        $user_email = $_POST["user_email"];
                    }
                }
                if (empty($_POST["psw1"])) {
                    $error_user_password = "Mật khẩu bắt buộc";
                    $error++;
                } else {
                    $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
                    if (!preg_match($pattern, $_POST["user_password"])) {
                        $error_user_password = "Phải gồm 1 số, 1 chữ hoa và chữ cái thường, và có ít nhất 8 ký tự";
                        $error++;
                    } else {
                        $user_psw1 = $_POST["psw1"];
                    }
                }
                if (empty($_POST['psw2'])) {
                    $error_user_psw2 = "Mật khẩu nhập lại bắt buộc";
                    $error++;
                } else {
                    if ($_POST['psw2'] != $user_psw1) {
                        $error_user_psw2 = "Mật khẩu không giống nhau";
                        $error++;
                    } else {
                        $user_psw2 = $_POST['psw2'];
                    }
                }
                if (empty($_POST['user_phone'])) {
                    $error_user_phone = "Số điện thoại bắt buộc";
                    $error++;
                } else {
                    $user_phone = $_POST['user_phone'];
                }
            }
        }
        if ($error > 0) {
            $output = array(
                'error'                       =>    true,
                'error_user_name'             =>    $error_user_name,
                'error_user_email'            =>    $error_user_email,
                'error_user_password1'        =>    $error_user_psw1,
                'error_user_password2'        =>    $error_user_psw2,
                'error_user_phone'            =>    $error_user_phone,
                'error_user_address'          =>    $error_user_address,
                'error_user_image'            =>    $error_user_image
            );
        } else {
            $data = array(
                'email' => $user_email,
                'password' => password_hash($user_psw1, PASSWORD_DEFAULT),
                'name' => $user_name,
                'phone' => $user_phone,
                'address' => $user_address,
                'role' => 'ROLE_USER',
                'image'  =>   $user_image
            );
            
            if ($this->model_user->createUser($data)) {
                $output = array(
                    'success'        =>    'Thêm người dùng thành công',
                );
            } else {
                $output = array(
                    'error'                    =>    true,
                    'error_user_email'    =>    'Email Tồn tại'
                );
            }
            // if ($this->model_user->getDetailEmail($user_email)) {
               
            // } else {
                
            // }
        }
        
        echo json_encode($output);
    }

    public function update($id)
    {
        $currentDateTime = new DateTime();
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $data = [
            'email' => 'ng@gmail.com',
            'password' => 'anhanh2002',
            'name' => 'anhanh',
            'phone' => '00232135',
            'address' => 'Ha Noii',
            'role' => 'ROLE_USER',
            'create_date' => $formattedDateTime,
        ];
        return $this->model_user->updateHome($id, $data);
    }

    public function delete($id)
    {
        return $this->model_user->deleteHome($id);
    }

    public function list()
    {
        $data = $this->model_user->getList();
        // echo '<pre>';
        // echo print_r($data);
        // echo '</pre>';
        return $data;
    }

    public function detail($id)
    {
        $dataDetail  = $this->model_user->getDetail($id);

        $this->data['tour_detail'] = $dataDetail;
        $this->render('tour/detail', $this->data);
    }

}
