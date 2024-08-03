<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($email == "anh@gmail.com" && $password == "123456") {
            session_start();
            $_SESSION['email'] = $email;
            header('Location: trangchu.php');
        } else {
            echo  "Sai email or password";
        }
    }

    ?>
    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return valForm()">
        <h1>Sign up</h1>
        Email:
        <input type="email" name="email" id="email" placeholder="Nhập vào email của bạn">
        <!-- <div id="check1" style="color: red;"></div> -->
        Password:
        <input type="password" name="password" id="password" placeholder="Nhập vào mật khẩu của bạn">
        <!-- <div id="check2" style="color: red;"></div> -->
        <button type="submit" name="submit" id="submit">Đăng nhập</button>
    </form>
    <!-- <script>
        function valForm() {
            var email = document.getElementById('email');
            var password = document.getElementById('password');

            if (email == '') {
                document.getElementById('check1').innerText = 'Hãy nhập lại email';
                return false;
            }
        }
    </script> -->
</body>

</html>