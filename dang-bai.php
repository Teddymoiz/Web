<?php
session_start(); // Khởi tạo phiên làm việc

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

// Lấy ID người dùng từ phiên đăng nhập
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "Bạn cần đăng nhập để thực hiện chức năng này.";
    exit();
}

// Truy vấn danh sách bài viết yêu thích
$sql = "SELECT db_baidang.id, db_baidang.title, db_baidang.image FROM yeuthich 
        JOIN db_baidang ON yeuthich.post_id = db_baidang.id 
        WHERE yeuthich.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
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
            <li><a href="index.php">Tin mới</a></li>
            <li><a href="favorites.php">Bài viết đã thích</a></li>
            <li><a href="dang-bai.php">Độc giả đăng bài</a></li>
            <?php if(isset($_SESSION['username'])): ?>
                <p class="dangnhap"><a href="logout.php">Đăng xuất</a></p>
                <p class="welcome">Chào, <?php echo $_SESSION['username']; ?></p>
            <?php else: ?>
                <p class="dangnhap"><a href="dangnhap.php">Đăng nhập</a></p>
            <?php endif; ?>
            <div class="search-btn">
                <a href="search.php"><i class="search-icon ti-search"></i></a>
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