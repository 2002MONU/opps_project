<?php

include_once 'app/User.php';
// Start the session
if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $user = new User();
   $user->email = $_POST['email'];
   $user->password = $_POST['password'];

   if($user->login()){
    echo "Login successful!";
   }else{
    echo "Login failed!";
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auth system</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Stacked form</h2>
  <form action="/login.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
    <button>
        <a href="register.php" class="btn btn-secondary">Register</a>
    </button>
  </form>
</div>

</body>
</html>
