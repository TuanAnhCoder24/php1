<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Top 5 Giảng Viên có số tuổi lớn nhất</h1>
    <table border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Giảng Viên</th>
                <th>Họ Và Tên</th>
                <th>Năm Sinh</th>
                <th>Tuổi</th>
                <th>Số Điện Thoại</th>
                <th>Giới Tính</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listTopGiangVien as $key => $value) {
                echo "<tr>
                <td>$value[id]</td>
                <td>$value[maGiangVien]</td>
                <td>$value[hoVaTen]</td>
                <td>$value[namSinh]</td>
                <td>{$value['tuoi']}</td>
                <td>$value[soDienThoai]</td>
                <td>" . ($value['gioiTinh'] == 0 ? 'Nam' : 'Nữ') . "</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>