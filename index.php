<?php
include("./baidang/functions.php");
include("footer.php");
include("config.php");

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
                <a href="search.php"><i class="search-icon ti-search"></i></a>
            </div>
        </div>
    </div>

    <div id="content" class="grid hot">
        <content class="article spotlight">
            <div class="title">
            </div>
            <?php
            $sql = "SELECT id, title, content, image FROM db_baidang WHERE status='approved'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $excerpt = substr($row["content"], 0, 200) . '...';
                    $image_src = !empty($row["image"]) ? $row["image"] : 'default_image_path.jpg'; // Đường dẫn ảnh mặc định nếu không có ảnh
                    echo '<article class="article-item">';
                    echo '<div class="article-thumb">';
                    echo '<a href="chitiet.php?id=' . $row["id"] . '">';
                    echo '<img src="' . $image_src . '" alt="' . $row["title"] . '">';
                    echo '</a>';
                    echo '</div>';
                    echo '<div class="article-info">';
                    echo '<h2><a href="chitiet.php?id=' . $row["id"] . '">' . $row["title"] . '</a></h2>';
                    echo '<p>' . $excerpt . '</p>';
                    echo '<a href="chitiet.php?id=' . $row["id"] . '"></a>';
                    echo '</div>';
                    echo '</article>';
                }
            } else {
                echo "Không có bài đăng nào.";
            }

            $conn->close();
            ?>
        </>
    </div>
</div>
</body>
</html>
