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
                <h2>Thương Hiệu</h2>
                <div class="top_table">
                    <button class="btn_Cr">thêm mới</button>
                </div>
                <table>
                    <tr>
                        <th>tên thương hiệu</th>
                        <th>xóa</th>
                        <th>cập nhật</th>
                    </tr>

                    <?php
                        include("./function/brand/select_brand.php");
                        while ($row = mysqli_fetch_assoc($brand)) {
                    ?>
                    
                    <tr>
                        <form action="./function/brand/update_brand.php?search=<?=$search?>&num=<?=$num?>" method="post">
                            <td>
                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                <input type="text" name="name" value="<?=$row['ten']?>">
                            </td>
                            <td>
                                <a href="./function/brand/delete_brand.php?id=<?=$row['id']?>&search=<?=$search?>&num=<?=$num?>"><i class="fas fa-trash"></i></a>
                            </td>
                            <td>
                                <button class="btn-update" type="submit" name="sbm"><i class="fas fa-edit"></i></button>
                                
                            </td>
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
                                <a href="./?page=brand&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
                <?php                    
                            }
                ?>
                <?php 
                        }
                ?>
                <!-- nut next -->
                            <a href="./?page=brand&search=<?=$search?>&num=<?=$num+1?>"><i class="fa-solid fa-angles-right"></i></a>
                <?php
                        }
                        if($num >= $sotrang){
                            $num = $sotrang;
                ?>
                <!-- nut pre -->
                            <a href="./?page=brand&search=<?=$search?>&num=<?=$num-1?>"><i class="fa-solid fa-angles-left"></i></a>
                <?php
                            for ($i=1; $i <= $sotrang; $i++) { 
                                if($i == $num){
                ?>
                                    <a class="active" href=""><?=$i?></a>
                <?php                    
                                }else{
                ?>
                                    <a href="./?page=brand&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
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
                            <a href="./?page=brand&search=<?=$search?>&num=<?=$num-1?>"><i class="fa-solid fa-angles-left"></i></a>
                <?php
                            for ($i=1; $i <= $sotrang; $i++) { 
                                if($i == $num){
                ?>
                                    <a class="active" href=""><?=$i?></a>
                <?php                    
                                }else{
                ?>
                                    <a href="./?page=brand&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
                <?php                    
                                }
                ?>
                <?php 
                            }
                ?>
                            <a href="./?page=brand&search=<?=$search?>&num=<?=$num+1?>"><i class="fa-solid fa-angles-right"></i></a>
                <?php
                        }
                ?>
                <?php
                    }
                ?>

        </div>
    </article>

    <div class="modal">
        <div class="modal-content">
            <div class="modal-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="modal-header">
                Thêm Thương Hiệu
            </div>
            <form action="./function/brand/creat_brand.php" method="post">
                
                <div class="modal-body">
                    <label class="modal-label">tên thương hiệu</label>
                    <input type="text" name="name" class="modal-input" required>
                    <button type="submit" name="sbm" class="btn_Cr">xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
