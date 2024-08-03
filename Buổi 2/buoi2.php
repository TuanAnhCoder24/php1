<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //
    $filter = false;
    //
    $arr_chuyen = [];
    //
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $realtime = date('Y-m-d H:i:s');
    // 
    function trangThai($realtime, $thoi_gian_di, $thoi_gian_den)
    {
        if ($realtime >= $thoi_gian_di && $realtime <= $thoi_gian_den) {
            return 'đang bay';
        } elseif ($realtime < $thoi_gian_di) {
            return 'chưa bay';
        } else
            return 'đã hạ cánh';
    }

    $danhSachChuyenBay = [
        [
            "STT" => 1,
            "so_hieu_chuyen_bay" => "VN001",
            "noi_di" => "Quy nhơn ",
            "noi_den" => "TPHCM",
            "tong_hanh_khach" => 100,
            "thoi_gian_di" => "2022-03-02 12:00:00",
            "thoi_gian_den" => "2022-03-04 14:00:00",
        ],
        [
            "STT" => 2,
            "so_hieu_chuyen_bay" => "VN002",
            "noi_di" => "hà nội",
            "noi_den" => "Đà lạt",
            "tong_hanh_khach" => 60,
            "thoi_gian_di" => "2022-03-02 17:00:00",
            "thoi_gian_den" => "2022-03-04 18:00:00",
        ],
        [
            "STT" => 3,
            "so_hieu_chuyen_bay" => "VN003",
            "noi_di" => "Hải phòng",
            "noi_den" => "Huế",
            "tong_hanh_khach" => 50,
            "thoi_gian_di" => "2022-03-02 19:00:00",
            "thoi_gian_den" => "2022-03-04 21:00:00",
        ]
    ];
    $chuyen = [];
    if (isset($_GET['so_hieu_chuyen_bay']) || (isset($_GET['thoi_gian_di']) && isset($_GET['thoi_gian_den']))) {
        foreach ($danhSachChuyenBay as $chuyen) {
            // khoi tao 1 bien cos gia tri true de kiem tra
            // chuyen bay co phu hop vs tieu chi loc bay ko
            $match = true;

            if (isset($_GET['so_hieu_chuyen_bay']) && $_GET['so_hieu_chuyen_bay'] !== '') {
                $so_hieu_chuyen_bay = $_GET['so_hieu_chuyen_bay'];
                if (strpos($chuyen['so_hieu_chuyen_bay'], $so_hieu_chuyen_bay) === false) {
                    $match = false;
                }
            }
            if ($match) {
                $arr_chuyen[] = $chuyen;
            }
        }
        $filter = !empty($arr_chuyen);
    } else {
        $arr_chuyen = $danhSachChuyenBay;
        $filter = true;
    }
    ?>

    <h2>Thông tin</h2>
    <form action="index.php" method="GET">
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
        <?php if ($filter) : ?>
            <tbody>
                <?php foreach ($arr_chuyen as $key => $chuyen) : ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $chuyen['so_hieu_chuyen_bay'] ?></td>
                        <td><?php echo $chuyen['noi_di'] ?></td>
                        <td><?php echo $chuyen['noi_den'] ?></td>
                        <td><?php echo $chuyen['thoi_gian_di'] ?></td>
                        <td><?php echo $chuyen['thoi_gian_den'] ?></td>
                        <td><?php echo $chuyen['tong_hanh_khach'] ?></td>
                        <td><?php echo isset($realtime) ? trangThai($realtime, $chuyen['thoi_gian_di'], $chuyen['thoi_gian_den']) : "Unknown" ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        <?php endif; ?>
    </table>
</body>

</html>