<?php
    $thongbao="";   
    if(isset($_POST['sbm'])){
        $name = $_POST['name'];
        $pass = $_POST['psw'];

        if($name != "" or $pass != ""){
            
            $sql_check = "SELECT * FROM nguoidung WHERE `ten` = '".$name."'";
            $query_check = mysqli_query($conn, $sql_check);
    
            $count = mysqli_num_rows($query_check);
            
            if($count==0){
                $pass = md5($pass);
                $sql = "INSERT INTO `nguoidung`(`ten`, `matkhau`) VALUES ('$name','$pass')";
                $query = mysqli_query($conn, $sql);
                $thongbao = "đăng ký thành công";
            }else{
                $thongbao = "tên đăng nhập đã tồn tại";
            }
        }else {
            $thongbao = "tên đăng nhập đã tồn tại";
        }
    }

?>

<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h1>Register</h1>
                <hr>
                <h3 style="color: red; text-align: center; padding-top: 5px;"><?=$thongbao?></h3>
                <label for="email">Username</label>
                <input type="text" placeholder="Enter Username" name="name" required>
                <label for="password">Password</label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <button type="submit" name="sbm">Register</button>
                <p class="forget">
                    <a href="?page=login">Login</a>
                </p>
                
            </form>
        </div>
    </div>
</body>

</html>