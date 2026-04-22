<?php include("includes/header.php"); ?>
<?php include("includes/db.php"); ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$result = $conn->query($sql);
$post = $result->fetch_assoc();
?>

<div class="container mt-4">
  <h2>Edit Post</h2>
  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <div class="mb-3">
      <label>Title</label>
      <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Content</label>
      <textarea name="content" class="form-control" rows="5"><?php echo $post['content']; ?></textarea>
    </div>
    <div class="mb-3">
      <label>Current Image</label><br>
      <?php if($post['image']) echo "<img src='assets/images/".$post['image']."' width='100'>"; ?>
    </div>
    <div class="mb-3">
      <label>Upload New Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" name="update" class="btn btn-success">Update Post</button>
  </form>
</div>

<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if(!empty($_FILES['image']['name'])){
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $target = "assets/images/" . basename($image);
        move_uploaded_file($tmp_name, $target);

        $sql = "UPDATE posts SET title='$title', content='$content', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
    }

    if($conn->query($sql)){
        echo "<div class='alert alert-success mt-3'>Post updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: ".$conn->error."</div>";
    }
}
?>

<?php include("includes/footer.php"); ?>
