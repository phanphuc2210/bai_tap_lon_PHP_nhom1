<?php
// $hostName = "localhost";
// $databaseName = "qlbansua";
// $username = "root";
// $password = "";

define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_HOST", "localhost");
define("DB_NAME", "qlbansua");

// Ket noi CSDL
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or die ('Không thể kết nối tới database'. mysqli_connect_error());
mysqli_set_charset($conn, 'UTF8');