<?php

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/LopController.php';
require_once './controllers/GiangVienController.php';

// Require toàn bộ file Models
require_once './models/Student.php';
require_once './models/Lop.php';
require_once './models/GiangVien.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    // '/' => (new HomeController())->home(),

    //Khai báo route mới hiển thị danh sách lớp 
    'danh-sach-lop' => (new LopController())->dachsachlop(),
    //Gọi đến = /?act=danh-sach-lop

    //Form thêm lớp học
    'form-add-class' => (new LopController())->formAddClass(),
    //Gọi đến = /?act=from-add-class
    'post-add-class' => (new LopController())->postAddClass(),
    //Gọi đến = /?act=post-add-class

    //Form sửa thông tin lớp học 
    'form-update-class' => (new LopController())->formUpdateClass($_GET['id_lop']),
    //Xử lí form sửa thông tin lớp 
    'post-update-class' => (new LopController())->postUpdateClass(),

    //Xoá lớp
    'delete-class' => (new LopController())->deleteClass($_GET['id_lop']),

    'danh-sach-giang-vien' => (new GiangVienController())->dachsachgiangvien(),
    //Gọi đến = /?act=danh-sach-giang-vien
};
