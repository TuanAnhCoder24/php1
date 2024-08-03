<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // khoi tao bien kiem tra zem an loc chua
    $filter = false;
    // khoi tao mang luu cac chuyen bay sau khi loc
    $arr_air = [];
    //lay thoi diem hien tai
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $realtime = date('Y-m-d H:i:s');
    // viet funtion bien hien thi trang thai chuyen bay
    function trangThai($realtime, $thoi_gian_di, $thoi_gian_den)
    {
        if ($realtime >= $thoi_gian_di && $realtime <= $thoi_gian_den) {
            return 'đang bay';
        } elseif ($realtime < $thoi_gian_di) {
            return 'chưa bay';
        } else {
            return 'đã hạ cánh';
        }
    }

    $chuyenbay = [
        [
            "so_hieu_chuyen_bay" => "VN001",
            "noi_di" => "Quy nhơn",
            "noi_den" => "TPHCM",
            "tong_hanh_khach" => 100,
            "thoi_gian_di" => "2022-03-07 12:00:00",
            "thoi_gian_den" => "2022-03-07 14:00:00",
            "trang_thai" => "Chưa bay"
        ],
        [
            "so_hieu_chuyen_bay" => "VN002",
            "noi_di" => "Hà Nội",
            "noi_den" => "Đà Lạt",
            "tong_hanh_khach" => 60,
            "thoi_gian_di" => "2022-03-04 21:00:00",
            "thoi_gian_den" => "2022-03-05 01:00:00",
            "trang_thai" => "Đang bay"
        ],
        [
            "so_hieu_chuyen_bay" => "VN003",
            "noi_di" => "Hải Phòng",
            "noi_den" => "Huế",
            "tong_hanh_khach" => 50,
            "thoi_gian_di" => "2022-03-01 19:00:00",
            "thoi_gian_den" => "2022-03-01 21:00:00",
            "trang_thai" => "Đã bay"
        ],

    ];

    if (isset($_POST['so_hieu_chuyen_bay']) || (isset($_POST['thoi_gian_di']) && isset($_POST['thoi_gian_den']))) {
        foreach ($chuyenbay as $chuyen) {
            // khoi tao 1 bien cos gia tri true de kiem tra
            // chuyen bay co phu hop vs tieu chi loc bay ko
            $match = true;

            if (isset($_POST['so_hieu_chuyen_bay']) && $_POST['so_hieu_chuyen_bay'] !== '') {
                $so_hieu_chuyen_bay = $_POST['so_hieu_chuyen_bay'];
                if (strpos($chuyen['so_hieu_chuyen_bay'], $so_hieu_chuyen_bay) === false) {
                    $match = false;
                }
            }
            if ($match) {
                $arr_air[] = $chuyen;
            }
        }
        $filter = !empty($arr_air);
    }
    ?>

    <h2>Form đăng ký</h2>
    <form action="" method="POST">
        <label for="so_hieu_chuyen_bay">Số hiệu chuyến bay</label>
        <input type="text" name="so_hieu_chuyen_bay"><br><br>

        <label for="thoi_gian_di">Thời gian đi</label>
        <input type="text" name="thoi_gian_di"><br><br>

        <label for="thoi_gian_den">Thời gian đến</label>
        <input type="text" name="thoi_gian_den"><br><br>

        <input type="submit" value="Tìm kiếm">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>STT</th>
                <th>Số hiệu</th>
                <th>Nơi đi</th>
                <th>Nơi đến</th>
                <th>Thời gian đi</th>
                <th>Thời gian đến</th>
                <th>Tổng khách hàng</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <?php if ($filter == false) : ?>
            <tbody>
                <?php foreach ($arr_air as $key => $chuyen) : ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $chuyen['so_hieu_chuyen_bay'] ?></td>
                        <td><?php echo $chuyen['noi_di'] ?></td>
                        <td><?php echo $chuyen['noi_den'] ?></td>
                        <td><?php echo $chuyen['thoi_gian_di'] ?></td>
                        <td><?php echo $chuyen['thoi_gian_den'] ?></td>
                        <td><?php echo $chuyen['tong_hanh_khach'] ?></td>
                        <td><?php echo trangThai($realtime, $chuyen['thoi_gian_di'], $chuyen['thoi_gian_den']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        <?php endif; ?>
    </table>
</body>

</html>