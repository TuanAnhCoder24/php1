<?php

//models thao tác với CSDL , truy vấn 
class GiangVien
{
    public $conn;
    //Dùng hàm khởi tạo để kết nối
    public function __construct()
    {
        $this->conn = connectDB();
    }


    //Viết hàm lấy toàn bộ danh sách lớp
    public function getAllGiangVien()
    {
        try {
            $sql = 'SELECT * FROM tbl_giangvien'; //tăng dần ORDER BY namSinh ASC LIMIT 5;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    //Hàm đóng kết nối
    public function __destruct()
    {
        $this->conn = null;
    }
}
