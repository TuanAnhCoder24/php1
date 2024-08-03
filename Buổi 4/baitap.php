<?php
//Bài tập
//Khởi tạo class nyc - đã xong
//Thuộc tính: tên, tuổi, địa chỉ, số điện thoại - đã xong
//Mảng listThuCung- đã xong
//Phương thức: hiển thị năm sinh, thêm thú cưng- đã xong

//Khởi tạo tối thiểu 2 obj từ class nyc
//hiển thị toàn bộ các dữ liệu thuộc tính - đã xong
//Mảng listThuCung thì in ra table - đã xong


class NYC
{
    public $ten;
    public $tuoi;
    public $diachi;
    public $sdt;
    public $listThucung;

    public function __construct($ten, $tuoi, $diachi, $sdt)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->diachi = $diachi;
        $this->sdt = $sdt;
        $this->listThucung = []; //khởi tạo mảng listThucung87i
    }
    //viết hàm 
    public function addThucung($thucung)
    {
        $this->listThucung[] = $thucung;
    }
    //hiển thị hàm
    public function tinhNamSinh()
    {
        //tính năm sinh 
        $namhientai = date('Y');
        $namsinh = $namhientai - $this->tuoi;
        echo "Năm sinh của nyc " . $this->ten . " là: " . $namsinh;
    }
    public function listThucung()
    {
        //in ra table
        echo '<table border="2">';
        echo '<tr><th>Thú cưng</th></tr>';
        foreach ($this->listThucung as $thucung) {
            echo '<tr><td>' . $thucung . '</td></tr>';
        }
        echo '</table>';
    }
}
//Khởi tạo Obj
$nyc1 = new NYC('Nguyễn Tuấn Anh', '19', 'Hà Nội', '0912345567');
$nyc2 = new NYC('Đỗ Xuân Long', '20', 'Hà Tây', '012345678');

//Truy vấn
echo 'Tên nyc 1 là: ' . $nyc1->ten;
echo '<br>';
echo 'Tuổi của nyc 1 là: ' . $nyc1->tuoi;
echo '<br>';
echo 'Địa chỉ của nyc 1 là: ' . $nyc1->diachi;
echo '<br>';
echo 'Sdt của nyc 1 là: ' . $nyc1->sdt;
echo '<br>';
$nyc1->tinhNamSinh();

echo '<hr>';

echo 'Tên nyc 2 là: ' . $nyc2->ten;
echo '<br>';
echo 'Tuổi của nyc 2 là: ' . $nyc2->tuoi;
echo '<br>';
echo 'Địa chỉ của nyc 2 là: ' . $nyc2->diachi;
echo '<br>';
echo 'Sdt của nyc 2 là: ' . $nyc2->sdt;
echo '<br>';
$nyc2->tinhNamSinh();

echo '<hr>';

$nyc1->addThucung('Chó');
$nyc1->addThucung('Mèo');
$nyc1->addThucung('Rắn');
$nyc2->addThucung('Gấu');
$nyc2->addThucung('Gà');
$nyc2->addThucung('Cá sấu');

echo 'Danh sách thú cưng cảu nyc ' . $nyc1->ten . ' là:';
echo '<br>';
$nyc1->listThucung();
echo '<br>';
echo 'Danh sách thú cưng của nyc ' . $nyc2->ten . ' là:';
echo '<br>';
$nyc2->listThucung();
