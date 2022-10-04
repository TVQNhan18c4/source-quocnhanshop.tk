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
                <h2>Sản Phẩm</h2>
                <button class="btn_Cr">thêm mới</button>
                <table>
                    <tr>
                        <th>ảnh</th>
                        <th>tên</th>
                        <th>giá</th>
                        <th>chi tiết</th>
                        <th>xóa</th>
                    </tr>

                    <?php
                        include("./function/product/select_product.php");
                        while ($row = mysqli_fetch_assoc($product)) {
                    ?>

                    <tr>
                        <td style="width: 10%;"><img style="width: 100%;" src="../img/product/<?=$row['anh']?>" alt="ảnh sản phẩm"></td>
                        <td><?=$row['ten']?></td>
                        <td><?=number_format($row['gia'],0, '', '.')?>₫</td>
                        <td><a class="btn-see" href="./?page=product_detail&id=<?=$row['id']?>"><i class="fa-sharp fa-solid fa-eye"></i></a></td>
                        <td><a href="./function/product/delete_product.php?id=<?=$row['id']?>&search=<?=$search?>&num=<?=$num?>"><i class="fas fa-trash"></i></a></td>
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
                                <a href="./?page=product&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
                <?php                    
                            }
                ?>
                <?php 
                        }
                ?>
                <!-- nut next -->
                            <a href="./?page=product&search=<?=$search?>&num=<?=$num+1?>"><i class="fa-solid fa-angles-right"></i></a>
                <?php
                        }
                        if($num >= $sotrang){
                            $num = $sotrang;
                ?>
                <!-- nut pre -->
                            <a href="./?page=product&search=<?=$search?>&num=<?=$num-1?>"><i class="fa-solid fa-angles-left"></i></a>
                <?php
                            for ($i=1; $i <= $sotrang; $i++) { 
                                if($i == $num){
                ?>
                                    <a class="active" href=""><?=$i?></a>
                <?php                    
                                }else{
                ?>
                                    <a href="./?page=product&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
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
                            <a href="./?page=product&search=<?=$search?>&num=<?=$num-1?>"><i class="fa-solid fa-angles-left"></i></a>
                <?php
                            for ($i=1; $i <= $sotrang; $i++) { 
                                if($i == $num){
                ?>
                                    <a class="active" href=""><?=$i?></a>
                <?php                    
                                }else{
                ?>
                                    <a href="./?page=product&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
                <?php                    
                                }
                ?>
                <?php 
                            }
                ?>
                            <a href="./?page=product&search=<?=$search?>&num=<?=$num+1?>"><i class="fa-solid fa-angles-right"></i></a>
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
                Thêm Sản Phẩm
            </div>
            <form action="./function/product/creat_product.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="input_left">

                        <label class="modal-label">Tên sản phẩm</label>
                        <input type="text" name="ten" class="modal-input" required>

                        <label class="modal-label">Thương hiệu</label>
                        <select name="id_thuonghieu" class="modal-input" required>
                            <?php
                            $table_name = 'thuonghieu';
                            $query = table($table_name);
                            echo '<option value="0"></option>';
                            while ($row = mysqli_fetch_assoc($query)) {
                                echo "<option value='".$row['id']."'>".$row['ten']."</option>";
                            } 
                            ?>
                        </select>
                        <label class="modal-label">Ảnh</label>
                        <input type="file" name="anh" class="modal-input" required>

                        <label class="modal-label">Giá</label>
                        <input type="number" name="gia" class="modal-input" required>

                        <label class="modal-label">Màng hình</label>
                        <input type="text" name="manghinh" class="modal-input" required>

                        <label class="modal-label">Hệ điều hành</label>
                        <input type="text" name="hedieuhanh" class="modal-input" required>

                        <label class="modal-label">Camera sau</label>
                        <input type="text" name="camerasau" class="modal-input" required>
                        
                    </div>

                    <div class="input_right">
                       
                        <label class="modal-label">Camera trước</label>
                        <input type="text" name="cameratruoc" class="modal-input" required>

                        <label class="modal-label">Chip</label>
                        <input type="text" name="chip" class="modal-input" required>
                        
                        <label class="modal-label">RAM</label>
                        <input type="text" name="ram" class="modal-input" required>

                        <label class="modal-label">ROM</label>
                        <input type="text" name="rom" class="modal-input" required>

                        <label class="modal-label">Sim</label>
                        <input type="text" name="sim" class="modal-input" required>

                        <label class="modal-label">Pin, sạc</label>
                        <input type="text" name="pin_sac" class="modal-input" required>

                        <button type="submit" name="sbm" style="width: 100%;" class="btn_Cr">xác nhận</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>

