<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tintuc";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM db_baidang WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: baidang.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
