<?php

class Student
{
    public $conn;

    public function __construct()
    { // Hàm khởi tạo kết nối đối tượng
        $this->conn = connectDB();
    }

    // Lấy toàn bộ dữ liệu
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM tbl_lophoc ORDER BY id DESC';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function __destruct()
    {  // Hàm hủy kết nối đối tượng
        $this->conn = null;
    }
}
