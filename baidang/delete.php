<?php
include("config.php");

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
