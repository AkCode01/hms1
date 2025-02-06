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
$ptvisit = Tot_DR_Assesment_VNum_ByVID($_GET['vid']);   
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
        <h3 class="text-center text-white black-text-shadow">Doctor Assesment</h3>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col">
            <h5>Add Assesment</h5>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary btn-sm" href="visit_log.php">Visit Log</a>
            <a class="btn btn-primary btn-sm" href="patients.php">Patients</a>
        </div>  
</div>
<div class="row">
<div class="col-12">
  
<form action="InsertNewData.php" method="post">
    <div class="p-2">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <label for="DrAsDate" class="form-label">Date</label>
                <input type="date" class="form-control form-control-sm"  name="DrAsDate">
            </div>
            
            <div class="col-md-4">
                <label for="DrAsVisitNo" class="form-label">Visit No</label>
                <input type="text" value="<?php echo $ptvisit[0]['vists']+1; ?>" class="form-control form-control-sm"  name="DrAsVisitNo">
            </div>
            <div class="col-md-4">
                <label for="DrAsActComplain" class="form-label">Complain</label>
                <input type="text" class="form-control form-control-sm"  name="DrAsActComplain">
            </div>
            <div class="col-md-4">
                <label for="DrAsDuration" class="form-label">Duration (hrs)</label>
                <input type="text" class="form-control form-control-sm"  name="DrAsDuration">
            </div>
            <div class="col-md-4">
                <label for="DrAsExamination" class="form-label">Examination</label>
                <input type="text" class="form-control form-control-sm"  name="DrAsExamination">
            </div>
            <div class="col-md-4">
                <label for="DrAsPastMedHistory" class="form-label">Past Med History</label>
                <input type="text" class="form-control form-control-sm"  name="DrAsPastMedHistory">
            </div>
            <div class="col-md-4">
                <label for="DrAsPreTreatment" class="form-label">Previous Treatment</label>
                <input type="text" class="form-control form-control-sm"  name="DrAsPreTreatment">
            </div>
            <div class="col-md-4">
                <label for="DrAsRadiationLocation" class="form-label">Chemo Radiation Location</label>
                <input type="text" class="form-control form-control-sm"  name="DrAsRadiationLocation">
            </div>
            <div class="col-md-4">
                <label for="DrAsRadiationCycles" class="form-label">Chemo Radiation Cycles</label>
                <input type="text" class="form-control form-control-sm"  name="DrAsRadiationCycles">
            </div>
            <div class="col-md-4">
                <label for="DrAsRadiationDateFrom" class="form-label">Chemo Radiation From</label>
                <input type="date" class="form-control form-control-sm"  name="DrAsRadiationDateFrom">
            </div>
            <div class="col-md-4">
                <label for="DrAsRadiationDateTo" class="form-label">Chemo Radiation To</label>
                <input type="date" class="form-control form-control-sm"  name="DrAsRadiationDateTo">
            </div>
            <div class="col-md-4">
                <label for="DrAsFractions" class="form-label">Radiation Fractions</label>
                <input type="text" class="form-control form-control-sm"  name="DrAsFractions">
                <input type="hidden" value="<?php echo $_GET['vid'] ?>" name="VisitId">
                <input type="hidden" name="Status" value="1">
                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
            </div>
           
        </div>
        <div class="mt-3">
            <input type="submit" name="AddDoctorAssesment" value="Save" class="btn btn-primary btn-sm">

                
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