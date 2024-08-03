<?php
//Thông tin cấu hình DataBase
$host = 'localhost'; //địa chỉ sever
$db = 'db_wd19319'; //tên db
$user = 'root'; //tên người dùng
$pass = '';
$charset = 'utf8mb4'; //định dạng font chữ

//Tạo chuỗi chứa thông tin kết nối 
$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

//Các tuỳ chọn của PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //chế độ báo lỗi 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //chế độ lấy dữ liệu , trả về mảng kết hợp
];
try {
    //Viết kết nối cơ sở dữ liệu
    $conn = new PDO($dsn, $user, $pass, $options);
    //Nếu kết nối thành công in ra thông báo
    echo ' Kết nối thành công Database ';
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
