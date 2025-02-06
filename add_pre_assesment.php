<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(!isset($_GET['vid']))
{
    header("location:visit_log.php");
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
    <?php if (isset($_GET['err']) == 1) { ?>
        $('#myModal').modal('show');
    <?php } ?>
});
$(document).ready(function () {
    $("#ItemstTable tr").click(function () {
        $("#ItemstTable tr").removeClass("bg-warning");
        $(this).addClass("bg-warning");
    });
});
</script>
</head>
<body>
<div class="se-pre-con"></div>
<?php include "Header.php"; ?>
<div class="container-fluid bg-light pt-3 pb-3 mt-0 mb-3 drPage">
    <div class="p-5">
        <h2 class="text-center text-white black-text-shadow">O P D</h2>
        <h3 class="text-center text-white black-text-shadow">Pre Assesment</h3>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col">
            <h5>Add New Record</h5>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary btn-sm" href="visit_log.php">Visit Log</a>
            <a class="btn btn-primary btn-sm" href="patients.php">Patients</a>
        </div>  
</div>
<div class="row">
<div class="col-12">





   
<form action="SaveData.php" method="post" enctype="multipart/form-data">
    <div class="p-2">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <label for="pa_bp_sys" class="form-label">BP Sys</label>
                <input type="text" class="form-control form-control-sm"  name="pa_bp_sys">
            </div>
            <div class="col-md-4">
                <label for="pa_bp_dia" class="form-label">BP Dia</label>
                <input type="text" class="form-control form-control-sm"  name="pa_bp_dia">
            </div>
            <div class="col-md-4">
                <label for="pa_pulse" class="form-label">Pulse</label>
                <input type="text" class="form-control form-control-sm"  name="pa_pulse">
            </div>
            <div class="col-md-4">
                <label for="pa_weight" class="form-label">Weight (Kg)</label>
                <input type="text" class="form-control form-control-sm"  name="pa_weight">
            </div>
            <div class="col-md-4">
                <label for="pa_height" class="form-label">Height (ft/in)</label>
                <input type="text" class="form-control form-control-sm"  name="pa_height">
            </div>
            
            <div class="col-md-4">
                <label for="pa_spo2" class="form-label">Spo2</label>
                <input type="text" class="form-control form-control-sm"  name="pa_spo2">
            </div>
            <div class="col-md-4">
                <label for="pa_temp" class="form-label">Temperature (°F)</label>
                <input type="text" class="form-control form-control-sm"  name="pa_temp">
                <input type="hidden" value="<?php echo $_GET['vid'] ?>" name="VisitId">
                <input type="hidden" name="Status" value="1">
                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <input type="hidden" name="pa_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" name="AddPreAssesment" value="Save" class="btn btn-primary btn-sm">
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