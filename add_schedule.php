<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(!isset($_GET['DID']))
{
    header("location:doctors.php");
}
$DrID=$_GET['DID'];
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
        <h2 class="text-center text-white black-text-shadow">DOCTORS</h2>
        <h3 class="text-center text-white black-text-shadow">Doctor Schedule</h3>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col">
            <h5>Add New Schedule</h5>
        </div>
        <div class="col text-end">
            <a class="btn btn-primary btn-sm" href="doctor_schedule.php">Schedules</a>
            <a class="btn btn-primary btn-sm" href="doctors.php">Doctors</a>
            
            
        </div>  
</div>
<div class="row">
<div class="col-12">
<form action="SaveData.php" method="post" enctype="multipart/form-data">
    <div class="p-2">
        <div class="row g-3 align-items-center">
        <div class="col-md-3">
            <label for="DoctorId" class="form-label">Doctor</label>
            <input type="text" name="DoctorId" value="<?php echo $DrID; ?>" class="form-control form-control-sm" readonly>
        </div>

        <div class="col-md-3">
        <label for="schedule_day" class="form-label">Days</label>
        <input type="text" name="schedule_day" class="form-control form-control-sm" required>
        </div>
        <div class="col-md-3">
            <label for="TimeFrome" class="form-label">From</label>
            <input type="time" class="form-control form-control-sm" id="TimeFrome" name="TimeFrome" required>
        </div>
        <div class="col-md-3">
            <label for="TimeTo" class="form-label">To</label>
            <input type="time" class="form-control form-control-sm" id="TimeTo" name="TimeTo" required>
            <input type="hidden" name="DrScheduleStatus" value="1">
            <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
            <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>
        </div>
        <div class="mt-3">
            <input type="submit" name="AddDoctorSchedule" id="AddDoctorSchedule" value="Save Schedule" class="btn btn-primary btn-sm">
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