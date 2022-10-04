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
                <h2>Đơn Hàng</h2>
                <table style="margin-top: 45px;">
                    <tr>
                        <th>mã</th>
                        <th>người nhận</th>
                        <th>sđt</th>
                        <th>địa chỉ</th>
                        <th>ngày đặt</th>
                        <th>trạng thái</th>
                        <th>chi tiết</th>
                        <th></th>
                    </tr>
                    
                    <?php
                        include("./function/order/select_order.php");
                        while ($row = mysqli_fetch_assoc($order)) {
                    ?>
                    <tr>
                        <form action="./function/order/update_order.php?id=<?=$row['id']?>&search=<?=$search?>&num=<?=$num?>" method="post">
                            <td><?=$row['id']?></td>
                            <td><?=$row['nguoinhan']?></td>
                            <td><?=$row['sdt']?></td>
                            <td><?=$row['diachi']?></td>
                            <td><?=$row['ngaydat']?></td>
                            <td>
                                <select name="status">
                                    <option value="<?=$row['trangthai']?>"><?=$row['trangthai']?></option>";
                                    <option value="xác nhận">xác nhận</option>";
                                    <option value="từ chối">từ chối</option>";
                                </select>
                            </td>
                            <td><a class="btn-see" href="./?page=order_detail&id=<?=$row['id']?>"><i class="fa-sharp fa-solid fa-eye"></i></a></td>
                            <td><button class="btn-update" type="submit" name="sbm"><i class="fas fa-edit"></i></button></td>

                        </form>
                    </tr>
                    <?php    }  ?>
                    
                </table>
            </div>
        </div>
        <div class="pagination">
                <?php
                    if($num == 1 and $sotrang == 1){
                ?>
                <!-- ko co nut -->
                <?php
                    }else {
                ?>
                <?php
                        if($num <= 1){
                            $num = 1;
                        for ($i=1; $i <= $sotrang; $i++) { 
                            if($i == $num){
                ?>
                                <a class="active" href=""><?=$i?></a>
                <?php                    
                            }else{
                ?>
                                <a href="./?page=order&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
                <?php                    
                            }
                ?>
                <?php 
                        }
                ?>
                <!-- nut next -->
                            <a href="./?page=order&search=<?=$search?>&num=<?=$num+1?>"><i class="fa-solid fa-angles-right"></i></a>
                <?php
                        }
                        if($num >= $sotrang){
                            $num = $sotrang;
                ?>
                <!-- nut pre -->
                            <a href="./?page=order&search=<?=$search?>&num=<?=$num-1?>"><i class="fa-solid fa-angles-left"></i></a>
                <?php
                            for ($i=1; $i <= $sotrang; $i++) { 
                                if($i == $num){
                ?>
                                    <a class="active" href=""><?=$i?></a>
                <?php                    
                                }else{
                ?>
                                    <a href="./?page=order&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
                <?php                    
                                }
                ?>
                <?php 
                            }
                ?>
                <?php
                        }
                        if($num<$sotrang and $num>1){
                ?>
                <!-- ca 2 nut -->
                            <a href="./?page=order&search=<?=$search?>&num=<?=$num-1?>"><i class="fa-solid fa-angles-left"></i></a>
                <?php
                            for ($i=1; $i <= $sotrang; $i++) { 
                                if($i == $num){
                ?>
                                    <a class="active" href=""><?=$i?></a>
                <?php                    
                                }else{
                ?>
                                    <a href="./?page=order&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
                <?php                    
                                }
                ?>
                <?php 
                            }
                ?>
                            <a href="./?page=order&search=<?=$search?>&num=<?=$num+1?>"><i class="fa-solid fa-angles-right"></i></a>
                <?php
                        }
                ?>
                <?php
                    }
                ?>

        </div>
    </article>
</body>

</html>

