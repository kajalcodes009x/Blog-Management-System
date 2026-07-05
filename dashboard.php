<?php
session_start();
include("db.php");

$postResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM posts");
$postCount = mysqli_fetch_assoc($postResult)['total'];

$userResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$userCount = mysqli_fetch_assoc($userResult)['total'];

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
< lang="en">
<head>
<link rel="stylesheet" href="assets/css/style.css">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard | Blog Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">





</head>

<body>

<nav class="navbar navbar-dark bg-primary shadow">
<div class="container">

<span class="navbar-brand">
📝 Blog Management System
</span>

<span class="text-white">
Welcome, <?php echo $_SESSION['username']; ?>
</span>

</div>
</nav>

<div class="container mt-5">
<div class="row mb-4">

<div class="col-md-6">
<div class="card shadow text-center p-4">
<h3 class="text-primary"><?php echo $postCount; ?></h3>
<p>Total Posts</p>
</div>
</div>

<div class="col-md-6">
<div class="card shadow text-center p-4">
<h3 class="text-success"><?php echo $userCount; ?></h3>
<p>Total Users</p>
</div>
</div>

</div>
<div class="row">

<div class="col-md-4">

<div class="card shadow p-4 text-center">

<h3>➕</h3>

<h4>Add Post</h4>

<p>Create a new blog post.</p>

<a href="add_post.php" class="btn btn-success">
Open
</a>

</div>

</div>

<div class="col-md-4">

<div class="card shadow p-4 text-center">

<h3>📄</h3>

<h4>View Posts</h4>

<p>See all blog posts.</p>

<a href="view_posts.php" class="btn btn-info">
Open
</a>

</div>

</div>

<div class="col-md-4">

<div class="card shadow p-4 text-center">

<h3>🚪</h3>

<h4>Logout</h4>

<p>Sign out securely.</p>

<a href="logout.php" class="btn btn-danger">
Logout<a href="profile.php" class="btn btn-light me-2">
    👤 Profile
</a>
</a>

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