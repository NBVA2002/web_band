<?php
    include("include/header.php")
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9 font-weight-bold">DANH SÁCH VÉ</div>
                <div class="col-md-3" align="right">
                    <button type="button" id="add_button" class="btn btn-success btn-sm">Thêm vé</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <span id="message_operation"></span>
                <table class="table table-striped table-bordered" id="table_ticket">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tour_ID</th>
                            <th>Ảnh</th>
                            <th>Giá vé</th>
                            <th>Địa chỉ</th>
                            <th>Ngày</th>
                            <th>Thời gian diễn ra</th>
                            <th>Miêu tả</th>
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
            <form method="POST" id="add_ticket_form" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">
                        </h>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Tên người dùng<span class="text-danger">*</span></label>
                        <input id="ticket_name" type="text" name="ticket_name" class="form-control" required>
                        <span id="error_ticket_name" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email Address<span class="text-danger">*</span></label>
                        <input id="ticket_email" type="email" name="ticket_email" class="form-control" required>
                        <span id="error_ticket_email" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="psw1" class="col-form-label">Mật khẩu<span class="text-danger">*</span></label>
                        <input id="ticket_psw1" type="password" name="psw1" class="form-control" required>
                        <span id="error_ticket_password1" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="psw2" class="col-form-label">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                        <input id="ticket_psw2" type="password" name="psw2" class="form-control" required>
                        <span id="error_ticket_password2" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Phone<span class="text-danger">*</span></label>
                        <input id="ticket_phone" type="text" name="ticket_phone" class="form-control" required>
                        <span id="error_ticket_phone" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Role<span class="text-danger">*</span></label>
                        <select class="form-control" id="ticket_role" name="ticket_role">
                            <option val="ROLE_ticket">ROLE_ticket</option>
                            <option val="ROLE_MEMBER">ROLE_MEMBER</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">Địa chỉ:</label>
                        <textarea id="ticket_address" type="text" name="ticket_address" class="form-control" required></textarea>
                        <span id="error_ticket_address" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="col-form-label">Image<span class="text-danger">*</span></label>
                        <input type="file" name="ticket_image" id="ticket_image" required><br>
                        <span class="text-muted">Chỉ cho phép .jpg và .png</span><br>
                        <span id="error_ticket_image" class="text-danger"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" id="action" value="">
                    <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="edit_ticket_form" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title_edit">
                        </h>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Tên người dùng<span class="text-danger">*</span></label>
                        <input id="ticket_name_edit" type="text" name="ticket_name" class="form-control" required>
                        <span id="error_ticket_name_edit" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email Address<span class="text-danger">*</span></label>
                        <input id="ticket_email_edit" type="email" name="ticket_email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="psw1" class="col-form-label">Mật khẩu<span class="text-danger">*</span></label>
                        <input id="ticket_psw1_edit" type="password" name="psw1" class="form-control">
                        <span id="error_ticket_password1_edit" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Phone<span class="text-danger">*</span></label>
                        <input id="ticket_phone_edit" type="text" name="ticket_phone" class="form-control" required>
                        <span id="error_ticket_phone_edit" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Role<span class="text-danger">*</span></label>
                        <select class="form-control" id="ticket_role_edit" name="ticket_role">
                            <option val="ROLE_ticket">ROLE_ticket</option>
                            <option val="ROLE_MEMBER">ROLE_MEMBER</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">Địa chỉ:</label>
                        <textarea id="ticket_address_edit" type="text" name="ticket_address" class="form-control" required></textarea>
                        <span id="error_ticket_address_edit" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="col-form-label">Image<span class="text-danger">*</span></label>
                        <input type="file" name="ticket_image" id="ticket_image_edit" value=""><br>
                        <span class="text-muted">Chỉ cho phép .jpg và .png</span><br>
                        <span id="error_ticket_image_edit" class="text-danger"></span><br>
                        <span id="ticket_image_current"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="ticket_id" value="" />
                    <input type="hidden" name="action" id="action_edit" value="">
                    <input type="submit" name="button_action" id="button_action_edit" class="btn btn-success btn-sm" value="">
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
            <div class="modal-body" id="ticket_details">
                <div class="row">
                    <div class="col-md-3">
                        <img id="image" src="" class="img-thumbnail">

                    </div>
                    <div class="col-md-9">
                        <table class="table">
                            <tr>
                                <th>Họ và tên</th>
                                <td id="name"></td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td id="email"></td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td id="phone"></td>
                            </tr>
                            <tr>
                                <th>Vai trò</th>
                                <td id="role"></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td id="address"></td>
                            </tr>
                        </table>
                    </div>
                </div>
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
                <h4 class="modal-title"><span class="text-danger">Xóa người dùng</span></h4>
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
        var table = $('#table_ticket').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?= _WEB_ROOT ?>/ticketManage/list",
                type: "POST",
                data: {
                    action: 'fetch'
                }
            },
            "columnDefs": [{
                "targets": [2, 7,8,9,10],
                "orderable": false,
            }, ],
        });

        function clear_field() {
            $('#add_ticket_form')[0].reset();
            $('#error_ticket_name').text('');
            $('#error_ticket_email').text('');
            $('#error_ticket_password1').text('');
            $('#error_ticket_password2').text('');
            $('#error_ticket_address').text('');
            $('#error_ticket_phone').text('');
            $('#error_ticket_image').text('');
        }
        $('#add_button').click(function() {
            $('#modal_title').text("Thêm vé");
            $('#button_action').val('Thêm vé');
            $('#action').val('Add');
            $('#myModal').modal('show');

            clear_field();
        });
        $('#add_ticket_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?= _WEB_ROOT ?>/ticketManage/create",
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
                        if (data.error_ticket_name != '') {
                            $('#error_ticket_name').text(data.error_ticket_name);
                        } else {
                            $('#error_ticket_name').text('');
                        }
                        if (data.error_ticket_email != '') {
                            $('#error_ticket_email').text(data.error_ticket_email);
                        } else {
                            $('#error_ticket_email').text('');
                        }
                        if (data.error_ticket_password1 != '') {
                            $('#error_ticket_password1').text(data.error_ticket_password1);
                        } else {
                            $('#error_ticket_password1').text('');
                        }
                        if (data.error_ticket_password2 != '') {
                            $('#error_ticket_password2').text(data.error_ticket_password2);
                        } else {
                            $('#error_ticket_password2').text('');
                        }
                        if (data.error_ticket_phone != '') {
                            $('#error_ticket_phone').text(data.error_ticket_phone);
                        } else {
                            $('#error_ticket_phone').text('');
                        }
                        if (data.error_ticket_address != '') {
                            $('#error_ticket_address').text(data.error_ticket_address);
                        } else {
                            $('#error_ticket_address').text('');
                        }
                        if (data.error_ticket_image != '') {
                            $('#error_ticket_image').text(data.error_ticket_image);
                        } else {
                            $('#error_ticket_image').text('');
                        }
                    }
                }
            });

        });
        var ticket_id = '';
        function clear_field_edit() {
            $('#edit_ticket_form')[0].reset();
            $('#error_ticket_name_edit').text('');
            $('#error_ticket_password1_edit').text('');
            $('#error_ticket_address_edit').text('');
            $('#error_ticket_phone_edit').text('');
            $('#error_ticket_image_edit').text('');
        }
        $(document).on('click', '.view_ticket', function() {
            ticket_id = $(this).attr('id');
            $("#message_operation").text("");
            $.ajax({
                url: "<?= _WEB_ROOT ?>/ticketManage/detail/".concat("", ticket_id),
                method: "POST",
                dataType: "json",
                data: {
                    action: 'single_fetch',
                },
                success: function(data) {
                    $('#image').attr("src", data.ticket_image);
                    $('#name').text(data.ticket_name);
                    $('#email').text(data.ticket_email);
                    $('#phone').text(data.ticket_phone);
                    $('#role').text(data.ticket_role);
                    $('#address').text(data.ticket_address);
                    $('#viewModal').modal('show');
                }
            });
        });
        $(document).on('click', '.edit_ticket', function() {
            ticket_id = $(this).attr('id');
            $('#modal_title_edit').text("Thay đổi thông tin người dùng");
            $('#button_action_edit').val('Thay đổi');
            $('#ticket_id').val(ticket_id);
            $('#action_edit').val('Edit');
            $("#message_operation").text("");
            $.ajax({
                url: "<?= _WEB_ROOT ?>/ticketManage/detail/".concat("", ticket_id),
                method: "POST",
                data: {
                    action: 'single_fetch'
                },
                dataType: "json",
                success: function(data) {
                    $('#ticket_name_edit').val(data.ticket_name);
                    $('#ticket_email_edit').val(data.ticket_email);
                    $('#ticket_email_edit').attr('disabled', "disabled");
                    $('#ticket_phone_edit').val(data.ticket_phone);
                    $('#ticket_role_edit').val(data.ticket_role);
                    $('#ticket_address_edit').val(data.ticket_address);
                    $('#ticket_image_current').html('<img src="' + data.ticket_image + '" class="img-thumbnail" width="50" />');
                    $('#action_edit').val('Edit');
                    $('#editModal').modal('show');
                }
            });
            clear_field_edit();
        });
        $('#edit_ticket_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?= _WEB_ROOT ?>/ticketManage/update/".concat("",$('#ticket_id').val()),
                method: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#button_action_edit').val('Validate...');
                    $('#button_action_edit').attr('disabled', 'disabled');
                },
                success: function(data) {
                    $('#button_action_edit').attr('disabled', false);
                    $('#button_action_edit').val("Thay đổi");
                    if (data.success) {
                        $('#message_operation').html('<div class="alert alert-success">' + data.success + '</div>');
                        $('#editModal').modal('hide');
                        table.ajax.reload();
                    }
                    if (data.error) {
                        if (data.error_ticket_name != '') {
                            $('#error_ticket_name_edit').text(data.error_ticket_name);
                        } else {
                            $('#error_ticket_name_edit').text('');
                        }
                        if (data.error_ticket_password1 != '') {
                            $('#error_ticket_password1_edit').text(data.error_ticket_password1);
                        } else {
                            $('#error_ticket_password1_edit').text('');
                        }
                        if (data.error_ticket_phone != '') {
                            $('#error_ticket_phone_edit').text(data.error_ticket_phone);
                        } else {
                            $('#error_ticket_phone_edit').text('');
                        }
                        if (data.error_ticket_address != '') {
                            $('#error_ticket_address_edit').text(data.error_ticket_address);
                        } else {
                            $('#error_ticket_address_edit').text('');
                        }
                        if (data.error_ticket_image != '') {
                            $('#error_ticket_image_edit').text(data.error_ticket_image);
                        } else {
                            $('#error_ticket_image_edit').text('');
                        }
                    }
                }
            });

        });
        $(document).on('click', '.delete_ticket', function() {
            ticket_id = $(this).attr('id');
            $('#deleteModal').modal('show');
            $('#confirm_button').click(function() {
                $.ajax({
                    url: "<?= _WEB_ROOT ?>/ticketManage/delete/".concat("", ticket_id),
                    method: "POST",
                    data: {action: "delete"},
                    success: function(data) {
                        $('#message_operation').html('<div class="alert alert-success">' + data + '</div>');
                        $('#deleteModal').modal('hide');
                        table.ajax.reload();
                    }
                })
            });
        });
        
    });
</script>