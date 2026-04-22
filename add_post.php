<?php include("includes/header.php"); ?>
<?php include("includes/db.php"); ?>

<div class="container mt-4">
  <h2>Add New Post</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Content</label>
      <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
      <label>Category</label>
      <input type="text" name="new_category" class="form-control" placeholder="Write category name" required>
    </div>
    <div class="mb-3">
      <label>Upload Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Add Post</button>
  </form>
</div>

<?php
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['username'] ?? 'guest';

    // Category handle
    $category_id = null;
    if(!empty($_POST['new_category'])){
        $new_cat = $_POST['new_category'];
        $conn->query("INSERT INTO categories (name) VALUES ('$new_cat')");
        $category_id = $conn->insert_id; // nayi category ka id use karo
    }

    // Image upload
$image = $_FILES['image']['name'];
$image = str_replace(" ", "_", $image); // agar space ho to underscore me badal do
$tmp_name = $_FILES['image']['tmp_name'];
$target = __DIR__ . "/assets/images/" . basename($image);

if(!empty($image)){
    if(move_uploaded_file($tmp_name, $target)){
        echo "<div class='alert alert-success mt-3'>Image uploaded successfully!</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Image upload failed! Check folder path and permissions.</div>";
    }
}


    // Post insert
    $sql = "INSERT INTO posts (title, content, author, image, category_id) 
            VALUES ('$title', '$content', '$author', '$image', '$category_id')";
    if($conn->query($sql)){
        echo "<div class='alert alert-success mt-3'>Post added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: ".$conn->error."</div>";
    }
}
?>

<?php include("includes/footer.php"); ?>
