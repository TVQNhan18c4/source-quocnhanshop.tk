<?php
include("header.php");
?>
    <article>
        <div class="menu_admin">
            <div class="wrap">
                <a href="./?page=brand">
                    <div class="inforCard">
                        <div class="nameCard">Thương Hiệu</div>
                        <div class="numberCard"><?php echo numberRow_table('thuonghieu')?></div>
                    </div>
                    <div class="icon"><i class="fa-brands fa-bandcamp"></i></div>
                </a>
            </div>
            <div class="wrap">
                <a href="./?page=product">
                    <div class="inforCard">
                        <div class="nameCard">Sản Phẩm</div>
                        <div class="numberCard"><?php echo numberRow_table('sanpham')?></div>
                    </div>
                    <div class="icon"><i class="fa-brands fa-product-hunt"></i></div>
                </a>
            </div>
            <div class="wrap">
                <a href="./?page=user">
                    <div class="inforCard">
                        <div class="nameCard">Nguời dùng</div>
                        <div class="numberCard"><?php echo numberRow_table('nguoidung')?></div>
                    </div>
                    <div class="icon"><i class="fa-solid fa-users"></i></div>
                </a>
            </div>
            <div class="wrap">
                <a href="./?page=order">
                    <div class="inforCard">
                        <div class="nameCard">Đơn Hàng</div>
                        <div class="numberCard"><?php echo numberRow_table('donhang')?></div>
                    </div>
                    <div class="icon"><i class="fa-solid fa-cart-shopping"></i></div>
                </a>
            </div>
        </div>

        <div class="box_90">
            <div class="table_content">
                <h2>Chi Tiết Đơn Hàng</h2>
                <table style="margin-top: 45px;">
                    <tr>
                        <th style="width:15%">ảnh</th>
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
                            <td><img style="width: 100%;" src="../img/product/<?=$row['anh']?>" alt=""></td>
                            <td><?=$row['ten_sp']?></td>
                            <td><?=number_format($row['dongia'],0, '', '.')?>₫</td>
                            <td><?=$row['soluong']?></td>
                            <td><?=number_format($row['thanhtien'],0, '', '.')?>₫</td>
                        </tr>

                    <?php   }   ?>
                </table>
                <div class="tongtien" style="text-align: end;"> tổng tiền : <span> <?=number_format($tongtien,0, '', '.')?>₫</span></div>
            </div>
        </div>
    </article>
</body>

</html>

