<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

// $day = date('l');
// $doctors = Get_Active_Doctors_Schedule_By_Day($day);
$doctors = Get_Active_Doctors();
$patients = get_patients();

if(isset($_GET['pid'])){
    $npid = $_GET['pid'];
}else{
    $npid = 0;
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
        <h2 class="text-center text-white black-text-shadow">ADD NEW VISITOR</h2>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col-md-6">
            <H5>Add Visitor</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <a class="btn btn-primary mb-1 btn-sm mb-2" href="patients.php">Patients</a>
            <a class="btn btn-primary mb-1 btn-sm mb-2" href="visit_log.php">Visit Log</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
<form action="SaveData.php" method="post">
    <div class="p-2">
        <div class="row g-3 align-items-center">
        <div class="col-md-4">
                <label for="PatientId" class="form-label">Patient</label>
<select class="form-control form-select form-select-sm" id="PatientId" name="PatientId" required>
    <option  disabled selected value="">Select Patient</option>
<?php foreach($patients as $pt){ ?>
<option value="<?php echo $pt['patient_id']; ?>" <?php if($pt['patient_id']== $npid){ echo "selected";} ?>>
    <?php echo $pt['patient_id']."-".$pt['patient_first_name']." ".$pt['patient_last_name']; ?></option>
<?php } ?>
</select>
            </div>
        <div class="col-md-4">
                <label for="DoctorId" class="form-label">Doctor</label>
<select class="form-control form-select form-select-sm" id="DoctorId" name="DoctorId" required>
    <option  disabled selected value="">Select Doctor</option>
<?php foreach($doctors as $dr){ ?>
<option value="<?php echo $dr['doctor_id'] ?>"><?php echo $dr['dr_first_name']." ".$dr['dr_last_name'] ?></option>
<?php } ?>
</select>
            </div>
      

<div class="col-md-4">
    <label for="VisitDate" class="form-label">Visit Date</label>
    <input type="datetime-local" value="<?php echo date('Y-m-d\TH:i'); ?>" class="form-control form-control-sm" id="VisitDate" name="VisitDate" required>

</div>

            <div class="col-md-6">
                <label for="visit_symptoms" class="form-label">Symptoms</label>
                <input type="text" class="form-control form-control-sm" id="visit_symptoms" name="visit_symptoms" required>
            </div>
            <div class="col-md-6">
                <label for="visit_diagnosis" class="form-label">Diagnosis</label>
                <input type="text" class="form-control form-control-sm" id="visit_diagnosis" name="visit_diagnosis" required>
            
                <input type="hidden" name="Status" value="1">
                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" name="AddVisitor" id="AddVisitor" value="Save Visitor" class="btn btn-primary btn-sm">
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