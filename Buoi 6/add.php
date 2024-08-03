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
    include 'db_connect.php';
    if ($conn) { //Nếu kết nối thnahf công thì thực thi tiếp
        //Kiểm tra xem đã submit form chưa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Lấy dữ liệu từ form
            $hoten = $_POST['hoten'];
            $sdt = $_POST['sdt'];
            $gioiTinh = $_POST['gioiTinh'];
            // var_dump($_POST);die();
            //Chuẩn bị câu lệnh truy vấn
            $sql = 'INSERT INTO tbl_sinhvien (hoTen, sdt, gioiTinh)
            VALUE (:hoTen, :sdt, :gioiTinh)';

            //Chuẩn bị truy vấn qua prepare
            $stmt = $conn->prepare($sql);

            //Thực thi câu lệnh
            if ($stmt->execute([':hoTen' => $hoten, ':sdt' => $sdt, ':gioiTinh' => $gioiTinh])) {
                //Nếu thêm thành công dữ liệu thì redirect về trang chủ
                header("Location:1.php");
                exit();
            } else {
                echo $stmt->errorInfo();
            }
        }
    } else {
        echo 'Lỗi kết nối DB';
    }
    ?>
    <form action="" method="post">
        <label for="">Họ tên: </label>
        <input type="text" name="hoten"><br>
        <label for="">Sdt: </label>
        <input type="text" name="sdt"><br>
        <label for="">Giới tính: </label>
        <select name="gioiTinh" id="gioiTinh">
            <option value="Nữ">Nữ</option>
            <option value="Nam">Nam</option>
        </select><br>
        <button type=" submit">Thêm sinh viên</button>
    </form>
</body>

</html>