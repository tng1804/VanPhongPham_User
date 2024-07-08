<?php
    $conn = mysqli_connect("localhost", "root", "admin", "chvanphongpham");
    if(!$conn){
        die("Ket noi khong thanh cong");
        exit();
    }
mysqli_set_charset($conn, "utf8");
?>
