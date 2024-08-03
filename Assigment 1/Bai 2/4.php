<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //Kết nối DB   
    include 'connect.php';
    if ($conn) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $tuoi = $_POST['tuoi'];
            $address = $_POST['name'];

            $sql = 'INSERT INTO userz'
        }
    } else {
        echo 'Lỗi kết nối với Database';
    }
    ?>
    <form action="" method="post">
        <label for="">Họ tên: </label>
        <input type="text" name="name" required><br>
        <label for="">Email: </label>
        <input type="text" name="email" required><br>
        <label for="">Tuổi: </label>
        <input type="number" name="age" min="0" required><br>
        <label for="">Địa chỉ</label>
        <input type="text" name="address" required><br>
        <button type=" submit">Thêm users</button>
    </form>
</body>

</html>