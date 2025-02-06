<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

?>

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
<script>
$(window).on('load', function () {
    $(".se-pre-con").fadeOut("slow");
});

</script>
</head>
<body>
<div class="se-pre-con"></div>
<?php include "Header.php"; ?>
<div class="container-fluid bg-light pt-3 pb-3 mt-0 mb-3 drPage">
    <div class="p-5">
    <h2 class="text-center text-white black-text-shadow">I P D</h2>
    <h3 class="text-center text-white black-text-shadow">Add Lab Test Type</h3>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col">
            <h5>Add New Record</h5>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary btn-sm mb-2" href="lab_test_type.php">View All</a>
        </div>  
</div>
<div class="row">
<div class="col-12">
<form action="SaveData.php" method="post" enctype="multipart/form-data">
    <div class="p-2">				
    <div class="row align-items-center">
        <div class="col-6">
            <label for="LabTestTypeName" class="form-label">Lab Test Sub Type</label>
            <input type="text" class="form-control form-control-sm" name="LabTestTypeName" required>
            <input type="hidden" name="LabTestStatus" value="1">
            <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
            <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>
        <div class="col-12">            <br>
            <input type="submit" name="AddLabTestType" value="Save" class="btn btn-primary btn-sm">
        </div>
    </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>