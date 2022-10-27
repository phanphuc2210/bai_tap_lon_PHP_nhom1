<?php
require_once "config.php";

// Ket noi CSDL
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or die ('Không thể kết nối tới database'. mysqli_connect_error());
mysqli_set_charset($conn, 'UTF8');