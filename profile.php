<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profile | Blog Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<nav class="navbar navbar-dark bg-primary">
<div class="container">

<span class="navbar-brand">
👤 My Profile
</span>

<a href="dashboard.php" class="btn btn-light">
Dashboard
</a>

</div>
</nav>

<div class="container mt-5">

<div class="card shadow p-5 text-center">

<h2 class="text-primary">
Welcome, <?php echo $_SESSION['username']; ?> 🎉
</h2>

<p class="mt-3">
You are successfully logged into the Blog Management System.
</p>

<a href="dashboard.php" class="btn btn-primary mt-3">
⬅ Back to Dashboard
</a>

</div>

</div>
<footer class="text-center mt-5 mb-3 text-muted">
    <hr>
    <p>© 2026 Blog Management System | Developed by Kajal Kumari</p>
</footer>
</body>
</html>