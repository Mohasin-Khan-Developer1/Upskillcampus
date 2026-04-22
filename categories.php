<?php include("includes/header.php"); ?>
<?php include("includes/db.php"); ?>

<div class="container mt-4">
  <h2>Manage Categories</h2>

  <!-- Add Category Form -->
  <form method="POST" class="mb-4">
    <div class="mb-3">
      <label>Category Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Add Category</button>
  </form>

  <?php
  // Add category
  if(isset($_POST['add'])){
      $name = $_POST['name'];
      $sql = "INSERT INTO categories (name) VALUES ('$name')";
      if($conn->query($sql)){
          echo "<div class='alert alert-success'>Category added successfully!</div>";
      } else {
          echo "<div class='alert alert-danger'>Error: ".$conn->error."</div>";
      }
  }

  // Delete category
  if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $sql = "DELETE FROM categories WHERE id=$id";
      if($conn->query($sql)){
          echo "<div class='alert alert-success'>Category deleted successfully!</div>";
      } else {
          echo "<div class='alert alert-danger'>Error: ".$conn->error."</div>";
      }
  }
  ?>

  <!-- Categories List -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM categories ORDER BY id DESC";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()){
          echo "<tr>";
          echo "<td>".$row['id']."</td>";
          echo "<td>".$row['name']."</td>";
          echo "<td>
                  <a href='categories.php?delete=".$row['id']."' class='btn btn-sm btn-danger' onclick='return confirm(\"Delete this category?\")'>Delete</a>
                </td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<?php include("includes/footer.php"); ?>
