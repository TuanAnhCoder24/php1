<?php
// object là một đối tượng chứa được mọi loại dữ liệu
// - Có thể chứa được mọi kiểu data như : biến, hàm, mảng, object...
// class là một lớp khuôn mẫu,
// khi truyền dữ liệu vào class sẽ sinh ra object mới 

//Khởi tạo class
class sinhvien
{
    //Khai báo thuộc tính 
    public $name;
    public $age;
    public $gender;
    public $listNyc;

    //Khai báo phương thức khởi tạo Obj
    public function __construct($name, $age, $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->listNyc[] = [];
    }

    //Viết hàm thêm phần tử vào mảng
    public function addNyc($nyc)
    {
        $this->listNyc[] = $nyc;
    }

    //Hàm hiển thị listNyc
    public function listNyc()
    {
        print_r($this->listNyc);
    }

    //Khởi tạo các phương thức khác
    public function tinhNamSinh()
    {
        $namhientai = date('Y');
        $namsinh = $namhientai - $this->age;
        echo "Năm sinh của sinh viên " . $this->name . " là: " . $namsinh;
    }
}

//Khởi tạo Obj
$student1 = new sinhvien('Nguyễn Tuấn Anh', 20, 'Nam');
$student2 = new sinhvien('Nguyễn Ngọc Anh', 19, 'Nữ');

//Truy vấn dữ liệu từ Obj
echo 'Tên sinh viên 1 là: ' . $student1->name;
echo '<br>';
echo 'Giới tính sinh viên 1 là: ' . $student1->gender;
echo '<br>';
$student1->tinhNamSinh();
echo '<br>';

echo '<hr>';

echo 'Tên sinh viên 2 là: ' . $student2->name;
echo '<br>';
echo 'Giới tính sinh viên 2 là: ' . $student2->gender;
echo '<br>';
$student2->tinhNamSinh();
echo '<br>';

echo '<hr>';

//Thêm dữ liệu vào bảng listNyc
$student1->addNyc('Minh');
$student1->addNyc('Long');
$student1->addNyc('Tiến');
$student1->addNyc('Hùng');

$student1->listNyc();
