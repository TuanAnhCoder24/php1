<?php
// object là một đối tượng chứa được mọi loại dữ liệu
// - Có thể chứa được mọi kiểu data như : biến, hàm, mảng, object...
// class là một lớp khuôn mẫu,
// khi truyền dữ liệu vào class sẽ sinh ra object mới 
// Bài 1: Tạo Class Object
// Yêu cầu:
// -	Tạo một class Person với các thuộc tính name, age, và address.
// -	Tạo các phương thức __construct, getName, getAge, getAddress, setName, setAge, và setAddress.
// -	Tạo một đối tượng của class Person và hiển thị thông tin của đối tượng đó.


//Khởi tạo class
class Person
{
    //Khai báo thuộc tính 
    public $name;
    public $age;
    public $address;

    //Khai báo phương thức khởi tạo Obj
    public function __construct($name, $age, $address)
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }
    // Phương thức getName
    public function getName()
    {
        return $this->name;
    }

    // Phương thức getAge
    public function getAge()
    {
        return $this->age;
    }

    // Phương thức getAddress
    public function getAddress()
    {
        return $this->address;
    }

    // Phương thức setName
    public function setName($name)
    {
        $this->name = $name;
    }

    // Phương thức setAge
    public function setAge($age)
    {
        $this->age = $age;
    }

    // Phương thức setAddress
    public function setAddress($address)
    {
        $this->address = $address;
    }
}

//Khởi tạo Obj tạo đối tượng
$person1 = new Person('Nguyễn Tuấn Anh', 20, 'Sóc Sơn');
$person2 = new Person('Nguyễn Ngọc Anh', 19, 'Quang Minh');

//Truy vấn dữ liệu từ Obj
echo 'Tên person 1 là: ' . $person1->name;
echo '<br>';
echo 'Tuổi person 1 là: ' . $person1->age;
echo '<br>';
echo 'Địa chỉ person 1 là: ' . $person1->address;
echo '<br>';

echo '<hr>';

// Thay đổi thông tin
$person1->setName("Bùi Quốc Hùng");
$person1->setAge(23);
$person1->setAddress("Mê Linh");

// Hiển thị thông tin mới ra
echo 'Tên person 1 đã update là: ' . $person1->getName() . "<br>";
echo 'Tuổi person 1 đã update là: ' . $person1->getAge() . "<br>";
echo 'Địa chỉ person 1 đã update là: ' . $person1->getAddress() . "<br>";
