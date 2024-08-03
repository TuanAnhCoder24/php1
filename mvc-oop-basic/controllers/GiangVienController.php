<?php
//Controller xử lí dữ liệu 
class GiangVienController
{
    public $modelGiangVien;

    public function __construct()
    {
        $this->modelGiangVien = new GiangVien;
    }
    public function dachsachgiangvien()
    {
        $listGiangVien = $this->modelGiangVien->getAllGiangVien();
        $listTopGiangVien = $this->getTop5GiangVien($listGiangVien);
        //Gọi đến view hiển thị
        require_once './views/giangVien.php';
    }
    public function getTop5GiangVien($listGiangVien)
    {
        // Tính tuổi giảng viên và thêm vào mảng
        $namhientai = date('Y');
        foreach ($listGiangVien as &$giangVien) {
            $giangVien['tuoi'] = $namhientai - $giangVien['namSinh'];
        }


        //khai báo top5GiangVien bằng rỗng
        $top5GiangVien = [];

        // Tìm 5 giảng viên có tuổi lớn nhất
        for ($i = 0; $i < 5; $i++) {
            $value = null;
            foreach ($listGiangVien as $key => $giangVien) {
                if ($value == null || $giangVien['tuoi'] > $listGiangVien[$value]['tuoi']) {
                    $value = $key; // Cập nhật value là key hiện tại
                }
            }
            // Thêm giảng viên có tuổi lớn nhất vào mảng top5GiangVien
            if ($value !== null) {
                $top5GiangVien[] = $listGiangVien[$value];
                // Xóa giảng viên đã đưuọc thêm vào mảng top5GiangVien tránh lặp lại
                unset($listGiangVien[$value]);
            }
        }
        return $top5GiangVien;
    }
}
