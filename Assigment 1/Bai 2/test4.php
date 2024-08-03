<?php
// Kết nối cơ sở dữ liệu và hiển thị danh sách người dùng.
// Tạo form để thêm người dùng mới vào bảng users.

// Thông tin cấu hình csdl
$host = "localhost";
$user = "root";
$pass = "";
$db = "ass1";
$charset = "utf8mb4";

// Tạo chuỗi chứa thông tin kết nối - Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Các tùy chọn của PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Chế độ báo lỗi
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Chế độ lấy dữ liệu, trả về mảng kết hợp
];
try {
    $conn = new PDO($dsn, $user, $pass, $options);
    // echo "Kết nối CSDL thành công";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$sql = 'SELECT * FROM users';

$stmt = $conn->prepare($sql);

$stmt->execute();

$users = $stmt->fetchAll();

//Kết nối DB   
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
    echo 'Lỗi kết nối DB';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASM1</title>
</head>

<body>
    <h1>Danh sách người dùng</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Address</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['age'] ?></td>
                <td><?= $user['address'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Thêm người dùng mới</h2>
    <form action="add_user.php" method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        <br>
        <input type="submit" value="Thêm người dùng">
    </form>
</body>

</html>