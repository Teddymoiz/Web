<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tintuc";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = null;

    if ($_FILES['image']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = $target_file;
    }

    if ($image) {
        $sql = "UPDATE db_baidang SET title='$title', content='$content', image='$image' WHERE id='$id'";
    } else {
        $sql = "UPDATE db_baidang SET title='$title', content='$content' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: baidang.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
