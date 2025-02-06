<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

 // print_r($_POST);
if(!isset($_POST['LabTestID'])){
    header("location:index.php");
}

$LTID = $_POST['LabTestID'];

if(isset($_POST['EditBtn'])){
   $submitBtn = "Edit";
}
elseif(isset($_POST['DelBtn']))
{
   $submitBtn = "Dell";
}
$LabTest = Get_LabTest_ByID($LTID);
// print_r($LabTest);
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
    <?php if (isset($_GET['err']) == 1) { ?>
        $('#myModal').modal('show');
    <?php } ?>
});
</script>
</head>
<body>
<div class="se-pre-con"></div>
<?php include "Header.php"; ?>
<div class="container-fluid bg-light pt-3 pb-3 mt-0 mb-3 drPage">
    <div class="p-5">
    <h2 class="text-center text-white black-text-shadow">I P D</h2>
    <h3 class="text-center text-white black-text-shadow">Lab Test</h3>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col-md-6">
        <h5>Update Lab Test</h5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <a class="btn btn-primary btn-sm mb-2" href="lab_test.php">View All</a>
        </div>  
    </div>
<div class="row">

<div class="col-12">

<?php if($submitBtn =="Edit"){ ?>

<form action="SaveUpdatedData.php" method="post">
    <div class="p-2">
        <div class="row g-3 align-items-center">

<div class="col-md-4">
    <label for="LTID" class="form-label">Lab Test ID</label>
    <input type="number" name="LTID" value="<?php echo $LabTest[0]['lab_test_id'] ?>" class="form-control form-control-sm" readonly>
</div> 

<div class="col-md-4">
    <label for="LTDate" class="form-label">Date</label>
    <input type="datetime-local" name="LTDate" value="<?php echo str_replace(' ', 'T', substr($LabTest[0]['lab_test_date'], 0, 16)); ?>" class="form-control form-control-sm">
</div> 
<div class="col-md-4">
    <label for="description" class="form-label">Description</label>
    <input type="text" name="description" value="<?php echo $LabTest[0]['lab_test_description'] ?>" class="form-control form-control-sm">
</div> 
<div class="col-md-4">
    <label for="status" class="form-label">Status</label>
        <select class="form-control form-select form-select-sm" name="status" required>
            <option disabled value="">Select Status</option>
            <?php if($LabTest[0]['lab_test_status']== 1){ ?>
                <option selected value="1">Active</option>
                <option value="0">In-Active</option>
            <?php }else{?>
                <option value="1">Active</option>
                <option selected value="0">In-Active</option>
            <?php }?>       
        </select>
        <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser'] ?>">
        <input type="hidden" name="ModifiedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
    </div>
        </div>
        <div class="mt-3">
            <input type="submit" name="EditLabTest" value="Save Changes" class="btn btn-primary btn-sm">
        </div>
    </div>
</form>

<?php } else{ ?>
    <H2 class="mb-3">Please update this record and set the status InActive </H2>
<?php }?>
</div>
</div>
</div>
</body>
</html>