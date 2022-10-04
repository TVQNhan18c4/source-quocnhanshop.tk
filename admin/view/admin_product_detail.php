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
                <h2>Chi tiết sản phẩm</h2>

                <?php
                    $table_name = "sanpham";
                    $id = $_GET['id'];
                    $product = row_table('sanpham', $id);
                    $row_product = mysqli_fetch_assoc($product);
                    $brand = row_table('thuonghieu', $row_product['id_thuonghieu']);
                    $row_brand = mysqli_fetch_assoc($brand);
                ?>
                
                <form action="./function/product/update_product.php" method="post" enctype="multipart/form-data">
                    <div class="chitietsp">
                        <input type="text" name="id"  value="<?=$id?>" hidden/>
                        <label for="file-input">
                            <img class="anhsp" src="../img/product/<?=$row_product['anh']?>" alt="chitietsp">
                        </label>
                        <input id="file-input" type="file" name="anh" hidden/>
                        
                        <div class="thongtinsp">
                            <p class="tensp">Tên : <input type="text" name="ten" value="<?=$row_product['ten']?>"></p>
                            <p class="thuonghieusp">Thương hiệu : <select name="id_thuonghieu">
                                        <option value="<?=$row_brand['id']?>"><?=$row_brand['ten']?></option>";
                                        <?php
                                            $brand = table('thuonghieu');
                                            while ($row = mysqli_fetch_assoc($brand)) {?>
                                            <option value="<?=$row['id']?>"><?=$row['ten']?></option>";
                                        <?php    }  ?>
                                    </select></p>
                            <p class="giasp">Giá : <input type="text" name="gia" value="<?=$row_product['gia']?>"></p>
                            <p class="cauhinhsp">Thông số sản phẩm :</p>
                            <table>
                                <tr>
                                    <td>Màng hình:</td>
                                    <td>
                                        <input type="text" name="manghinh" value="<?=$row_product['manghinh']?>">  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hệ điều hành:</td>
                                    <td>
                                        <input class="bg-grey" type="text" name="hedieuhanh" value="<?=$row_product['hedieuhanh']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera sau:</td>
                                    <td>
                                        <input type="text" name="camerasau" value="<?=$row_product['camera_sau']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camera trước:</td>
                                    <td>
                                        <input class="bg-grey" type="text" name="cameratruoc" value="<?=$row_product['camera_truoc']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chip:</td>
                                    <td>
                                        <input type="text" name="chip" value="<?=$row_product['chip']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>RAM:</td>
                                    <td>
                                        <input class="bg-grey" type="text" name="ram" value="<?=$row_product['ram']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bộ nhớ trong:</td>
                                    <td>
                                        <input type="text" name="rom" value="<?=$row_product['rom']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>SIM:</td>
                                    <td>
                                        <input class="bg-grey" type="text" name="sim" value="<?=$row_product['sim']?>">   
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pin, Sạc:</td>
                                    <td>
                                        <input type="text" name="pin_sac" value="<?=$row_product['pin_sac']?>">  
                                    </td>
                                </tr>
                            </table>
                            <button class="btn-update" type="submit" name="sbm"><i class="fas fa-edit"></i> cập nhật</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>

    </article>

</body>

</html>

