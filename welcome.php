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
    <div class="jumbotron text-center p-3 bg-white">
        <div class="mb-3"><img class="img-fluid"  src="images/dts.png" height="300px"></div>
        <h2 class="text-success">Hospital Management System</h2>
        <div class="row text-center mt-3">
            <div class="col-12">
                <a href="login.php" class="btn btn-success btn-sm">Login <i class="fas fa-sign-in-alt"></i></a>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['err'])) { ?>
        <h3 class="text-center text-danger"> <?php echo $_GET['err']; ?></h3>
    <?php } ?>

</body>

</html>