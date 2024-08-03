<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Chỉnh sửa thông tin lớp <?php echo $class['tenLop']; ?></h1>
    <form action="./?act=post-update-class" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $class['id']; ?>" hidden>

        <label for="maLop">Mã lớp</label><br>
        <input type="text" name="maLop" value="<?php echo $class['maLop']; ?>"><br>

        <label for="tenLop">Tên lớp</label><br>
        <input type="text" name="tenLop" value="<?php echo $class['tenLop']; ?>"><br>
        <input type="text" name="old_file" value="<?php echo $class['anhLop']; ?>" hidden>
        <input type="file" name="anhLop"><br>

        <button type="submit">Sửa thông tin lớp học</button>
    </form>


</html>