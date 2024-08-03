<?php
class LopController
{
    public $modelLop;
    public function __construct()
    {
        $this->modelLop = new Lop;
    }
    public function dachsachlop()
    {
        // echo ' Đây là controller danh sách lớp';
        $listClass = $this->modelLop->getAllLop();
        // var_dump($listClass);
        // die();

        //Gọi đến view hiển thị
        require_once './views/quanLyLop.php';
    }
    //Hàm hiển thị form thêm lớp
    public function formAddClass()
    {
        require_once './views/formAddClass.php';
    }
    public function postAddClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['maLop'])) {
            $maLop = $_POST['maLop'];
            $tenLop = $_POST['tenLop'];
            $anhLop = $_FILES['anhLop'];
            if ($this->modelLop->addLopHoc($maLop, $tenLop, uploadFile($anhLop, './uploads/'))) {
                header('Location: ./?act=danh-sach-lop');
            } else {
                echo 'Lỗi khi thêm sinh viên';
            }
        } else {
            header('Location: ./?act=form-add-class');
        }
    }
    public function formUpdateClass($id_lop)
    {
        //Lấy thông tin của lớp theo id_lop
        $class = $this->modelLop->getThongTinLop($id_lop);
        require_once './views/formUpdateClass.php';
    }
    public function postUpdateClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['maLop'])) {
            $id = $_POST['id'];
            $maLop = $_POST['maLop'];
            $tenLop = $_POST['tenLop'];
            $old_file = $_POST['old_file'];
            $anhLop = $_FILES['anhLop'];

            //3 trường hợp
            //1. Lớp chưa có ảnh
            //2. Lớp có ảnh và sẽ sửa ảnh 
            //3. Lớp có ảnh và không sửa ảnh
            if (isset($anhLop) && $anhLop['error'] == UPLOAD_ERR_OK) {
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
                //Sau khi xoá xong sẽ thêm file mới vào
                $file_update = uploadFile($anhLop, './uploads/');
            } else { //Trường hợp không upload ảnh mới
                $file_update = $old_file;
            }
            if ($this->modelLop->updateLopHoc($id, $maLop, $tenLop, $file_update)) {
                header('Location: ./?act=danh-sach-lop');
            } else {
                echo 'Lỗi khi thêm sinh viên';
            }
        } else {
            header('Location: ./?act=form-add-class');
        }
    }
    public function deleteClass($id)
    {
        try {
            $this->modelLop->deleteLopHoc($id);

            header('Location: ./?act=danh-sach-lop');
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
}
