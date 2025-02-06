<!doctype html>
<html>

<head>
    <title>Hospital Management System</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="jumbotron text-center">
        <h3>User Login</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 ">
                <form action="verify.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="email">User Name:</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter User Name" name="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="userpass" placeholder="Enter password" name="userpass" required>
                    </div>
                    <div class="text-center form-group mb-3">
                        <button type="submit" class="btn btn-primary btn-sm" name="loginbtn" id="loginbtn">Submit <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                </form>
                <div>
                    <?php if (isset($_GET['err'])) {
                        echo "<h3 class='text-center text-danger'>" . $_GET['err'] . "</h3>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>