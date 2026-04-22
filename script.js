// Custom CMS JavaScript
document.addEventListener("DOMContentLoaded", function() {
  console.log("CMS loaded successfully!");
  
  // Confirm before deleting post
  const deleteLinks = document.querySelectorAll(".btn-danger");
  deleteLinks.forEach(link => {
    link.addEventListener("click", function(e) {
      if(!confirm("Are you sure you want to delete this post?")) {
        e.preventDefault();
      }
    });
  });
});
