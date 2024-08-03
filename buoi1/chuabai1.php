<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>
    <?php
    $dataStudent = [
        [
            "ten" => "Nguyễn Tuấn Anh",
            "nam_sinh" => 2004,
            "diem" => 10
        ],
        [
            "ten" => "Nguyễn Hải Dương",
            "nam_sinh" => 2008,
            "diem" => 9
        ],
        [
            "ten" => "Nguyễn Minh Nhật",
            "nam_sinh" => 2005,
            "diem" => 8
        ],
    ];
    ?>
    <table border="2">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Năm Sinh</th>
                <th>Điểm</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataStudent as $key => $students) : ?>
                <?php
                $namhientai = date('Y');
                $tuoi = $namhientai - $students['nam_sinh'];

                // điểm >=9 và điểm <10 thì background màu vàng
                if ($students['diem'] >= 9 && $students['diem'] < 10) {
                    $bg_color = 'yellow';
                } else {
                    $bg_color = 'none';
                }
                //tuổi <18 thì màu đỏ
                if ($tuoi < 18) {
                    $back_color = 'red';
                } else {
                    $back_color = 'none';
                }
                ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $students['ten'] ?></td>
                    <td style="background-color: <?php echo $back_color; ?>;"><?php echo $tuoi ?></td>
                    <td style="background-color: <?php echo $bg_color; ?>;"><?php echo $students['diem'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>