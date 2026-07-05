<?php
include("db.php");

$message = "";

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($check) > 0)
    {
        $message = "<div class='alert alert-danger'>Username already exists!</div>";
    }
    else
    {
        $sql = "INSERT INTO users(username,password) VALUES('$username','$password')";

        if(mysqli_query($conn,$sql))
        {
            header("Location: login.php");
            exit();
        }
        else
        {
            $message = "<div class='alert alert-danger'>Registration Failed!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register | Blog Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow p-4">

<h2 class="text-center text-success mb-4">
Create Account
</h2>

<?php echo $message; ?>

<form method="POST">

<div class="mb-3">
<label>Username</label>
<input type="text" name="username" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="d-grid">
<button class="btn btn-success" name="register">
Register
</button>
</div>

</form>

<hr>

<p class="text-center">
Already have an account?
<a href="login.php">Login</a>
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