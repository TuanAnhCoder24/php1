<?php
include 'lab1_connect.php';

$error = [];

if ($conn) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];

        //Kiểm lỗi forms
        if (empty($title)) {
            $error[] = "Tiêu đề không được để trống";
        }
        if (empty($author)) {
            $error[] = "Tác giả không được để trống";
        }
        if (!is_numeric($year) || $year <= 0) {
            $error[] = "Năm xuất bản phải là số và lớn hơn 0";
        }
        if (empty($genre)) {
            $error[] = "Thể loại sách không được để trống";
        }

        //Nếu có lỗi khi nhập from thì sẽ hiển thị ra lỗi
        if (!empty($error)) {
            foreach ($error as $value) {
                echo "<p style = 'color: red;'>$value</p>";
            }
        } else {
            //nếu nhập vào form đúng thì dữ liệu được thêm vào bảng
            $sql = 'INSERT INTO books(title, author, year, genre) VALUE (:title, :author, :year, :genre)';

            $stmt = $conn->prepare($sql);

            if ($stmt->execute([':title' => $title, ':author' => $author, ':year' => $year, ':genre' => $genre])) {
                header('Location:1.php');
                exit();
            } else {
                echo $stmt->errorInfo();
            }
        }
    }
} else {
    echo 'Lỗi kết nối Database';
}
?>
<form action="" method="POST">
    <label for="title">Tiêu đề</label>
    <input type="text" name="title"><br>
    <label for="">Tác giả</label>
    <input type="text" name="author"><br>
    <label for="">Năm xuất bản</label>
    <input type="text" name="year"><br>
    <label for="">Thể loại</label>
    <input type="text" name="genre"><br>
    <button type="submit">Thêm books</button>
</form>