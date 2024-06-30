<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi bài</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./thietke/style.css">
    <link rel="stylesheet" href="./font icon/themify-icons-font/themify-icons/themify-icons.css">
</head>
<body>
<div id="main">
<div id="header">
            <h1 class="h1"><a href="index.php">Tin Tức Nhanh</a></h1>
            <div id="nav">
                        <li><a href="#">Tin mới</a></li>
                        <li><a href="#">Bài viết đã thích</a></li>
                        <li><a href="dang-bai.php">Độc giả đăng bài</a></li>
            <p class="dangnhap"><a href="login.php">Đăng nhập</a></p>
                <div class="search-btn">
                <!-- <input class="tim" type="text" placeholder="Search.." name="search"> -->
                <a href="search.php"><i class="search-icon ti-search"></i></a>
                         <!-- mena da cap -->
                </div>
            </div>
        </div>
</div>
<?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $Keyword=$_POST['txtKeyword'];
            $conn=mysqli_connect("localhost","root","","tintuc");
            if(!$conn){
                echo 'ket noi khong thanh cong'. mysqli_connect_error();
            }
            else{
                $query="SELECT*FROM /* */ WHERE Title like N'%".$Keyword."%' content like N'%".$Keyword."'";
                $result=mysqli_query($conn,$query);
                $num=1;
                if(mysqli_num_rows($result)>0){
                    /* link */
                    while($row=mysqli_fetch_assoc($result)){
                        /* link */
                    }
                }
                else{
                    echo 'Khong co bai viet';
                }
            }
        }
    ?>
    </div>
            </div>
        </div>
    </div>
      </div>
        <div id="content">

        </div>
     <hr>
     <footer>
  <p>Cơ quan chủ quản: Nhóm 14<br>
  Số Điện Thoại liên hệ: 0912345jqk</p>
</footer>
</body>
</html>