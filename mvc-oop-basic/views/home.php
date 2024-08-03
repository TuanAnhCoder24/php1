<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="mb-5">Trang chủ</h1>
            <table border="1">
                <thead>
                    <th>STT</th>
                    <th>Mã Lớp</th>
                    <th>Tên Lớp</th>
                    <!-- <th>Giới tính</th> -->
                </thead>
                <tbody>
                    <?php foreach ($listStudent as $key => $student) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $student['maLop'] ?></td>
                            <td><?= $student['tenLop'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</body>

</html>