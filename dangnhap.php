<!DOCTYPE html>
<html lang="vi">
  <>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Nhập</title>
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./thietke/style.css">
    <link rel="stylesheet" href="./font icon/themify-icons-font/themify-icons/themify-icons.css">
  </head>
  <body>
  <div id="main">
  <div id="header">
        <h1 class="h1"><a href="index.php">Tin Tức Nhanh</a></h1>
        <div id="nav">
            <li><a href="index.php">Tin mới</a></li>
            <li><a href="favorites.php">Bài viết đã thích</a></li>
            <li><a href="dang-bai.php">Độc giả đăng bài</a></li>
            <p class="dangnhap"><a href="dangnhap.php">Đăng nhập</a></p>
            <div class="search-btn">
                <a href="search.php"><i class="search-icon ti-search"></i></a>
            </div>
        </div>
    </div>
    <div id="content">
            <form action="login.php" method="post">
                <label for="username">Tên đăng nhập:</label><br>
                <input type="text" id="username" name="username"><br>
                <label for="password">Mật khẩu:</label><br>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Đăng nhập">
            </form>
        </div>
    </div>

  </div>

  </body>
</html>
