<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>tinh dien tich HCN</title>
    <style type="text/css">
        table{
            text-align: center;
        }
        td {
            color: blue;
        }
        h3{
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            font-size: medium;
        }
    </style>
</head>
<body>
    
<?php 
if(isset($_POST['one']))  
    $one=trim($_POST['one']);
else $one="";
if(isset($_POST['two'])) 
    $two=trim($_POST['two']); 
else $two="";
if(isset($_POST['pt'])) 
    $pt=trim($_POST['pt']); 
else $pt='';
?>
<form align='center' action="ketqua.php" method="post" id='form'>
<table>
    <thead>
        <th colspan="2" align="center"><h3>PHÉP TÍNH TRÊN 2 SỐ</h3></th>
    </thead>
    <tr>
        <td>Chọn phép Tính:</td>
        <td>
            <input type="radio" name="pt" value="plus" id="plus" checked/>
            <label for="plus">Cộng</label>
            <input type="radio" name="pt" value="minus" id="minus"/>
            <label for="minus">Trừ</label>
            <input type="radio" name="pt" value="times" id="times"/>
            <label for="times">Nhân</label>
            <input type="radio" name="pt" value="divide" id="chia"/>
            <label for="divide">Chia</label>
        </td>
    </tr>
    <tr>
        <td>Số thứ nhất:</td>
        <td>
            <input id="num1" type="text" name="one" value="<?php  echo $one;?>" placeholder="0"/>
        </td>
        <td><span id='error1'></span></td>
    </tr>
    <tr>
        <td>Số thứ hai:</td>
        <td>
            <input id="num2" type="text" name="two"  value="<?php  echo $two;?>" placeholder="0"/>
        </td>
        <td><span id='error2'></span></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" id='tinh'/></td>
    </tr>

</table>
</form>
<script>
        var num1 = document.querySelector('#num1');
        var num2 = document.querySelector('#num2');
        var error1 = document.querySelector('#error1');
        var error2 = document.querySelector('#error2');
        var form = document.querySelector('#form')
        var tinh = document.querySelector('#tinh');
        num1.addEventListener('blur', () => {
            if(isNaN(num1.value) || num1.value == '') {
                error1.innerHTML = 'Error!!!';
            } else {
                error1.innerHTML = '';
            }
        })
        num2.addEventListener('blur', () => {
            if(isNaN(num2.value) || num2.value == '') {
                error2.innerHTML = 'Error!!!';
            } else {
                error2.innerHTML = '';
            }
        })

        tinh.addEventListener('click', (e) => {
            if(num1.value == '' ||  num2.value == '' && (isNaN(num1.value) || isNaN(num2.value))) {
                error1.innerHTML = 'Error!!!';
                error2.innerHTML = 'Error!!!';
                e.preventDefault();
            } else if(num1.value != '' &&  num2.value != '' && !isNaN(num1.value) && !isNaN(num2.value)){
                form.submit();
            } else{
                e.preventDefault();
            }
        })
    </script>
</body>
</html>