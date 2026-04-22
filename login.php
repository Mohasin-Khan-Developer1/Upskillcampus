<?php include("includes/header.php"); ?>
<?php include("includes/auth.php"); ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
  <div class="card shadow-lg p-4" style="width:400px;">
    <h3 class="text-center mb-4">Login to MyCMS</h3>
    <form method="POST" action="">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
    <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a></p>
  </div>
</div>

<?php
if(isset($_POST['login'])){
    if(loginUser($_POST['username'], $_POST['password'])){
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<div class='alert alert-danger mt-3 text-center'>Invalid credentials!</div>";
    }
}
?>

<?php include("includes/footer.php"); ?>
