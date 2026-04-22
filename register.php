<?php include("includes/header.php"); ?>
<?php include("includes/auth.php"); ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">
  <div class="card shadow-lg p-4" style="width:400px;">
    <h3 class="text-center mb-4">Create Account</h3>
    <form method="POST" action="">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Choose a username" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Create a password" required>
      </div>
      <button type="submit" name="register" class="btn btn-success w-100">Register</button>
    </form>
    <p class="mt-3 text-center">Already have an account? <a href="login.php">Login here</a></p>
  </div>
</div>

<?php
if(isset($_POST['register'])){
    if(registerUser($_POST['username'], $_POST['password'])){
        echo "<div class='alert alert-success mt-3 text-center'>Registration successful! <a href='login.php'>Login here</a></div>";
    } else {
        echo "<div class='alert alert-danger mt-3 text-center'>Error registering user.</div>";
    }
}
?>

<?php include("includes/footer.php"); ?>
