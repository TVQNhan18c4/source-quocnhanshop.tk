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
            <a href="?page=order">đơn đã đặt</a>
            <span>/</span>
            <a href="">chi tiết đơn</a>
        </div>    
        <div class="giohang">
            <div class="box_90">
                <table class="chitiet_gio">
                    <tr>
                        <th>ảnh</th>
                        <th>tên sản phẩm</th>
                        <th>giá sản phẩm</th>
                        <th>số lượng</th>
                        <th>thành tiền</th>
                    </tr>
                    <?php
                        $id_donhang = $_GET['id'];
                        $order_detail = orderDetail($id_donhang);
                        $tongtien = 0;
                        while ($row = mysqli_fetch_assoc($order_detail)){
                            $tongtien = $tongtien + $row['thanhtien'];
                    ?>
                        <tr>
                            <td style="width:15%"><img style="width: 100%," src="../img/product/<?=$row['anh']?>" alt=""></td>
                            <td style="width:32%"><?=$row['ten_sp']?></td>
                            <td style="width:18%"><?=number_format($row['dongia'],0, '', '.')?>₫</td>
                            <td style="width:17%"><?=$row['soluong']?></td>
                            <td style="width:18%"><?=number_format($row['thanhtien'],0, '', '.')?>₫</td>
                        </tr>

                    <?php   }   ?>
                    
                    
                </table>
                <div class="tongtien" style="text-align: end;"> tổng tiền : <span> <?=number_format($tongtien,0, '', '.')?>₫</span></div>
            </div>
        </div>
    </article>