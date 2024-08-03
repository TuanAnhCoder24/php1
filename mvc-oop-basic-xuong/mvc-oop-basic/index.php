<?php
//Require toàn bộ flie Models, Controllers.. không required Views
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    // '/'=>(new ProductController())->Home(),
    'danh-sach-san-pham' => (new ProductController())->listProduct(),
    
    'form-add-product' => (new ProductController())->formAddProduct(),
    
    'them-product' => (new ProductController())->createProduct(),
};
