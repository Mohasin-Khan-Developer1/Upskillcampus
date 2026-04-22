<?php include("includes/db.php"); ?>

<?php
$id = $_GET['id'];

// Get image name before deleting
$sql = "SELECT image FROM posts WHERE id=$id";
$result = $conn->query($sql);
$post = $result->fetch_assoc();

if($post['image']){
    $image_path = "assets/images/".$post['image'];
    if(file_exists($image_path)){
        unlink($image_path); // delete image file
    }
}

$sql = "DELETE FROM posts WHERE id=$id";
if($conn->query($sql)){
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error deleting post: " . $conn->error;
}
?>
