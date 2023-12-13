<div class="title">QUẢN LÝ NGƯỜI DÙNG</div>
<center>
    <table width="60%">
        <tbody>
            <tr>
                <td width="36%">Họ và Tên:</td>
                <td width="64%"><input type="text" id="name" name="uname" size="50" maxlength="24" require></td>
            </tr>
            <tr>
                <td width="36%">Email:</td>
                <td width="60%"><input type="email" id="email" name="email" size="50" require></td>
                <td width="4%">
                    <i class="fa-regular fa-circle-check correct" style="display:none;font-weight: 600;color: #00ff11;"></i>
                    <i class="fa-solid fa-circle-xmark error" style="display:none;font-weight: 600;color: #ff0000;"></i>
                </td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" id="psw1" name="psw1"></td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu:</td>
                <td><input type="password" id="psw2" name="psw2"></td>
            </tr>
            <tr>
                <td width="36%">Address:</td>
                <td width="64%"><input type="text" id="address" name="address" size="50"></td>
            </tr>
            <tr>
                <td width="36%">Role:</td>
                <td width="64%">
                    <select name="role" id="role">
                        <option value="ROLE_ADMIN">Admin</option>
                        <option value="ROLE_USER">User</option>
                        <option value="ROLE_MEMBER">Member</option>
                    </select><br>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <tbody>
            <tr align="center">
                <td>
                    <input type="submit" id="add_user" name="cmd" value="Đồng ý">
                </td>
            </tr>
        </tbody>
    </table>
</center><br><br><br>
<center>
    <table width="80%" border="1" style="border-collapse: collapse">
        <tbody>
            <tr align="center">
                <td width="3%">Stt</td>
                <td width="20%">Họ và Tên</td>
                <td width="25%">Email</td>
                <td width="20%">Địa chỉ</td>
                <td width="10%">Role</td>
                <td width="10%">Quản lý</td>
            </tr>
        </tbody>
    </table>
</center>
<script>
$(document).ready(function() {
            const validateEmail = (email) => {
                return email.match(
                    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
            };
            const validate = () => {
                const correct = $('.correct')
                const error = $('.error')
                const email = $('#email').val();

                console.log(email)
                if (validateEmail(email)) {
                    correct.show();
                    error.hide();
                } else {
                    error.show();
                    correct.hide();
                }
                if (email == "") {
                    error.hide();
                }
                return false;
            }
            $('#email').on('input', validate);
});
</script>
