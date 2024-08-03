<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Form thêm lớp học</h1>
    <form action="./?act=post-add-class" method="post" enctype="multipart/form-data">
        <label for="maLop">Mã lớp:</label><br>
        <input type="text" name="maLop" id=""><br>
        <label for="tenLop">Tên lớp:</label><br>
        <input type="text" name="tenLop" id=""><br>
        <input type="file" name="anhLop"><br>
        <button type="submit">Thêm lớp học </button>
    </form>
</body>

</html>