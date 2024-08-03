<?php
include 'connect.php';

$sql = 'SELECT * FROM users';

$stmt = $conn->prepare($sql);

$stmt->execute();

$listPerson = $stmt->fetchAll();

//in ra table
?>
<button><a href="4.php" type="button">Thêm users</a></button>
<table border="1">
    <h2>Danh Sách Người Dùng</h2>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Tuổi</th>
            <th>Địa chỉ</th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listPerson as $key => $value) {
            echo "<tr>
            <td>$value[id]</td>
            <td>$value[name]</td>
            <td>$value[email]</td>
            <td>$value[age]</td>
            <td>$value[address]</td>
            </tr>";
        }
        ?>
    </tbody>
</table>