<?php
echo 'Đây là file b <br>';
include 'a.php'; //nếu include sai thì báo lỗi và chương trình tiếp tục được thực thi
include_once 'a.php'; //chỉ nhận đúng 1 lầnk lặp lại  

require 'a.php'; //nếu require sai thì báo lỗi và dừng toàn bộ chương trình(không thực thi đoạn mã phía dưới)
require_once 'a.php'; //chỉ nhận đúng 1 lần k lặp lại 
echo '<br> Đây là biến $name ở file a: ' . $name . $tuoi;
echo '<br>Kết thúc file b';
