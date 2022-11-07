

<style type="text/css">
    form {
        display: inline-block;
        padding: 4px;
        background-color: #d24dff;
    }

    table {
        background: #ffd94d;
        border: 0 solid yellow;
    }

    thead {
        background: #fff14d;
    }

    td {
        padding: 0 8px;
    }

    td:first-child {
        color: blue;
        text-align: right;
    }
</style>

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 2.3:</u> Tạo trang web thực hiện phép tính trên 2 số</a></h2>
    <!-- ================== Phần thay đổi nằm ở đây =========================== -->
    <form align='center' action="ketquapheptinh.php" method="post" id="pheptinh">
        <table>
            <thead>
                <th colspan="2" style="padding: 4px;">
                    <h5 class="text-center">Phép tính trên hai số</h5>
                </th>
            </thead>
            <tr>
                <td style="color: red;">Chọn phép tính:</td>
                <td>
                    <input type="radio" name="pheptinh" value="Cộng" checked/> Cộng
                    <input type="radio" name="pheptinh" value="Trừ" /> Trừ
                    <input type="radio" name="pheptinh" value="Nhân" /> Nhân
                    <input type="radio" name="pheptinh" value="Chia"/> Chia
                </td>
            </tr>

            <tr>
                <td>Số thứ nhất:</td>
                <td>
                    <input type="text" id="so1" name="so1"/>
                    <span id="error1" style="color: red;"></span>
                </td>
            </tr>

            <tr>
                <td>Số thứ hai:</td>
                <td>
                    <input type="text" id="so2" name="so2" />
                    <span id="error2" style="color: red;"></span>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Tính" name="tinh" id="tinh"/>
                </td>
            </tr>
        </table>
    </form>

<script>
    var so1 = document.querySelector("#so1")
    var so2 = document.querySelector("#so2")
    var tinh = document.querySelector("#tinh")
    var error1 = document.querySelector("#error1")
    var error2 = document.querySelector("#error2")

    tinh.addEventListener("click", (e) => {
        if(isNaN(so1.value)) {
            error1.innerHTML = "Vui lòng nhập số !!!"
            e.preventDefault()
        }else if(so1.value == "" ) {
            error1.innerHTML = "Vui lòng nhập giá trị !!!"
            e.preventDefault()
        }
        else {
            error1.innerHTML = ""
        }

        if(isNaN(so2.value)) {
            error2.innerHTML = "Vui lòng nhập số !!!"
            e.preventDefault()
        }else if(so2.value == "" ) {
            error2.innerHTML = "Vui lòng nhập giá trị !!!"
            e.preventDefault()
        }
        else {
            error2.innerHTML = ""
        }
        
        if(so1.value != "" && so2.value != "" && !isNaN(so1.value) && !isNaN(so2.value)) {
            document.querySelector("#pheptinh").submit()
        } 
    })
</script>
