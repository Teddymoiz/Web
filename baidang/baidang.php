<?php
include("config.php");

// Hàm lấy danh sách bài báo
function getArticles() {
    global $conn;
    $sql = "SELECT * FROM db_baidang"; // Thay đổi tên bảng ở đây
    $result = $conn->query($sql);
    $articles = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    }
    return $articles;
}

function searchArticles($searchKeyword) {
    global $conn;
    $sql = "SELECT * FROM db_baidang WHERE title LIKE '%$searchKeyword%'"; // Thay đổi tên bảng ở đây
    $result = $conn->query($sql);
    $articles = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    }
    return $articles;
}

// Xử lý tìm kiếm khi có yêu cầu POST từ form tìm kiếm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $searchKeyword = $_POST['searchKeyword'];
    $articles = searchArticles($searchKeyword);
} else {
    $articles = getArticles();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quản Lý Bài Đăng</title>
</head>
<body>
    <div class="container">
        <h2>Quản Lý Bài Đăng</h2>
        <button onclick="document.getElementById('addModal').style.display='block'">Thêm bài báo mới</button>
        <form method="POST" class="mt-3">
            <input type="text" name="searchKeyword" placeholder="Nhập tiêu đề bài báo...">
            <button type="submit" name="search" class="btn btn-primary">Tìm Kiếm</button>
            <button type="submit" name="reset" class="btn btn-secondary">Hủy Tìm Kiếm</button>
        </form>
        <div class="mt-3">
            <?php foreach ($articles as $article) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h3><?php echo $article['title']; ?></h3>
                    <p><?php echo substr($article['content'], 0, 100); ?>...</p>
                    <div class="actions">
                        <form method="POST" action="delete.php" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger">Xóa</button>
                        </form>
                        <button class="btn btn-warning" onclick="editArticle('<?php echo $article['id']; ?>', '<?php echo $article['title']; ?>', '<?php echo $article['content']; ?>')">Sửa</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal thêm bài báo -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('addModal').style.display='none'">&times;</span>
            <h4 class="modal-title">Thêm Bài Báo Mới</h4>
            <form action="add.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Tiêu Đề:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="content">Nội Dung:</label>
                    <textarea id="content" name="content" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Ảnh:</label>
                    <input type="file" id="image" name="image" accept="image/*" class="form-control">
                </div>
                <button type="submit" name="add" class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>

    <!-- Modal sửa bài báo -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('editModal').style.display='none'">&times;</span>
            <h4 class="modal-title">Sửa Bài Báo</h4>
            <form action="edit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="edit_id" name="id">
                <div class="form-group">
                    <label for="edit_title">Tiêu Đề:</label>
                    <input type="text" id="edit_title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_content">Nội Dung:</label>
                    <textarea id="edit_content" name="content" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="edit_image">Ảnh:</label>
                    <input type="file" id="edit_image" name="image" accept="image/*" class="form-control">
                </div>
                <button type="submit" name="update" class="btn btn-primary">Cập Nhật</button>
            </form>
        </div>
    </div>

    <script>
        function editArticle(id, title, content) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_content').value = content;
            document.getElementById('editModal').style.display = 'block';
        }

        window.onclick = function(event) {
            var addModal = document.getElementById('addModal');
            var editModal = document.getElementById('editModal');
            if (event.target == addModal) {
                addModal.style.display = 'none';
            }
            if (event.target == editModal) {
                editModal.style.display = 'none';
            }
        }

        document.querySelectorAll('.close').forEach(function(element) {
            element.onclick = function() {
                element.parentElement.parentElement.style.display = 'none';
            }
        });
    </script>
</body>
</html>
