<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    $sql = "UPDATE db_baidang SET title='$title', content='$content', image='$image' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Bài viết đã được cập nhật thành công.";
        header("Location: baidang.php"); // Chuyển hướng về trang chủ sau khi cập nhật
    } else {
        echo "Lỗi cập nhật bài viết: " . $conn->error;
    }
}

$conn->close();
?>
