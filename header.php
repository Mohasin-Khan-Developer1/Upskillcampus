<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My CMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
  body {
    background-image: url();
    background-size: cover;       /* image poore screen ko cover kare */
    background-repeat: no-repeat; /* repeat na ho */
    background-attachment: fixed; /* scroll karne par bhi fixed rahe */
  }
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MyCMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#cmsNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="cmsNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="add_post.php">Add Post</a></li>
        <li class="nav-item"><a class="nav-link" href="categories.php">Categories</a></li>
      </ul>

      <!-- Search Bar -->
      <form class="d-flex" action="search.php" method="GET">
        <input class="form-control me-2" type="search" name="query" placeholder="Search posts...">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>

      <ul class="navbar-nav ms-3">
        <?php session_start(); if(isset($_SESSION['username'])): ?>
          <li class="nav-item"><a class="nav-link" href="#">Welcome, <?php echo $_SESSION['username']; ?></a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
