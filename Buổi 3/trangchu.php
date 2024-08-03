<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bạn đã đăng nhập thành công</h1>
    <?php
    session_start();
    if (isset($_SESSION['email']) && $_SESSION['email'] == 'anh@gmail.com') {
        setcookie("cookienguoidung", "sessionvalue", time() + (3 * 60), "/"); // 3 phút
        echo "Xin chào, " . $_SESSION['email'];
    } else {
        echo header('Location: login.php');
    }
    ?>
    <script>
        function logout() {
            alert('Bạn đã đăng xuất ?');
            // Xóa cookie khi người dùng dí logout
            document.cookie = "cookienguoidung=; expires=Mon, 13 May 2024 00:00:00 UTC; path=/";
            return true;
        }

        // Kiểm tra cookie khi load lại web
        window.onload = function() {
            var cookienguoidung = getCookie("cookienguoidung");
            if (cookienguoidung == null) {
                // Cookie không tồn tại hoặc đã hết hạn, chuyển hướng về trang đăng nhập
                window.location.href = "/login.php";
            }
        };
    </script>

    <button><a href="logout.php" onclick="logout()">Logout</a></button>

</body>

</html>