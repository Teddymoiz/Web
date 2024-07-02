<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tintuc";

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy ID bài đăng từ URL
$id = $_GET['id'];

// Truy vấn dữ liệu bài đăng dựa trên ID
$sql = "SELECT title, content, image FROM db_baidang WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lấy dữ liệu bài đăng
    $row = $result->fetch_assoc();
} else {
    echo "Bài đăng không tồn tại.";
    exit;
}

include("footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["title"]; ?> - Tin Tức Nhanh</title>
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
            <p class="dangnhap"><a href="dangnhap.php">Đăng nhập</a></p>
            <div class="search-btn">
                <a href="search.php"><i class="search-icon ti-search"></i></a>
            </div>
        </div>
    </div>

    <div id="content" class="main-content">
        <div class="post">
            <h2><?php echo $row["title"]; ?></h2>
            <?php
            if ($row["image"]) {
                echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '">';
            }
            ?>
            <p><?php echo nl2br($row["content"]); ?></p>
        </div>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
