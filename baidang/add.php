<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_tintuc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

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
}// Kiểm tra và tạo thư mục uploads nếu chưa tồn tại
$uploadDir = 'uploads';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Kiểm tra và xử lý tệp DOCX
    if (isset($_FILES['content_file']) && $_FILES['content_file']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['content_file']['tmp_name'];
        $zip = new ZipArchive;
        if ($zip->open($fileTmpPath) === TRUE) {
            if (($index = $zip->locateName('word/document.xml')) !== false) {
                $data = $zip->getFromIndex($index);
                $xml = new SimpleXMLElement($data);
                $namespaces = $xml->getNamespaces(true);
                $xml->registerXPathNamespace('w', $namespaces['w']);
                $paragraphs = $xml->xpath('//w:body/w:p');
                $content = '';
                foreach ($paragraphs as $p) {
                    $texts = $p->xpath('w:r/w:t');
                    foreach ($texts as $text) {
                        $content .= (string) $text;
                    }
                    $content .= "\n";
                }
            }
            $zip->close();
        }
    }

    // Xử lý ảnh nếu có
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = $uploadDir . '/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    // Thêm bài báo mới vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO db_baidang (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $image);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
