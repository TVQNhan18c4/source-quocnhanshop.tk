
    <body>
        <header>
            <?php
            include "navbar.php";
            ?>
            <div class="introduce">
                <div class="box_90">
                    <div class="banner">
                        <img class="myBanner animation1" src="../img/introduce/banner-top-1.png" alt="" />
                        <img class="myBanner animation2" src="../img/introduce/banner-top-2.png" alt="" />
                        <img class="myBanner animation3" src="../img/introduce/banner-top-3.png" alt="" />
                    </div>
                    <div class="slider">
                        <img class="mySlides animation1" src="../img/introduce/S22-800-200-800x200-5.png" alt="" />
                        <img class="mySlides animation1" src="../img/introduce/A53-800-200-800x200.png" alt="" />
                        <img class="mySlides animation1" src="../img/introduce/reno7-800-200-800x200-1.png" alt="" />
                    </div>
                </div>
            </div>
        </header>

        <article>
            <div class="nav_bar">
                <div class="box_90">
                    <ul>             
                        <li><a href="?page=home">Tất cả</a></li>
                    </ul>
                    <ul>
                        <?php       
                            $table_name = "thuonghieu";
                            $brand = table($table_name);
                            while ($row = mysqli_fetch_assoc($brand)) {
                        ?>
                        <li><a href="?page=home&brand=<?=$row['id']?>"><?=$row['ten']?></a></li>
                        <?php    }  ?>

                    </ul>
                </div>
            </div>

            <div class="box_90">
                <div class="products">
                    <?php
                        include("./function/select_product.php");
                        while ($row = mysqli_fetch_assoc($product)) {
                    ?>
                    <div class="product">
                        <a href="./?page=product&id=<?=$row['id']?>">
                            <img src="../img/product/<?=$row['anh']?>" alt="anh sp">
                            <p class="product_name"><?=$row['ten']?></p>
                            <p class="product_price"><?=number_format($row['gia'],0, '', '.')?>₫</p>
                        </a>
                    </div>
                    <?php    }  ?>

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
                                <a href="./?page=home&brand=<?=$id_thuonghieu?>&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
                <?php                    
                            }
                ?>
                <?php 
                        }
                ?>
                <!-- nut next -->
                            <a href="./?page=home&brand=<?=$id_thuonghieu?>&search=<?=$search?>&num=<?=$num+1?>"><i class="fa-solid fa-angles-right"></i></a>
                <?php
                        }
                        if($num >= $sotrang){
                            $num = $sotrang;
                ?>
                <!-- nut pre -->
                            <a href="./?page=home&brand=<?=$id_thuonghieu?>&search=<?=$search?>&num=<?=$num-1?>"><i class="fa-solid fa-angles-left"></i></a>
                <?php
                            for ($i=1; $i <= $sotrang; $i++) { 
                                if($i == $num){
                ?>
                                    <a class="active" href=""><?=$i?></a>
                <?php                    
                                }else{
                ?>
                                    <a href="./?page=home&brand=<?=$id_thuonghieu?>&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
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
                            <a href="./?page=home&brand=<?=$id_thuonghieu?>&search=<?=$search?>&num=<?=$num-1?>"><i class="fa-solid fa-angles-left"></i></a>
                <?php
                            for ($i=1; $i <= $sotrang; $i++) { 
                                if($i == $num){
                ?>
                                    <a class="active" href=""><?=$i?></a>
                <?php                    
                                }else{
                ?>
                                    <a href="./?page=home&brand=<?=$id_thuonghieu?>&search=<?=$search?>&num=<?=$i?>"><?=$i?></a>
                <?php                    
                                }
                ?>
                <?php 
                            }
                ?>
                            <a href="./?page=home&brand=<?=$id_thuonghieu?>&search=<?=$search?>&num=<?=$num+1?>"><i class="fa-solid fa-angles-right"></i></a>
                <?php
                        }
                ?>
                <?php
                    }
                ?>

            </div>
        </article>
