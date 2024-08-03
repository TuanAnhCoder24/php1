<!DOCTYPE html>
<html lang="en">
include 'connect.php';
    if ($conn) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $address = $_POST['address'];

            $sql = 'INSERT INTO users (name, email, age, address)
            VALUE (:name, :email, :age, :address)';

            $stmt = $conn->prepare($sql);

            if ($stmt->execute([':name' => $name, ':email' => $email, ':age' => $age, ':address' => $address])) {
                header("Location:3.php");
                exit();
            } else {
                echo $stmt->errorInfo();
            }
        }
    } else {
        echo 'Lỗi kết nối với Database';
    }

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <style>
        td.diem {
            background-color: yellow;
        }

        td.nam_sinh {
            background-color: red;
        }
    </style>
</head>

<body>
    <?php
    $dataStudent = [
        [
            "ten" => "Nguyễn Tuấn Anh",
            "nam_sinh" => 2004,
            "diem" => 10
        ],
        [
            "ten" => "Nguyễn Hải Dương",
            "nam_sinh" => 2008,
            "diem" => 9
        ],
        [
            "ten" => "Nguyễn Minh Nhật",
            "nam_sinh" => 2005,
            "diem" => 8
        ],
    ];
    ?>
    <table border="2">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Năm Sinh</th>
                <th>Điểm</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dataStudent as $students) {
                $value = $students["diem"] >= 9 && $students["diem"] < 10;
                $value1 = (date("Y") - $students["nam_sinh"]) < 18;

                if ($value || $value1) {
                    echo "<tr>
            <td>$students[ten]</td>
            <td class='nam_sinh'>$students[nam_sinh]</td>
            <td class='diem'>$students[diem]</td>
            </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<?php
$host = 'localhost';
$db = 'ass1';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $conn = new PDO($dsn, $user, $pass, $options);
    echo ' Kết nối thành công Database ';
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}



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
