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

// Truy vấn dữ liệu từ bảng db_baidang
$sql = "SELECT id, title, content, image FROM db_baidang";
$result = $conn->query($sql);

include("footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức Nhanh</title>
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
                <!-- <input class="tim" type="text" placeholder="Search.." name="search"> -->
                <a href="search.php"><i class="search-icon ti-search"></i></a>
                <!-- mena da cap -->
            </div>
        </div>
    </div>

    <div id="content" class="grid hot">
        <article class="article spotlight">
            <div class="title">
                Dân trí <span>Spotlight</span>
            </div>
            <?php
            if ($result->num_rows > 0) {
                // Lặp qua từng bài đăng và hiển thị
                while($row = $result->fetch_assoc()) {
                    // Cắt ngắn nội dung để hiển thị một phần
                    $excerpt = substr($row["content"], 0, 200) . '...';
                    echo '<article class="article-item">';
                    echo '<div class="article-thumb">';
                    echo '<a href="chitiet.php?id=' . $row["id"] . '">';
                    echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '">';
                    echo '</a>';
                    echo '</div>';
                    echo '<div class="article-info">';
                    echo '<h2><a href="chitiet.php?id=' . $row["id"] . '">' . $row["title"] . '</a></h2>';
                    echo '<p>' . $excerpt . '</p>';
                    echo '<a href="chitiet.php?id=' . $row["id"] . '">Đọc tiếp</a>';
                    echo '</div>';
                    echo '</article>';
                }
            } else {
                echo "Không có bài đăng nào.";
            }
            ?>
        </article>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
