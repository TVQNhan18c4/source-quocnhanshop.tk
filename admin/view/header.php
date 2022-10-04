<body>
    <header>
        <div class="header_top">
            <div class="box_90">
                <div class="logo">
                    <a href="?page=wellcome">
                        <img src="../img/logo/logo.png" alt="logo" />
                    </a>
                </div>
                <div class="search-infor">

                    <div class="search">
                        <form action="" method="get">
                            <input type="hidden" name="page" value="<?=(isset($_GET['page'])) ? $_GET['page'] : 'wellcome';?>">
                            <input class="text_search" type="text" name="search" placeholder="Search..." />
                            <button class="btn_search" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="infor">
                        <a href="">admin</a>
                        <a href="../authent/logout.php">đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </header>