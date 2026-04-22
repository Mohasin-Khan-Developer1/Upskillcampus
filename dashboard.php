<?php include("includes/header.php"); ?>
<?php include("includes/db.php"); ?>

<div class="container mt-4">
  <h2>Admin Dashboard</h2>
  <div class="row mb-4">
    <!-- Total Posts -->
    <div class="col-md-4">
      <div class="card text-bg-primary mb-3">
        <div class="card-body">
          <?php
          $post_count = $conn->query("SELECT COUNT(*) AS total FROM posts")->fetch_assoc()['total'];
          ?>
          <h5 class="card-title">Total Posts</h5>
          <p class="card-text fs-4"><?php echo $post_count; ?></p>
        </div>
      </div>
    </div>

    <!-- Total Categories -->
    <div class="col-md-4">
      <div class="card text-bg-success mb-3">
        <div class="card-body">
          <?php
          $cat_count = $conn->query("SELECT COUNT(*) AS total FROM categories")->fetch_assoc()['total'];
          ?>
          <h5 class="card-title">Total Categories</h5>
          <p class="card-text fs-4"><?php echo $cat_count; ?></p>
        </div>
      </div>
    </div>

    <!-- Total Users -->
    <div class="col-md-4">
      <div class="card text-bg-warning mb-3">
        <div class="card-body">
          <?php
          $user_count = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
          ?>
          <h5 class="card-title">Total Users</h5>
          <p class="card-text fs-4"><?php echo $user_count; ?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Posts Table -->
  <h3>Manage Posts</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Category</th>
        <th>Image</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT posts.*, categories.name AS category_name 
              FROM posts LEFT JOIN categories ON posts.category_id = categories.id 
              ORDER BY created_at DESC";
      $result = $conn->query($sql);

      while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['author']."</td>";
        echo "<td>".$row['category_name']."</td>";
        echo "<td>";
        if($row['image']){
          echo "<img src='assets/images/".$row['image']."' width='60'>";
        }
        echo "</td>";
        echo "<td>".$row['created_at']."</td>";
        echo "<td>
                <a href='edit_post.php?id=".$row['id']."' class='btn btn-sm btn-info'>Edit</a>
                <a href='delete_post.php?id=".$row['id']."' class='btn btn-sm btn-danger' onclick='return confirm(\"Delete this post?\")'>Delete</a>
              </td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include("includes/footer.php"); ?>
