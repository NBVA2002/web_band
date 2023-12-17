<?php
include('include/header.php');
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">Danh sách người dùng</div>
                <div class="col-md-3" align="right">
                    <button type="button" id="add_button" class="btn btn-success btn-sm">Thêm người dùng</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <span id="message_operation"></span>
                <table class="table table-striped table-bordered" id="table_user">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Ảnh</th>
                            <th>Họ và Tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Xem</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="add_user_form" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">
                        </h>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Tên người dùng<span class="text-danger">*</span></label>
                        <input id="user_name" type="text" name="user_name" class="form-control" required>
                        <span id="error_user_name" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email Address<span class="text-danger">*</span></label>
                        <input id="email" type="email" name="user_email" class="form-control" required>
                        <span id="error_user_email" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="psw1" class="col-form-label">Mật khẩu<span class="text-danger">*</span></label>
                        <input id="psw1" type="password" name="psw1" class="form-control" required>
                        <span id="error_user_password1" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="psw2" class="col-form-label">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                        <input id="psw2" type="password" name="psw2" class="form-control" required>
                        <span id="error_user_password2" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Phone<span class="text-danger">*</span></label>
                        <input id="user_phone" type="text" name="user_phone" class="form-control" required>
                        <span id="error_user_phone" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">Địa chỉ:</label>
                        <textarea id="user_address" type="text" name="user_address" class="form-control" required></textarea>
                        <span id="error_user_address" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="col-form-label">Image<span class="text-danger">*</span></label>
                        <input type="file" name="user_image" id="user_image" required><br>
                        <span class="text-muted">Chỉ cho phép .jpg và .png</span><br>
                        <span id="error_user_image" class="text-danger"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_user_image" id="hidden_user_image" value="">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="action" id="action" value="Add">
                    <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Thêm người dùng">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="viewModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Thông tin người dùng</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="user_details">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" ><span class="text-danger">Xóa người dùng</span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h3 align="center">Bạn có chắc chắn xóa người dùng?</h3>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" id="confirm_button" class="btn btn-primary btn-sm">Confirm</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#table_user').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?= _WEB_ROOT ?>/user/list",
                type: "POST",
                data: {
                    action: 'fetch'
                }
            },
            "columnDefs": [{
                "targets": [1, 4, 5, 7, 8, 9],
                "orderable": false,
            }, ],
        });

        function clear_field() {
            $('#add_user_form')[0].reset();
            $('#error_user_name').text('');
            $('#error_user_email').text('');
            $('#error_user_password1').text('');
            $('#error_user_password2').text('');
            $('#error_user_address').text('');
            $('#error_user_phone').text('');
            $('#error_user_image').text('');
        }
        $('#add_button').click(function() {
            $('#modal_title').text("Thêm người dùng");
            $('#button_action').val('Thêm người dùng');
            $('#action').val('Add');
            $('#myModal').modal('show');

            clear_field();
        });
        $('#add_user_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?= _WEB_ROOT ?>/user/create",
                method: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#button_action').val('Validate...');
                    $('#button_action').attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('#button_action').attr('disabled', false);
                    $('#button_action').val("Thêm người dùng");
                    if (data.success) {
                        $('#message_operation').html('<div class="alert alert-success">' + data.success + '</div>');
                        $('#myModal').modal('hide');
                        table.ajax.reload();
                    }
                    if (data.error) {
                        if (data.error_user_name != '') {
                            $('#error_user_name').text(data.error_user_name);
                        } else {
                            $('#error_user_name').text('');
                        }
                        if (data.error_user_email != '') {
                            $('#error_user_email').text(data.error_user_email);
                        } else {
                            $('#error_user_email').text('');
                        }
                        if (data.error_user_password1 != '') {
                            $('#error_user_password1').text(data.error_user_password1);
                        } else {
                            $('#error_user_password1').text('');
                        }
                        if (data.error_user_password2 != '') {
                            $('#error_user_password2').text(data.error_user_password2);
                        } else {
                            $('#error_user_password2').text('');
                        }
                        if (data.error_user_phone != '') {
                            $('#error_user_phone').text(data.error_user_phone);
                        } else {
                            $('#error_user_phone').text('');
                        }
                        if (data.error_user_address != '') {
                            $('#error_user_address').text(data.error_user_address);
                        } else {
                            $('#error_user_address').text('');
                        }
                        if (data.error_user_image != '') {
                            $('#error_user_image').text(data.error_user_image);
                        } else {
                            $('#error_user_image').text('');
                        }
                    }
                }
            });

        });
        var user_id = '';

        $(document).on('click', '.view_user', function() {
            user_id = $(this).attr('id');
            $.ajax({
                url: "<?=_WEB_ROOT?>/user/detail/".concat("",user_id),
                method: "POST",
                data: {
                    action: 'single_fetch',
                },
                success: function(data) {
                    $('#viewModal').modal('show');
                    $('#user_details').html(data);
                }
            });
        });
        $(document).on('click', '.delete_user', function() {
            user_id = $(this).attr('id');
            $('#deleteModal').modal('show');
        });
        $('#confirm_button').click(function(){
            $.ajax({
                url:"<?=_WEB_ROOT?>/user/delete/".concat("",user_id),
                method:"POST",
                data:{action:'delete'},
                success:function(data){
                    $('#message_operation').html('<div class="alert alert-success">'+data+'</div>');
                    $('#deleteModal').modal('hide');
                    table.ajax.reload();
                }
            })
        });
    });
</script>