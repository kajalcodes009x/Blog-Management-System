<?php
session_start();
include("db.php");

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

$postResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM posts");
$postCount = mysqli_fetch_assoc($postResult)['total'];

$userResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$userCount = mysqli_fetch_assoc($userResult)['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard | Blog Management System</title>

<link rel="stylesheet" href="style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

<div class="container">

<a class="navbar-brand fw-bold" href="#">
📝 Blog Management System
</a>

<div>

<span class="text-white me-3">
Welcome, <?php echo $_SESSION['username']; ?>
</span>

<a href="logout.php" class="btn btn-danger btn-sm">
🚪 Logout
</a>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="row mb-4">

<div class="col-md-6">

<div class="card shadow-lg border-0 text-center p-4">

<h3 class="text-primary">
<?php echo $postCount; ?>
</h3>

<p class="fw-bold">Total Posts</p>

</div>

</div>

<div class="col-md-6">

<div class="card shadow-lg border-0 text-center p-4">

<h3 class="text-success">
<?php echo $userCount; ?>
</h3>

<p class="fw-bold">Total Users</p>

</div>

</div>

</div>

<div class="row g-4">

<div class="col-md-4">

<div class="card shadow-lg border-0 p-4 text-center">

<h1>➕</h1>

<h4>Add Post</h4>

<p>Create a new blog post.</p>

<a href="add_post.php" class="btn btn-success">
Open
</a>

</div>

</div>

<div class="col-md-4">

<div class="card shadow-lg border-0 p-4 text-center">

<h1>📄</h1>

<h4>View Posts</h4>

<p>See all blog posts.</p>

<a href="view_posts.php" class="btn btn-primary">
Open
</a>

</div>

</div>

<div class="col-md-4">

<div class="card shadow-lg border-0 p-4 text-center">

<h1>👤</h1>

<h4>Profile</h4>

<p>Manage your profile.</p>

<a href="profile.php" class="btn btn-warning">
Open
</a>

</div>

</div>

</div>

</div>

<footer class="text-center mt-5 mb-3 text-muted">

<hr>

<p>© 2026 Blog Management System</p>

<p>Developed by <b>Kajal Kumari</b> | ApexPlanet Internship</p>

</footer>

</body>

</html>