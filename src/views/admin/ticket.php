<div class="title">QUẢN LÝ VÉ</div>
<center>
    <table width="70%">
        <tbody>
            <tr>
                <td width="36%">Thành phố:</td>
                <td width="64%"><input type="text" id="city" name="city" size="45" maxlength="24" require></td>
            </tr>
            <tr>
                <td width="36%">Ngày biểu diễn:</td>
                <td width="64%"><input type="date" id="date" name="date"require></td>
                <td width="1%">
                    <i class="fa-regular fa-circle-check correct" style="display:none;font-weight: 600;color: #00ff11;"></i>
                    <i class="fa-solid fa-circle-xmark error" style="display:none;font-weight: 600;color: #ff0000;"></i>
                </td>
            </tr>
            <tr>
                <td width="36%">Miêu tả:</td>
                <td width="64%"><input type="text" id="address" name="address" maxlength="100"></td>
            </tr>
            <tr>
                <td width="36%">Giá Vé:</td>
                <td width="64%">
                <input type="number" id="address" name="address" size="50">
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
                <th>STT</th>
                <th>Thành phố</th>
                <th>Ngày biểu diễn</th>
                <th>Miêu tả</th>
                <th>Giá vé</th>
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