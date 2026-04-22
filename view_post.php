<?php include("includes/header.php"); ?>
<?php include("includes/db.php"); ?>

<div class="container mt-4">
  <?php
  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM posts WHERE id = $id";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
          $post = $result->fetch_assoc();
          echo "<h2>".$post['title']."</h2>";
          echo "<p><strong>Author:</strong> ".$post['author']."</p>";
          if(!empty($post['image'])){
              echo "<img src='assets/images/".$post['image']."' class='img-fluid mb-3'>";
          }
          echo "<p>".$post['content']."</p>";
      } else {
          echo "<div class='alert alert-danger'>Post not found!</div>";
      }
  }
  ?>
</div>

<?php include("includes/footer.php"); ?>
