<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <h1>Thêm thông tin sản phâm</h1>
    <form action="./?act=them-product" method="post" enctype="multipart/form-data">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="ten_san_pham" placeholder="Nhập tên sản phẩm"><br>

        <label for="">Giá</label>
        <input type="number" name="gia" min="0" placeholder="Nhập giá sản phẩm"><br>

        <label for="">Giá khuyến mãi</label>
        <input type="number" name="gia_khuyen_mai" min="0" placeholder="Nhập giá khuyến mãi của sản phẩm"><br>

        <label for="">Số lượng</label>
        <input type="number" name="so_luong" placeholder="Nhập số lượng sản phẩm"><br>

        <label for="">Ngày nhập</label>
        <input type="date" name="ngay_nhap"><br>

        <label for="">Danh mục</label>
        <select name="id_danh_muc" id="">
            <option value="1">Điện thoại</option>
            <option value="2">Laptop</option>
            <option value="3">Máy tính bảng</option>
        </select><br>

        <label for="">Hình ảnh</label>
        <input type="file" name="link_anh" placeholder="Chọn hình ảnh"><br>

        <label for="">Trạng thái</label>
        <select name="trang_thai" id="">
            <option value="Còn hàng">Còn hàng</option>
            <option value="Hết hàng">Hết hàng</option>
        </select><br>
        <button type="submit">Thêm sản phẩm</button>
    </form>
</body>

</html>