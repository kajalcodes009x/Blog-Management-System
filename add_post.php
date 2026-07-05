<?php
session_start();
include("db.php");

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

$message="";

if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $content=$_POST['content'];

    $sql="INSERT INTO posts(title,content) VALUES('$title','$content')";

    if(mysqli_query($conn,$sql))
    {
        $message="<div class='alert alert-success'>✅ Post Added Successfully!</div>";
    }
    else
    {
        $message="<div class='alert alert-danger'>❌ Something went wrong!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Post | Blog Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<nav class="navbar navbar-dark bg-primary shadow">

<div class="container">

<a href="dashboard.php" class="navbar-brand">
📝 Blog Management System
</a>

<div>

<a href="dashboard.php" class="btn btn-light me-2">
Dashboard
</a>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow-lg p-4">

<h2 class="text-center text-primary mb-4">
➕ Add New Blog Post
</h2>

<?php
echo $message;
?>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Title
</label>

<input
type="text"
name="title"
class="form-control"
placeholder="Enter Blog Title"
required>

</div>

<div class="mb-3">

<label class="form-label">
Content
</label>

<textarea
name="content"
class="form-control"
rows="6"
placeholder="Write your blog content here..."
required></textarea>

</div>

<div class="d-grid">

<button
type="submit"
name="submit"
class="btn btn-success">

Publish Post

</button>

</div>

</form>

</div>

</div>

</div>

</div>

<footer class="text-center mt-5 mb-3 text-muted">
<hr>
<p>© 2026 Blog Management System | Developed by Kajal Kumari</p>
</footer>

</body>
</html>