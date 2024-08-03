<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Danh sách lớp</h1>
    <a href="./?act=form-add-class"><button>Thêm lớp</button"></a>
    <table border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Ảnh Lớp</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listClass as $key => $class) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $class['maLop'] ?></td>
                    <td><?php echo $class['tenLop'] ?></td>
                    <td><img src="<?php echo $class['anhLop'] ?>" style="width: 100px" alt=""></td>
                    <td>
                        <a href="./?act=form-update-class&id_lop=<?php echo $class['id'] ?>"><button>Sửa</button></a>
                        <a href="./?act=delete-class&id_lop=<?php echo $class['id'] ?>">
                            <button onclick="return confirm('bạn có muốn xoá không')">Xoá</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</body>

</html>