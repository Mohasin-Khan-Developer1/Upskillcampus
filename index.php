<?php include("includes/header.php"); ?>
<div class="container mt-4">

  <!-- Hero Section -->
  <div class="p-5 mb-4 bg-light rounded-3">
    <h1 class="display-5 fw-bold">Welcome to MyCMS</h1>
    <p class="fs-4">This is a simple Content Management System where you can add, edit, and delete posts.</p>
    <a href="dashboard.php" class="btn btn-primary btn-lg">Go to Dashboard</a>
  </div>

  <!-- Latest Posts -->
  <h2 class="mb-3">Latest Posts</h2>
  <div class="row">
    <?php
    include("includes/db.php");
    $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 3";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        // echo '<div class="col-md-4">';
        // echo '<div class="card mb-4">';
        // if($row['image']){
        //   echo '<img src="assets/images/'.$row['image'].'" class="card-img-top">';
        // }
        // echo '<div class="card-body">';
        // echo '<h5 class="card-title">'.$row['title'].'</h5>';
        // echo '<p class="card-text">'.substr($row['content'],0,100).'...</p>';
        // echo '<a href="view_post.php?id='.$row['id'].'" class="btn btn-sm btn-outline-primary">Read More</a>';

        // echo '</div></div></div>';
        echo '<div class="col-md-4 d-flex">';
echo '<div class="card mb-4 h-100">';
if($row['image']){
  echo '<img src="assets/images/'.$row['image'].'" class="card-img-top">';
}
echo '<div class="card-body d-flex flex-column">';
echo '<h5 class="card-title">'.$row['title'].'</h5>';
echo '<p class="card-text">'.substr($row['content'],0,100).'...</p>';
echo '<a href="view_post.php?id='.$row['id'].'" class="btn btn-sm btn-outline-primary mt-auto">Read More</a>';
echo '</div></div></div>';

      }
    } else {
      echo "<p>No posts available yet.</p>";
    }
    ?>
  </div>
</div>
<?php include("includes/footer.php"); ?>

