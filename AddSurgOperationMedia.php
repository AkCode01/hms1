<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(!isset($_GET['SOPID']))
{
    header("location:surg_pre_op_assessment.php");
}

$posassid = $_GET['SOPID'];

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
        <h2 class="text-center text-white black-text-shadow">SURGERY</h2>
        <h3 class="text-center text-white black-text-shadow">Pre Op Assesment Media</h3>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col">
            <h5>Add New Record</h5>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary btn-sm" href="surg_pre_op_assessment.php">View All</a>
        </div>  
</div>
<div class="row">
<div class="col-12">
<form action="SaveNewData.php" method="post" enctype="multipart/form-data">
    <div class="p-2">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <label for="SOPID" class="form-label">Operation Id</label>
                <input type="text" name="SOPID" value="<?php echo $posassid ?>" class="form-control form-control-sm" readonly>
            </div>
            <div class="col-md-4">
                <label for="MediaUrl" class="form-label">Media Url</label>
                <input type="text" name="MediaUrl" class="form-control form-control-sm">
            </div>
            		
            <div class="col-md-4">
                <label for="MediaType" class="form-label">Media Type</label>
                <select name="MediaType" class="form-control form-select form-select-sm" required>
                    <option disabled selected value="">Select Media Type</option>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
            </div>
            
            <div class="col-md-4">
            <label for="OperationImage" class="form-label">Image</label>
                <input type="file" id="OperationImage" name="OperationImage[]" multiple accept="image/png, image/jpg, image/jpeg" class="form-control form-control-sm">    
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">

            </div>
            
            <div class="col-md-4">
                <br>
                <input type="submit" name="AddSurgOperationMedia" value="Save" class="btn btn-primary btn-sm">
            </div>
            <div class="col-md-4">
                <br>
                <div class="PictureShow"></div>
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