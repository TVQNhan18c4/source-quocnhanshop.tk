<body>
    <header>
        <?php
        $_SESSION['amount'] = 0;
        include "navbar.php";
        ?>
    </header>

    <article>
        <div class="breadcrumb">
            <a href="?page=home">trang chủ</a>
            <span>/</span>
            <a href="">giỏ hàng</a>
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
                        <th></th>
                    </tr>
                    <?php
                        $cart = cart_user($_SESSION['id_user']);
                        $tongtien = 0;
                        while ($row = mysqli_fetch_assoc($cart)) {
                            $tongtien = $tongtien + $row['thanhtien'];
                    ?>
                    <form action="./function/update_cart.php?id=<?=$row['id_sp']?>" method="post">
                        <tr>
                            <td style="width:15%"><img style="width: 100%," src="../img/product/<?=$row['anh']?>" alt="anh sp"></td>
                            <td style="width:30%"><?=$row['ten_sp']?></td>
                            <td style="width:15%"><?=number_format($row['gia'],0, '', '.')?>₫</td>
                            <td style="width:13%">
                                <input class="soluong" type="number" name="soluong" value="<?=$row['soluong']?>">
                            </td>
                            <td style="width:15%"><?=number_format($row['thanhtien'],0, '', '.')?>₫</td>
                            <td style="width:12%">
                                <a href="./function/delete_cart.php?id=<?=$row['id_sp']?>"><i class="fa-solid fa-xmark"></i> delete</i></a>
                                <button class="btn-update" type="submit" name="sbm"><i class="fa fa-refresh"></i> update</button>
                            </td>
                        </tr>
                    </form>
                    <?php   }   ?>
                </table>
                <div class="tongtien"> Tổng tiền : <span> <?=number_format($tongtien,0, '', '.')?>₫</span></div>
                <button class="btn-dathang">Đặt hàng</button>
                <!-- <a href="">Đặt hàng</a> -->
                <a href="?page=order">Xem đơn hàng</a>
            </div>
        </div>
    </article>

    <div class="modal-order">
        <div class="modal-content">
            <div class="modal-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="modal-header">
                Đặt hàng
            </div>
            <div class="modal-body">
                <form action="./function/add_order.php" method="post">

                    <input type="hidden" name="tongtien" value="<?=$tongtien?>">

                    <label class="modal-label">tên người nhận</label>
                    <input class="modal-input" type="text" name="nguoinhan" required>
                    <label class="modal-label">số điện thoại</label>
                    <input class="modal-input" type="number" name="sdt" required>
                    <label class="modal-label">địa chỉ</label>
                    <input class="modal-input" type="text" name="diachi" required>
                    <button class="dathang" type="submit" name="sbm">xác nhận</button>
                </form>
            </div>
        </div>
    </div>
