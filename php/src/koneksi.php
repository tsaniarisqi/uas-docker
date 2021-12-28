<?php
define('DB_SERVER', '172.20.0.2');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'db_karyawan');

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$con){
	die("Koneksi gagal:".mysqli_connect_error());
}
?>