<?php
include "header.php";
// include "Left_side.php";
// include "class/product_class.php";
// include "helper/format.php";
include './Config/connect.php';
?>

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/main-index.css">
    <style>
        .app-content{
            margin-top: 220px;
            /* margin-left: 350px; */
            color: black;
        }
    </style>
</head>
<body>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <!-- <li class="breadcrumb-item active"><a href="#"><b>DS khách hàng</b></a></li>
            <li class="breadcrumb-item active"><a href="binhluanlist.php"><b>Thêm khách hàng</b></a></li> -->
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <h3>Tất cả các tin tức:</h3>
                    </div>
                    <div>
                        <table id="customers">
                            <tr>

                                <th>Id tin tức</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM tbltintuc";
                            $result = mysqli_query($conn, $sql);
                            $count = 0;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $count++;
                            ?>
                                    <tr>

                                        <td><?php echo $row['id_tintuc'] ?></td>
                                        <td><?php echo $row['tieude'] ?></td>
                                        <td><?php echo $row['noidung'] ?></td>



                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
</body>

</body>
<div class="footer">
    <?php
    include 'footer.php';
    ?>
</div>
</html>