<?php 
include_once("connection.php");
if(isset($_POST['tombol']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($db_connection, "SELECT * FROM tb_user where username='$username' and password=md5('$password')");
    if(mysqli_num_rows($result) > 0)
    {   
        $data_user = $result->fetch_array();


        session_start();
        $_SESSION['username'] = $data_user['username']; // Set session untuk username (simpan username di session)
        $_SESSION['nama'] = $data_user['nama']; // Set session untuk nama (simpan nama di session)

        if(isset($_POST['remember']))
        {
            setcookie('username', $data_user['username'], time() + (86400 * 30), "/");
        }
        
        header("Location: tampilbarang.php");
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="assets/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="" method="post">
  <img class="mb-4" src="" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

  <label for="username" class="sr-only">Username</label>
  <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>


  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" 
  name="password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" name="remember" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="tombol">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
</body>
</html>
