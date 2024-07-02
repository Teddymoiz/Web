<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = null;

    if ($_FILES['image']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = $target_file;
    }

    $sql = "INSERT INTO db_baidang (title, content, image, status) VALUES ('$title', '$content', '$image', 'pending')";
    if ($conn->query($sql) === TRUE) {
        header("Location: baidang.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
