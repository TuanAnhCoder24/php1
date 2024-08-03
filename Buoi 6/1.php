<?php
include 'db_connect.php';
//Chuẩn bị câu lệnh truy vấn
$sql = 'SELECT * FROM tbl_sinhvien';
//Chuẩn bị câu lệnh bằng phương thức prepare
$stmt = $conn->prepare($sql);
//Thực thi câu lệnh sql
$stmt->execute();
//Lấy dữ liệu ra dưới dạng mảng kết hợp
$listStudent = $stmt->fetchAll();
// var_dump($listStudent);

//Btvn : in bảng dữ liệu listStudent ra table
?>
<a href="add.php" type="button">Thêm sinh viên</a>
<table border="1">
    <h2>Danh sách sinh viên</h2>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>SDT</th>
            <th>Giới tính</th>
            <th>imgSinhVien</th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listStudent as $key => $value) {
            echo "<tr>
            <td>$value[id]</td>
            <td>$value[hoTen]</td>
            <td>$value[sdt]</td>
            <td>$value[gioiTinh]</td>
            <td>$value[imgSinhVien]</td>
            </tr>";
        }
        ?>
    </tbody>
</table>