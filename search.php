<?php
include("includes/db.php");
include("includes/header.php");

if(isset($_GET['query'])){
    $search = $_GET['query'];
    $sql = "SELECT * FROM posts WHERE title LIKE ? OR content LIKE ?";
    $stmt = $conn->prepare($sql);
    $like = "%".$search."%";
    $stmt->bind_param("ss", $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<div class='container mt-4'>";
    echo "<h2>Search Results for '".htmlspecialchars($search)."'</h2>";

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>".$row['title']."</h5>";
            echo "<p class='card-text'>".substr($row['content'],0,150)."...</p>";
            echo "<a href='view_post.php?id=".$row['id']."' class='btn btn-sm btn-outline-primary'>Read More</a>";
            echo "</div></div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
    echo "</div>";
}

include("includes/footer.php");
?>
