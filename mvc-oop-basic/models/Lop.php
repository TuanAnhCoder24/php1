<?php
class Lop
{
    public $conn;
    //Dùng hàm khởi tạo để kết nối
    public function __construct()
    {
        $this->conn = connectDB();
    }


    //Viết hàm lấy toàn bộ danh sách lớp
    public function getAllLop()
    {
        try {
            $sql = 'SELECT * FROM tbl_lophoc';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function addLopHoc($maLop, $tenLop, $anhLop)
    {
        try {
            $sql = 'INSERT INTO tbl_lophoc (maLop, tenLop, anhLop) VALUES (:maLop , :tenLop, :anhLop)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':maLop' => $maLop, ':tenLop' => $tenLop, ':anhLop' => $anhLop]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi : ' . $e->getMessage();
        }
    }
    //Hàm đóng kết nối
    public function __destruct()
    {
        $this->conn = null;
    }
    public function getThongTinLop($id_lop)
    {
        try {
            $sql = 'SELECT * FROM tbl_lophoc WHERE id= ' . $id_lop;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function updateLopHoc($id, $maLop, $tenLop, $anhLop)
    {
        try {
            $sql = 'UPDATE tbl_lophoc SET maLop=:maLop, tenLop=:tenLop, anhLop=:anhLop WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':maLop' => $maLop, ':tenLop' => $tenLop, ':anhLop' => $anhLop, ':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi : ' . $e->getMessage();
        }
    }
    public function deleteLopHoc($id)
    {
        try {
            $sql = 'DELETE FROM tbl_lophoc WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi : ' . $e->getMessage();
        }
    }
}
