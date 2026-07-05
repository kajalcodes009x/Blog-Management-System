<?php
session_start();
include("db.php");

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM posts WHERE id=$id");
$row=mysqli_fetch_assoc($result);

$message="";

if(isset($_POST['update']))
{
    $title=$_POST['title'];
    $content=$_POST['content'];

    $sql="UPDATE posts SET title='$title', content='$content' WHERE id=$id";

    if(mysqli_query($conn,$sql))
    {
        $message="✅ Post Updated Successfully!";
        header("refresh:1;url=view_posts.php");
    }
    else
    {
        $message="❌ Update Failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="assets/css/style.css">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Post | Blog Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-primary shadow">

<div class="container">

<a href="dashboard.php" class="navbar-brand">
📝 Blog Management
</a>

<a href="logout.php" class="btn btn-light">
Logout
</a>

</div>

</nav>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow-lg p-4">

<h2 class="text-center text-warning mb-4">
✏️ Edit Blog Post
</h2>

<?php
if($message!="")
{
echo "<div class='alert alert-success'>$message</div>";
}
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
value="<?php echo $row['title']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Content
</label>

<textarea
name="content"
rows="6"
class="form-control"
required><?php echo $row['content']; ?></textarea>

</div>

<div class="d-grid">

<button
type="submit"
name="update"
class="btn btn-warning">

Update Post

</button>

</div>

</form>

<br>

<a href="view_posts.php" class="btn btn-primary">
⬅ Back to Posts
</a>

</div>

</div>

</div>

</div>

</body>

</html>