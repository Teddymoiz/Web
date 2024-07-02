<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Ký</title>
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
    <div class="register-container">
            <h2>Đăng Ký</h2>
            <form action="register.php" method="post">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
                
                <label for="confirm_password">Xác nhận mật khẩu:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                
                <button type="submit">Đăng Ký</button>
            </form>
        </div>
 </div>
 
</body>
</html>
