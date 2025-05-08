<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
  include "db_conn.php";
  include "php/func-book.php";
  include "php/func-author.php";
  include "php/func-category.php";

  $books = get_all_books($conn);
  $authors = get_all_authors($conn);
  $categories = get_all_categories($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ADMIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container mt-4">
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="admin.php">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.php">Store</a></li>
            <li class="nav-item"><a class="nav-link" href="add-book.php">Add Book</a></li>
            <li class="nav-item"><a class="nav-link" href="add-category.php">Add Category</a></li>
            <li class="nav-item"><a class="nav-link" href="add-author.php">Add Author</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <?php if ($books == 0): ?>
      <p>No books found.</p>
    <?php else: ?>
      <h4>All Books</h4>
      <table class="table table-bordered shadow">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($books as $index => $book): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td>
                <?php if (!empty($book['cover'])): ?>
                  <img width="100" src="uploads/cover/<?= htmlspecialchars($book['cover']) ?>" 
                       alt="Cover of <?= htmlspecialchars($book['title']) ?>">
                <?php endif; ?>

                <?php if (!empty($book['files'])): ?>
                  <a class="link-dark d-block text-center"
   href="uploads/files/<?=$book['file']?>">
  <>=$book['title']?>
</a>

                <?php else: ?>
                  <div class="text-center mt-1">
                    <?= htmlspecialchars($book['title']) ?><br>
                    <small class="text-muted">(No file)</small>
                  </div>
                <?php endif; ?>
              </td>
              <td>
                <?php
                  if ($authors == 0) {
                    echo "Undefined";
                  } else {
                    foreach ($authors as $author) {
                      if ($author['id'] == $book['author_id']) {
                        echo htmlspecialchars($author['name']);
                        break;
                      }
                    }
                  }
                ?>
              </td>
              <td><?= htmlspecialchars($book['description']) ?></td>
              <td>
                <?php
                  if ($categories == 0) {
                    echo "Undefined";
                  } else {
                    foreach ($categories as $category) {
                      if ($category['id'] == $book['category_id']) {
                        echo htmlspecialchars($category['name']);
                        break;
                      }
                    }
                  }
                ?>
              </td>
              <td>
                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</body>
</html>

<?php
} else {
  header("Location: login.php");
  exit;
}
?>
