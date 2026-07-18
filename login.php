<?php
session_start();
include("db.php");

if(isset($_POST['login']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($username) || empty($password))
    {
        $error = "Please fill all fields!";
    }
    else
    {
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username=? AND password=?");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        }
        else
        {
            $error = "Invalid Username or Password!";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Blog Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-5">

<div class="card shadow-lg p-4">

<h2 class="text-center text-primary mb-3">
📝 Blog Management System
</h2>

<p class="text-center text-muted">
Login to continue
</p>

<?php
if(isset($error))
{
    echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label class="form-label">Username</label>
<input
type="text"
name="username"
class="form-control"
placeholder="Enter Username"
required>
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input
type="password"
name="password"
class="form-control"
placeholder="Enter Password"
required>
</div>

<div class="d-grid">
<button
type="submit"
name="login"
class="btn btn-primary">
Login
</button>
</div>

</form>

<hr>

<p class="text-center text-secondary">
ApexPlanet Internship Project
</p>

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