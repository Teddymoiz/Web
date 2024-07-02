<?php
session_start();

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

// Lấy ID bài viết từ POST
$post_id = $_POST['post_id'];

// Lấy ID người dùng từ phiên đăng nhập
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "Bạn cần đăng nhập để thực hiện chức năng này.";
    exit();
}

// Kiểm tra xem bài viết đã tồn tại trong danh sách yêu thích chưa
$sql_check = "SELECT * FROM yeuthich WHERE user_id = $user_id AND post_id = $post_id";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "Bài viết đã có trong danh sách yêu thích.";
} else {
    // Thêm bài viết vào danh sách yêu thích
    $sql = "INSERT INTO yeuthich (user_id, post_id) VALUES ('$user_id', '$post_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Đã thêm vào danh sách yêu thích.";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

// Chuyển hướng trở lại trang chi tiết bài viết
header("Location: post.php?id=$post_id");
exit();
?>
