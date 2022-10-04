<?php

    $thongbao = "";

    if(isset($_POST['sbm'])){
        $name = $_POST['name'];
        $pass = $_POST['psw'];
        $pass = md5($pass); //mã hóa md5

        $sql_check = "SELECT * FROM nguoidung WHERE `ten` = '".$name."'";
        $query_check = mysqli_query($conn, $sql_check);
        $count = mysqli_num_rows($query_check);//kiễm tra trong data có name ko(1->có)
        $row = mysqli_fetch_assoc($query_check);

        if($count==1 && $pass==$row['matkhau']){
            $_SESSION['id_user'] = $row['id'];
            $_SESSION['username'] = $name;
            $_SESSION['type'] = $row['loai'];
            $_SESSION['amount'] = 0;
            $_SESSION['toast'] = "chào mừng \"$name\"";

            if($row['loai']=="admin"){
                header('location: ./admin');
            }else{
                header('location: ./customer');
            }
        }else{
            $thongbao = "đăng nhập thất bại";
        }

    }
?>


<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h1>Login</h1>
                <hr>
                <h3 style="color: red; text-align: center; padding-top:5px;"><?=$thongbao?></h3>
                <label for="email">Username</label>
                <input type="text" placeholder="Enter Username" name="name" required>
                <label for="password">Password</label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <button type="submit" name="sbm">Login</button>
                <p class="forget">
                    <a href="?page=register">Register</a>
                </p>
                
            </form>
        </div>
    </div>
</body>

</html>