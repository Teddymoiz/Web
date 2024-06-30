<?php
include("../config.php"); // Điều chỉnh đường dẫn nếu cần

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý thay đổi trạng thái bài đăng
if (isset($_POST['action']) && isset($_POST['post_id'])) {
    $action = $_POST['action'];
    $post_id = $_POST['post_id'];

    if ($action == 'approve') {
        $status = 'approved';
    } elseif ($action == 'reject') {
        $status = 'rejected';
    }

    $stmt = $conn->prepare("UPDATE db_baidang SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $post_id);
    $stmt->execute();
    $stmt->close();
}

// Lấy danh sách bài đăng chờ duyệt
$sql = "SELECT * FROM db_baidang WHERE status = 'pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm Duyệt Bài Đăng</title>
    <link rel="stylesheet" href="kiemduyet.css">
</head>
<body>
    <h1>Kiểm Duyệt Bài Đăng</h1>
    <table border="2" class="table">
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><img src="<?php echo $row['image']; ?>" alt="Hình ảnh" style="width: 100px;"></td>
            <td>
                <form method="post">
                    <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="action" value="approve">Phê duyệt</button>
                    <button type="submit" name="action" value="reject">Từ chối</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
