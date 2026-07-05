<?php
session_start();
include("db.php");

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

if(isset($_GET['search']) && $_GET['search']!="")
{
    $search = $_GET['search'];
    $sql = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY id DESC";
}
else
{
    $sql = "SELECT * FROM posts ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/style.css">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>View Posts | Blog Management System </title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

<nav class="navbar navbar-dark bg-primary shadow">

<div class="container">

<a class="navbar-brand">
📝 Blog Management System
</a>

<div>

<a href="dashboard.php" class="btn btn-light me-2">Dashboard</a>

<a href="add_post.php" class="btn btn-success me-2">Add Post</a>

<a href="logout.php" class="btn btn-danger">Logout</a>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="card shadow-lg p-4">

<h2 class="text-center text-primary mb-4">
📋 All Blog Posts
</h2>

<form method="GET" class="mb-4">
<div class="input-group">
<input
type="text"
name="search"
class="form-control"
placeholder="Search by Title..."
value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
<button class="btn btn-primary">Search</button>
</div>
</form>

<table class="table table-bordered table-hover text-center">

<thead class="table-primary">

<tr>

<th>ID</th>
<th>Title</th>
<th>Content</th>
<th>Date</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['content']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="edit_post.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="delete_post.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this post?');">
Delete
</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>
<footer class="text-center mt-5 mb-3 text-muted">
    <hr>
    <p>© 2026 Blog Management System | Developed by Kajal Kumari</p>
</footer>
</body>
</html>