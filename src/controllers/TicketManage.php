<?php
class TicketManage extends Controller
{
    public $data = [];
    public $model_tour;
    public $file;
    public function __construct()
    {
        $this->file = new FileUpload();
        $this->model_tour = $this->model('TourModel');
    }

    public function index()
    {
        $this->render('admin/ticket');
    }
    // public function create() {
    //     if (!isset($_POST['action']) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    //         die;
    //     }
    //     if ($_POST['action'] == "Add") {    
    //         $error = 0;

    //         $ticket_address = "";
    //         $error_ticket_address = "";
    //         if (empty($_POST["ticket_address"])) {
    //             $error_ticket_address = 'Địa chỉ bắt buộc';
    //             $error++;
    //         } else {
    //             $ticket_address = substr($_POST["ticket_address"], 0, 50);
    //         }

    //         $ticket_description = "";
    //         $error_ticket_description = "";
    //         if (empty($_POST["ticket_description"])) {
    //             $error_ticket_description = 'Miêu tả bắt buộc';
    //             $error++;
    //         } else {
    //             $ticket_description = substr($_POST["ticket_description"], 0, 50);
    //         }

    //         $ticket_date = "";
    //         $error_ticket_date = "";
                   
    //         if (empty($_POST['ticket_date'])) {
    //             $error_ticket_date = "Ngày diễn ra bắt buộc";
    //             $error++;
    //         } else {
    //             $ticket_date = $_POST['ticket_date'];
    //             list($yyyy,$mm,$dd) = explode('-',$ticket_date);
    //             if (!checkdate($mm,$dd,$yyyy)) {
    //                 $error_ticket_date = "Ngày diễn ra không hợp lệ theo định dạng ngày/tháng/năm";
    //                 $error++;
    //             }
    //         }
    //         $error_ticket_image = "";
    //         $ticket_image = "";
    //         $result = $this->file->fileUpload("ticket/","ticket_image");
    //         if (is_array($result)) {
    //             $ticket_image = $result[1];
    //             if ($error > 0) {
    //                 unlink("upload/ticket/".$ticket_image);
    //             }
    //         } else {
    //             $error_ticket_image = $result;
    //             $error++;
    //         }
                 
    //         if ($error > 0) {
    //             $output = array(
    //                 'error'                       =>    true,
    //                 'error_ticket_date'             =>    $error_ticket_date,
    //                 'error_ticket_description'      =>    $error_ticket_description,
    //                 'error_ticket_address'          =>    $error_ticket_address,
    //                 'error_ticket_image'            =>    $error_ticket_image
    //             );
    //         } else {
    //             $data = array(
    //                 'address' => $ticket_address,
    //                 'date' => $ticket_date,
    //                 'description' => $ticket_description,
    //                 'image'  =>  $ticket_image
    //             );

    //             if ($this->model_ticket->createModel($data)) {
    //                 $output = array(
    //                     'success'        =>    'Thêm ticket thành công',
    //                 );
    //             } else {
    //                 $output = array(
    //                     'error'     =>    true
    //                 );
    //             }
    //         }
    //         echo json_encode($output);
    //     }
    // }

    // public function update($id) {
    //     $currentDateTime = new DateTime();
    //     $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
    //     $datar = [
    //         'email' => 'ng@gmail.com',
    //         'password' => 'anhanh2002',
    //         'name' => 'anhanh',
    //         'phone' => '00232135',
    //         'address' => 'Ha Noii',
    //         'role' => 'ROLE_ticket',
    //         'create_date' => $formattedDateTime,
    //     ];
    //     return $this->model_ticket->updateHome($id, $datar);
    // }

    // public function delete($id) {
    //     return $this->model_ticket->deleteHome($id);
    // }
    
    public function list() 
    {
        if ($_POST['action'] == 'fetch') {
            $condition = "INNER JOIN ticket ON ticket.tour_id = tour.id ";
            if (!empty($_POST["search"]["value"])) {
                $condition .= 'WHERE tour.address LIKE "%' . $_POST["search"]["value"] . '%" OR tour.date LIKE "%' . $_POST["search"]["value"] . '%" ';
            }
            if (isset($_POST["order"])) {
                $column = $_POST['order']['0']['column'];
                if ($column == "0") {
                    $condition .= '
                    ORDER BY 1 ' . $_POST['order']['0']['dir'] . '
                    ';
                } elseif ($column == 1) {
                    $condition .= '
                    ORDER BY 2 ' . $_POST['order']['0']['dir'] . '
                    ';
                } elseif ($column == 3) {
                    $condition .= '
                    ORDER BY 4 ' . $_POST['order']['0']['dir'] . '
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
            $result = $this->model_tour->getListModel($condition);
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
                $sub_array[] = $row['tour_id'];
                $sub_array[] = '<img src="' . _WEB_ROOT . '/upload/tour/' . $row["image"] . '" class="img-thumbnail" width="75">';
                $sub_array[] = $row["price"]."$";
                $sub_array[] = $row["address"];
                $sub_array[] = $row["date"];
                $sub_array[] = $row["time"];
                $sub_array[] = $row["description"];
                $sub_array[] = '<button type="button" name="view_ticket" class="btn btn-info btn-sm view_ticket" id="' . $row["id"] . '">View</button>';
                $sub_array[] = '<button type="button" name="edit_ticket" class="btn btn-primary btn-sm edit_ticket" id="' . $row["id"] . '">Edit</button>';
                $sub_array[] = '<button type="button" name="delete_ticket" class="btn btn-danger btn-sm delete_ticket" id="' . $row["id"] . '">Delete</button>';
                $data1[] = $sub_array;
            }
            $output = array(
                "draw"                =>    intval($_POST["draw"]),
                "recordsTotal"        =>    $filtered_rows,
                "recordsFiltered"    =>     count($this->model_tour->getListModel()),
                "data"                =>    $data1
            );
            // print_r($_POST);
            echo json_encode($output);
        }
    }

    public function detail($id) {
        $dataDetail  = $this->model_tour->getDetail($id);

        $this->data['ticket_detail'] = $dataDetail;
        $this->render('ticket/detail',$this->data);
    }
}
