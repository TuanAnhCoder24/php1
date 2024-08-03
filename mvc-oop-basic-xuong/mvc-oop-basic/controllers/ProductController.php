<?php
//Xử li logic
class ProductController
{
    public $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }
    public function listProduct()
    {
        //Xử lí logic để trả về danh sách sản phẩm 
        $listProduct = $this->modelProduct->getAllProduct();
        // var_dump($listProduct);
        // die();
        require_once './views/danhsachsanpham.php';
    }
    public function formAddProduct()
    {
        require_once './views/formAddProduct.php';
    }
    public function createProduct()
    {
        //kiếm tra xem người dùng đã nhấn nút submit hay chưa
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Lấy ra dữ liệu từ form
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia = $_POST['gia'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $id_danh_muc = $_POST['id_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            $link_anh = $_FILES['link_anh'];

            //Đặt tên cho ảnh khi lưu
            $folderSave = './uploads/';
            $file_upload = $_FILES['link_anh'];
            $pathStorage = $folderSave . rand(10000, 99999) . $file_upload['name'];

            $tmp_file = $file_upload['tmp_name'];
            $pathSave = PATH_ROOT . $pathStorage;

            if (move_uploaded_file($tmp_file, $pathSave)) {
                if ($this->modelProduct->addProduct($ten_san_pham, $gia, $gia_khuyen_mai, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $pathStorage)) {
                    header('Location:./?act=danh-sach-san-pham');
                } else {
                    echo 'Lỗi khi thêm sản phẩm';
                }
            }
        } else {
            header('Location: ./?act=form-add-product');
        }
    }
}
