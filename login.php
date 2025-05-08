<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>LOGIN</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <form class="p-5 rounded shadow" style="width: 30rem;" method="POST" action="php/auth.php">
        <h1 class="text-center display-4 pb-5">LOGIN</h1>

        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($_GET['error']); ?>
          </div>
        <?php } ?>

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        <a href="index.php" class="btn btn-link">Store</a>
      </form>
    </div>
  </body>
</html>
