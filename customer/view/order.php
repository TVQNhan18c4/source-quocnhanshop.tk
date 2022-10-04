<body>
    <header>
        <?php
        include "navbar.php";
        ?>
    </header>

    <article>
        <div class="breadcrumb">
            <a href="?page=home">trang chủ</a>
            <span>/</span>
            <a href="?page=cart">giỏ hàng</a>
            <span>/</span>
            <a href="">đơn đã đặt</a>
        </div>    
        <div class="donhang">
            <div class="box_90">
                <table class="cacdon">
                    <tr>
                        <th>Mã</th>
                        <th>người nhận</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                    
                    <?php
                        $order = order($_SESSION['id_user']);
                        $color = "";
                        while ($row = mysqli_fetch_assoc($order)){
                            if ($row['trangthai'] == "xác nhận") {
                                $color = "green";
                            }elseif ($row['trangthai'] == "từ chối") {
                                $color = "red";
                            }else {
                                $color = "orange";
                            }
                    ?>

                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['nguoinhan']?></td>
                            <td><?=$row['sdt']?></td>
                            <td><?=$row['diachi']?></td>
                            <td><?=$row['ngaydat']?></td>
                            <td style="color: <?=$color?>;"><?=$row['trangthai']?></td>
                            <td>
                                <a href="./function/delete_order.php?id=<?=$row['id']?>"><i class="fa-solid fa-trash-can"></i></a>
                                <a href="?page=order_detail&id=<?=$row['id']?>"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>

                    <?php    }  ?>
                    
                </table>
            </div>
        </div>
    </article>
