<?php
class User extends Controller
{
    public $model_user;

    public function __construct()
    {
        $this->model_user = $this->model('UserModel');
    }

    public function index()
    {
        // $dataList  = $this->model_user->getList();
        // $this->data['tour_list'] = $dataList;
        $this->render('admin/user');
    }
    public function create()
    {
        if (!isset($_POST['action']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
            die;
        }
        if ($_POST['action'] == "Add") {
            $user_name = "";
            $user_email = "";
            $user_psw1 = "";
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

            $user_image = $_POST["hidden_user_image"];

            if (empty($_POST["user_email"])) {
                $error_user_email = 'Địa chỉ email bắt buộc';
                $error++;
            } else {
                if (filter_var($_POST["user_email"], FILTER_VALIDATE_EMAIL) && empty($this->model_user->findByEmail($_POST['user_email']))) {
                    $user_email = substr($_POST["user_email"], 0, 50);
                } else {
                    $error_user_email = 'Email không đúng định dạng hoặc email tồn tại';
                    $error++;
                }
            }

            if (empty($_POST["user_name"])) {
                $error_user_name = 'Tên bắt buộc';
                $error++;
            } else {
                if (ctype_alpha($_POST["user_name"])) {
                    $user_name = substr($_POST["user_name"], 0, 30);
                } else {
                    $error_user_name = 'Tên chỉ gồm các chữ cái';
                    $error++;
                }
            }
            if (empty($_POST["user_address"])) {
                $error_user_address = 'Địa chỉ bắt buộc';
                $error++;
            } else {
                $user_address = substr($_POST["user_address"], 0, 50);
            }

            if (empty($_POST["psw1"])) {
                $error_user_psw1 = "Mật khẩu bắt buộc";
                $error++;
            } else {
                $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
                if (preg_match($pattern, $_POST["psw1"])) {
                    $user_psw1 = $_POST["psw1"];
                } else {
                    $error_user_psw1 = "Mật khẩu gồm 1 số, 1 chữ hoa, 1 ký tự đặc biệt, và có ít nhất 8 ký";
                    $error++;
                }
            }
            if (empty($_POST['psw2'])) {
                $error_user_psw2 = "Mật khẩu nhập lại bắt buộc";
                $error++;
            } else {
                if ($_POST['psw2'] != $_POST['psw1']) {
                    $error_user_psw2 = "Mật khẩu không giống nhau";
                    $error++;
                }
            }
            if (empty($_POST['user_phone'])) {
                $error_user_phone = "Số điện thoại bắt buộc";
                $error++;
            } else {
                if (ctype_digit($_POST['user_phone'])) {
                    $user_phone = substr($_POST['user_phone'], 0, 20);
                } else {
                    $error_user_phone = "Số điện thoại chỉ gồm số";
                    $error++;
                }
            }
            if ($_FILES["user_image"]['error'] != 0) {
                $error_user_image = "Dữ liệu upload bị lỗi";
                $error++;
            }
            if ($_FILES['user_image']['name'] != "") {
                $file_name = $_FILES["user_image"]["name"];
                $tmp_name = $_FILES["user_image"]["tmp_name"];
                $extension_array = explode(".", $file_name);
                $extension = strtolower($extension_array[1]);
                $max_file_size = 3000000;
                $allowed_extension = array('jpg', 'png');
                $user_image = uniqid() . '.' . $extension;
                $path_upload = 'public/uploads/user_image/' . $user_image;
                if (!in_array($extension, $allowed_extension)) {
                    $error_user_image = 'File ảnh chỉ nhận .jpg và .png';
                    $error++;
                }
                if (getimagesize($_FILES["user_image"]["tmp_name"]) == false) {
                    $error_user_image = "Chỉ nhận file ảnh";
                    $error++;
                }
                if ($_FILES["user_image"]["size"] > $max_file_size) {
                    $error_user_image = "File ảnh quá lớn < $max_file_size (byte)";
                    $error++;
                }
                if ($error == 0) {
                    if (!move_uploaded_file($tmp_name, $path_upload)) {
                        $error_user_image = "Có lỗi khi tải ảnh";
                        $error++;
                    }
                }
            } else {
                if ($user_image == "") {
                    $error_user_image = "Ảnh Bắt buộc";
                    $error++;
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
                        'error'     =>    true
                    );
                }
            }
            echo json_encode($output);
        }
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
        if($this->model_user->deleteUser($id)) {
            echo "Xóa người dùng thành công";
        }
        // if ($_POST['delete'] == "delete") {
            
        // }
    }

    public function list()
    {
        if ($_POST['action'] == 'fetch') {
            $condition = " ";
            if (!empty($_POST["search"]["value"])) {
                $condition = 'WHERE user.name LIKE "%' . $_POST["search"]["value"] . '%" OR user.email LIKE "%' . $_POST["search"]["value"] . '%"';
            }
            if (isset($_POST["order"])) {
                $column = $_POST['order']['0']['column'];
                if ($column == "0") {
                    $condition .= '
                    ORDER BY 1 ' . $_POST['order']['0']['dir'] . '
                    ';
                } elseif ($column == 2) {
                    $condition .= '
                    ORDER BY 4 ' . $_POST['order']['0']['dir'] . '
                    ';
                } elseif ($column == 3) {
                    $condition .= '
                    ORDER BY 2 ' . $_POST['order']['0']['dir'] . '
                    ';
                } elseif ($column == 6) {
                    $condition .= '
                    ORDER BY 7 ' . $_POST['order']['0']['dir'] . '
                    ';
                }
            }
            if ($_POST["length"] != -1) {
                $condition .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
            }
            $result = $this->model_user->getUserCondition($condition);
            $data1 = array();
            $filtered_rows = 0;
            if (count($result) < 10) {
                $filtered_rows = count($result);
            } else {
                $filtered_rows = 10;
            }

            foreach ($result as $row) {
                $sub_array = array();
                $sub_array[] = $row['id'];
                $sub_array[] = '<img src="' . _WEB_ROOT . '/public/uploads/user_image/' . $row["image"] . '" class="img-thumbnail" width="75">';
                $sub_array[] = $row["name"];
                $sub_array[] = $row["email"];
                $sub_array[] = $row["address"];
                $sub_array[] = $row["phone"];
                $sub_array[] = $row["role"];
                $sub_array[] = '<button type="button" name="view_user" class="btn btn-info btn-sm view_user" id="' . $row["id"] . '">View</button>';
                $sub_array[] = '<button type="button" name="edit_user" class="btn btn-primary btn-sm edit_user" id="' . $row["id"] . '">Edit</button>';
                $sub_array[] = '<button type="button" name="delete_user" class="btn btn-danger btn-sm delete_user" id="' . $row["id"] . '">Delete</button>';
                $data1[] = $sub_array;
            }
            $output = array(
                "draw"                =>    intval($_POST["draw"]),
                "recordsTotal"        =>    $filtered_rows,
                "recordsFiltered"    =>     count($this->model_user->getList()),
                "data"                =>    $data1
            );
            // print_r($_POST);
            echo json_encode($output);
        }
    }

    public function detail($id)
    {
        if ($_POST['action'] == "single_fetch") {
            $dataDetail  = $this->model_user->getUserCondition("WHERE id = $id");
            $output = '<div class="row">';
            foreach ($dataDetail as $row) {
                $output .= '
            <div class="col-md-3">
                <img src="' . _WEB_ROOT . '/public/uploads/user_image/' . $row["image"] . '" class="img-thumbnail" />
            </div>
            <div class="col-md-9">
                <table class="table">
                    <tr>
                        <th>Họ và tên</th>
                        <td>' . $row["name"] . '</td>
                    </tr>
                    
                    <tr>
                        <th>Email Address</th>
                        <td>' . $row["email"] . '</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>' . $row["address"] . '</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>' . $row["phone"] . '</td>
                    </tr>
                    <tr>
                        <th>Vai trò</th>
                        <td>' . $row["role"] . '</td>
                    </tr>
                </table>
            </div>
            ';
            }
            $output .= '</div>';
            echo $output;
        }
    }
}
