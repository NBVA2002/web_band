<?php
include('include/header.php');
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">user List</div>
                <div class="col-md-3" align="right">
                    <button type="button" id="add_button" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-success">Thêm người dùng</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table-user">
                    <thead>
                        <tr>
                            <th scope="col">Stt</th>
                            <th scope="col">Họ và Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Role</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <form method="POST" id="add_user_form" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Thêm người dùng</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                        <span id="error_user_password" class="text-danger"></span>
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
                        <textarea id="address" type="text" name="user_address" class="form-control" required></textarea>
                        <span id="error_user_address" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="col-form-label">Image<span class="text-danger">*</span></label>
                        <input type="file" name="user_image" id="user_image" required><br>
                        <span id="error_user_image" class="text-muted">Chỉ cho phép .jpg và .png</span><br>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_user_image" id="hidden_user_image" value="">
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="hidden" name="action" id="action" value="Add">
                    <input type="submit" name="button_action" class="btn btn-success btn-sm" value="Thêm người dùng">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Đóng</button>
                </div>
            
        </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#table-user').DataTable({
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
                "targets": [3, 4, 5, 6],
                "orderable": false,
            }, ],
        });
        $('#add_button').click(function() {
            $('#action').val('Add');
            $('#formModal').modal('show');

            // clear_field();
        });
        // $('#email').on('input', validate);
        $('#add_user_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?= _WEB_ROOT ?>/user/create",
                method: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                // beforeSend: function() {
                //     $('#button_action').val('Validate...');
                //     $('#button_action').attr('disabled', 'disabled');
                // },
                success: function(data) {
                    // $('#button_action').attr('disabled', false);
                    // $('#button_action').val($('#action').val());
                    if (data.success) {
                        $('#message_operation').html('<div class="alert alert-success">' + data.success + '</div>');
                        $('#formModal').modal('hide');
                        dataTable.ajax.reload();
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
    });
</script>