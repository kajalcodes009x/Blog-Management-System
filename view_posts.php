<?php
session_start();
include("db.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$search = "";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT * FROM posts
            WHERE title LIKE '%$search%'
            OR content LIKE '%$search%'
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM posts ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);
$totalPosts = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Posts | Blog Management System</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">

        <a class="navbar-brand fw-bold">
            📝 Blog Management System
        </a>

        <div>

            <a href="dashboard.php" class="btn btn-light me-2">
                🏠 Dashboard
            </a>

            <a href="add_post.php" class="btn btn-success me-2">
                ➕ Add Post
            </a>

            <a href="logout.php" class="btn btn-danger">
                🚪 Logout
            </a>

        </div>

    </div>
</nav>

<div class="container mt-5">

<div class="card shadow-lg p-4">

<h2 class="text-center text-primary mb-3">
📋 All Blog Posts
</h2>

<p class="text-end">
<span class="badge bg-success fs-6">
Total Posts : <?php echo $totalPosts; ?>
</span>
</p>

<form method="GET" class="mb-4">

<div class="input-group">

<input
type="text"
name="search"
class="form-control"
placeholder="Search by Title or Content..."
value="<?php echo htmlspecialchars($search); ?>">

<button class="btn btn-primary">
🔍 Search
</button>

</div>

</form>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle text-center">

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

if($totalPosts>0)
{

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
✏ Edit
</a>

<a href="delete_post.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this post?')">
🗑 Delete
</a>

</td>

</tr>

<?php

}

}

else

{

?>

<tr>

<td colspan="5" class="text-danger fw-bold">
No Posts Found
</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

<footer class="text-center mt-5 mb-3 text-muted">

<hr>

<p>
© 2026 Blog Management System | Developed by <b>Kajal Kumari</b>
</p>

</footer>

</body>

</html>