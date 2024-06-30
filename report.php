<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo bài viết</title>
    <link rel="stylesheet" href="./thietke/report.css">

</head>
<body>
    <div class="report-form-container">
    <div id="main">
        <div id="header">
            <h1 class="h1"><a href="index.php">Tin Tức Nhanh</a></h1>
            <div id="nav">
            <p><a href="login.php">Đăng nhập</a></p>
                <div class="search-btn">
                <!-- <input class="tim" type="text" placeholder="Search.." name="search"> -->
                <a href="search.php"><i class="search-icon ti-search"></i></a>
                         <!-- mena da cap -->
 <?php
     $conn = mysqli_connect("localhost","root","","db_tintuc");
     if (!$conn) {
        echo'ket noi khong thanh cong'. mysqli_connect_error();
     }
     else {
        $query= "SELECT * FROM tblmenu where ParentMenuID = -1 ";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result)> 0) {
            echo'<div class="navbar">';
            while ($row=mysqli_fetch_assoc($result)) {
                $queryChild ="SELECT * FROM tblmenu where ParentMenuID = '".$row["MenuID"]."'";
                $resultChild = mysqli_query($conn,$queryChild);
                $isChild = false;
                if (mysqli_num_rows($resultChild)> 0) {$isChild = true;}
                if ($isChild==false) {
                    echo'<a href ="#home">'.$row["Name"].'</a>';
                }
                else {
                    echo'<div class="dropdown">
                    <button class = "drop btn">'.$row['Name'].'
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <div class= "dropdown-content">';
                while ($rowChild=mysqli_fetch_assoc($resultChild)) {
                    echo'<a href="' .$rowChild["UrlControl"].'">'.$rowChild["Name"].'</a>';
                }
                echo '</div></div>';
                }
            }
            echo'</div>';
        }
     }

?>
                </div>
            </div>
        </div>
    </div>
      </div>
        <div id="content">
<!-- bao cao bai viet -->
        </div>
        <h2>Báo cáo bài viết</h2>
        <p>Vui lòng điền thông tin bên dưới để báo cáo bài viết này. Chúng tôi sẽ xem xét và xử lý yêu cầu của bạn trong thời gian sớm nhất.</p>
        <form action="report.php" method="post" enctype="multipart/form-data">
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="url">URL bài viết:</label>
            <input type="text" id="url" name="url" required>

            <label for="reason">Lý do báo cáo:</label>
            <select id="reason" name="reason" required>
                <option value="false_info">Nội dung sai sự thật</option>
                <option value="offensive">Nội dung xúc phạm</option>
                <option value="copyright">Vi phạm bản quyền</option>
                <option value="other">Khác</option>
            </select>

            <label for="description">Mô tả chi tiết:</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <label for="file">Tải lên hình ảnh minh họa (nếu có):</label>
            <input type="file" id="file" name="file">
            <button type="submit">Gửi báo cáo</button>
        </form>
    </div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $url = $_POST['url'];
            $reason = $_POST['reason'];
            $description = $_POST['description'];
            $file_path = "";
            $conn=mysqli_connect("localhost","root","","tintuc");
            if(!$conn){
                echo 'ket noi khong thanh cong'. mysqli_connect_error();
            }else{
                $query="INSERT INTO report VALUES('".$name."','".$email."','".$url."','".$reason."','".$description."','".$file_path."')";
                $result=mysqli_query($conn,$query);
            }

            if ($result>0) {
                echo 'Cảm ơn bạn đã gửi báo cáo. Chúng tôi sẽ xem xét và xử lý yêu cầu của bạn trong thời gian sớm nhất.';
            } else {
                echo 'Có lỗi xảy ra khi gửi báo cáo của bạn. Vui lòng thử lại sau.';
            }
        }
    ?>
    <footer>
  <p>Cơ quan chủ quản: Nhóm 14<br>
  Số Điện Thoại liên hệ: 0912345jqk</p>
</footer>

</body>
</html>
