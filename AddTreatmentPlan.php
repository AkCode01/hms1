<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(!isset($_GET['AdmID'])){
    header("location:admission.php");
}

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
    <h3 class="text-center text-white black-text-shadow">Treatment Plan</h3>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col">
            <h5>Add New Record</h5>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary btn-sm mb-2" href="admission.php">Admission</a>
        </div>  
</div>
			
<div class="row">
<div class="col-12">
<form action="SaveData.php" method="post">
    <div class="p-2">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <label for="Patient" class="form-label">Patient</label>
                <input type="text" class="form-control form-control-sm" name="Patient" readonly value="<?php echo $_GET['PatientName']; ?>">
                <input type="hidden" name="AdmissionID" readonly value="<?php echo $_GET['AdmID']; ?>">
            </div>
            <div class="col-md-4">
                <label for="TreatmentDescription" class="form-label">Treatment Description</label>
                <input type="text" class="form-control form-control-sm " name="TreatmentDescription">
            </div>
            
            <div class="col-md-4">
                <label for="TreatmentDate" class="form-label">Treatment Date</label>
                <input type="date" class="form-control form-control-sm" name="TreatmentDate" value="<?php echo date('d-m-Y'); ?>">
                <input type="hidden" name="Status" value="1">
                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" name="AddTreatmentPlan" value="Save Treatment" class="btn btn-primary btn-sm">
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