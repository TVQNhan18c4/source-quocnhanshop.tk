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
            <a href="">chi tiết sản phẩm</a>
        </div>

        <div class="chitietsp">
            <div class="box_90">
                <?php       
                    if(isset($_GET['id']) && isset($_GET['page'])){
                        $id = $_GET['id'];
                        $product = row_table("sanpham", $id);
                        $row_product = mysqli_fetch_assoc($product);
                        if($row_product == null){
                            header('location: ?page=home'); 
                        }
                        $brand = row_table('thuonghieu', $row_product['id_thuonghieu']);
                        $row_brand = mysqli_fetch_assoc($brand);
                        
                    }else {
                        header('location: ?page=home');   
                    }
                ?>
                <img class="anhsp" src="../img/product/<?=$row_product['anh']?>" alt="chitietsp">
                <div class="thongtinsp">
                    <p class="tensp"><?=$row_product['ten']?></p>
                    <p class="thuonghieusp">Thương hiệu : <?=$row_brand['ten']?></p>
                    <p class="giasp">Giá : <span><?=number_format($row_product['gia'],0, '', '.')?>₫</span></p>
                    <p class="cauhinhsp">Thông số sản phẩm :</p>
                    <table>
                        <tr>
                            <td>Màng hình:</td>
                            <td><?=$row_product['manghinh']?></td>
                        </tr>
                        <tr>
                            <td>Hệ điều hành:</td>
                            <td><?=$row_product['hedieuhanh']?></td>
                        </tr>
                        <tr>
                            <td>Camera sau:</td>
                            <td><?=$row_product['camera_sau']?></td>
                        </tr>
                        <tr>
                            <td>Camera trước:</td>
                            <td><?=$row_product['camera_truoc']?></td>
                        </tr>
                        <tr>
                            <td>Chip:</td>
                            <td><?=$row_product['chip']?></td>
                        </tr>
                        <tr>
                            <td>RAM:</td>
                            <td><?=$row_product['ram']?></td>
                        </tr>
                        <tr>
                            <td>Bộ nhớ trong:</td>
                            <td><?=$row_product['rom']?></td>
                        </tr>
                        <tr>
                            <td>SIM:</td>
                            <td><?=$row_product['sim']?></td>
                        </tr>
                        <tr>
                            <td>Pin, Sạc:</td>
                            <td><?=$row_product['pin_sac']?></td>
                        </tr>
                    </table>
                    <a href="./function/add_cart.php?id=<?=$id?>" ><i class="fa-solid fa-cart-plus"></i> thêm vào giỏ</a>
                </div>
            </div>
        </div>

        <div class="sptuongtu">
            <div class="box_90">
                <h2>Sản phẩm tương tự :</h2>
                <div class="container_sptt">

                    <?php
                        
                        $sp_tt = product_tt($row_product['id'], $row_brand['id']);
                        while ($row_tt = mysqli_fetch_assoc($sp_tt)) {                
                    ?>

                        <div class="sptt">
                            <a href="?page=product&id=<?=$row_tt['id']?>">
                                <img src="../img/product/<?=$row_tt['anh']?>" alt="">
                                <p class="ten_sptt"><?=$row_tt['ten']?></p>
                            </a>
                        </div>
                            
                    <?php    }   ?>
                    
                </div>
            </div>
        </div>

    </article>
