<?php
include 'header.php';
// include 'slider.php';
// include 'footer.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>307Mart</title>
    <link rel="stylesheet" href="./css/main-index.css">
</head>

<body>
    <!-- <div class="slider">
        
    </div> -->
    <?php
    
    include './Config/connect.php';
    // Lấy ra rau cu qua 1
    $sql = "SELECT * FROM tbl_loai_sp";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='main-index'>
            <div class='table-sanpham'>
            <div class='header-product'>
                <div class='info'><p>" . $row['tenloaisp'] . "</p></div>
                
                <div class='btnXemThem'>
                    <a href='./SanphamLoai.php?id_loaisp=" . $row['id_loaisp'] . "'>
                    <button>Xem thêm</button>
                    </a>
                </div>
            </div>
            
            <table>
            
            <tbody>
            ";
            $count = 0;
            echo "<tr>";
                    $sql3 = "SELECT * FROM tblsanpham WHERE loaisp_id='" . $row['id_loaisp'] . "'";
                    $result3 = mysqli_query($conn, $sql3);
                    if (mysqli_num_rows($result3) > 0) {
                        $count = 0;
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            $count++;
                            echo "<td> 
                            <div class='item-product'>
                                <a href='./SanPhamDetail.php?id_sanpham=" . $row3['id_sanpham'] . "'>
                                <img src='./image/" . $row3['anhsp'] . "' alt='' width='150px;'> <br>
                                <p class = 'item-tensp'>" . $row3['tensp'] . "</p><br>
                                <span class = 'item-giasp'>" . $row3['giasp'] . " VNĐ</span> 
                                
                                    <button class='btn-addCart' name='btn-addCart'>
                                    <i class='fas fa-shopping-cart'></i>
                                    Xem thông tin chi tiết
                                </button>
                            
                                </a>
                            </div> 
                            </td>";
                            if ($count == 4) {
                                break;
                            }
                            if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-addCart'])) {
                                $sanpham_anh = $row3['anhsp'];
                                $session_idA = 'eee';
                                $sanpham_id =  $row3['id_sanpham'];
                                $sanpham_tieude =  $row3['tensp'];
                                $sanpham_gia =  $row3['giasp'];
                                $quantitys =  $row3['soluong'];
                                $sql = "INSERT INTO tbl_cart VALUES('','" . $sanpham_anh . "','" . $session_idA . "','" . $sanpham_id . "','" . $sanpham_tieude . "','" . $sanpham_gia . "','" . $quantitys . "')";
                                $result = mysqli_query($conn, $sql);
                                if (!$result) {
                                    echo "Bình luận không thành công";
                                }
                            }
                            
                        // }
                    // }
                }
            }
            echo "</tr>";
            echo "
                </tbody>
                </table>
                ";
            echo "</div>";
            echo "</div>";
        }
    }

    ?>

</body>
<div class="footer">
    <?php
    include 'footer.php';
    ?>
</div>

</html>