<div class="header_top">
    <div class="box_90">
        <div class="logo">
            <a href="?page=home">
                <img src="../img/logo/logo.png" alt="logo" />
            </a>
        </div>
        <div class="search-infor">
            
            <div class="search">
                <form action="" method="get">
                    <input class="text_search" type="text" name="search" placeholder="Search..."/>
                    <button class="btn_search" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="infor">
                <a href=""><?=$_SESSION['username']?></a>
                <a href="../authent/logout.php">đăng xuất</a>
                <a href="?page=cart"><i class="fa-solid fa-cart-shopping"></i><span class="amount"><?=($_SESSION['amount'] == 0) ? "" : $_SESSION['amount'];?></span> giỏ hàng</a>
            </div>
        </div>
    </div>
</div>