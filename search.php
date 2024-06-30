<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Bài Viết</title>
    <link rel="stylesheet" href="./thietke/search.css">
    <link rel="stylesheet" href="./font icon/themify-icons-font/themify-icons/themify-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* margin: 0; */
            background-color: #f0f0f0;
        }

        .search-container {
            text-align: center;
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: block;
            position: relative;
            top: 48px;
        }

        h2 {
            margin-bottom: 1em;
            color: #333;
            margin-left: 100px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 0.5em;
        }

        input[type="text"] {
            padding: 0.5em;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 0.5em;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
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
    <div class="search-container">
        <h2>Tìm Kiếm Bài Viết</h2>
        <form action="search.php" method="GET">
            <input type="text" placeholder="Nhập từ khóa..." name="query" required>
            <button type="submit">Tìm Kiếm</button>
        </form>
    </div>
        <div id="content">

        </div>
     <footer>
        <p>Cơ quan chủ quản: Nhóm 14<br>
        Số Điện Thoại liên hệ: 0912345jqk</p>
     </footer>
</body>
</html>
