<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

 // print_r($_POST);
if(!isset($_POST['VlogID'])){
    header("location:index.php");
}

$vid = $_POST['VlogID'];

if(isset($_POST['EditBtn']))
{
$doctors = get_doctors();
$patients = get_patients();

   $submitBtn = "Edit";
}
elseif(isset($_POST['DelBtn']))
{
   $submitBtn = "Dell";
}
 $visitor = get_visit_log_Only_byID($vid);
// print_r($visitor);

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
    </div>    
</div>
<div class="container">
<div class="row">

<div class="col-12">
<?php if($submitBtn =="Edit"){ ?>
        
    <div class="row mb-1">
        <div class="col">
        <H5 class="mb-1">Update Visitor Log</H5>
        </div>
        <div class="col text-end">
        <a class="btn btn-primary mb-2 btn-sm" href="patients.php">Patients</a>
        <a class="btn btn-primary mb-2 btn-sm" href="visit_log.php">Visit Log</a>
        
        </div>  
    </div>
<form action="SaveData.php" method="post" enctype="multipart/form-data">
    <div class="p-2">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <label for="VId" class="form-label">Visit Id</label>
                <input type="text" value="<?php echo $visitor[0]['visit_id'] ?>" class="form-control" id="VId" name="VId" readonly>
            </div>
           
            <div class="col-md-4">
                <label for="DoctorId" class="form-label">Doctor</label>

<select class="form-control form-select" id="DoctorId" name="DoctorId" required>
<option disabled value="">Select Doctor</option>
<?php foreach($doctors as $dr){ ?>
<option <?php if($dr['doctor_id']==$visitor[0]['doctor_id']){echo "selected";} ?>  value="<?php echo $dr['doctor_id'] ?>"><?php echo $dr['dr_first_name']." ".$dr['dr_last_name'] ?></option>
<?php } ?>
</select>

            </div>
            <div class="col-md-4">
                <label for="PatientId" class="form-label">Patient</label>
<select class="form-control form-select" id="PatientId" name="PatientId" required>
<option disabled value="">Select Patient</option>
<?php foreach($patients as $pt){ ?>
    <option <?php if($pt['patient_id']==$visitor[0]['patient_id']){echo "selected";} ?> value="<?php echo $pt['patient_id'] ?>"><?php echo $pt['patient_first_name']." ".$pt['patient_last_name'] ?></option>
<?php } ?>
</select>
            </div>



            <div class="col-md-4">
                <label for="VDate" class="form-label">Visit Date</label>
                <input type="datetime-local" value="<?php echo $visitor[0]['visit_date'] ?>" class="form-control" id="VDate" name="VDate" required>
            </div>
            <div class="col-md-4">
                <label for="Symptoms" class="form-label">Symptoms</label>
                <input type="text" value="<?php echo $visitor[0]['visit_symptoms'] ?>" class="form-control" id="Symptoms" name="Symptoms" required>
            </div>
            <div class="col-md-4">
                <label for="Diagnosis" class="form-label">Diagnosis</label>
                <input type="text" value="<?php echo $visitor[0]['visit_diagnosis'] ?>" class="form-control" id="Diagnosis" name="Diagnosis" required>
                <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                <input type="hidden" name="ModifiedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
            </div>
            
        </div>
        <div class="mt-3">
            <input type="submit" name="EditVisitLog" id="EditVisitLog" value="Update Visit Log" class="btn btn-primary btn-sm">
        </div>
    </div>
</form>


<?php } else{ ?>
    <H2 class="mb-3">Delete This Record</H2>
<?php }?>
</div>
</div>
</div>
</body>
</html>