<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(!isset($_GET['admid']))
{
   header("location:admission.php");
}
else{
    $Treatments = Get_Treatment_By_ADMID($_GET['admid']);
}
//print_r($Treatments);
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
        <h2 class="text-center text-white black-text-shadow">I P D</h2>
        <h3 class="text-center text-white black-text-shadow">TREATMENT PLAN</h3>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col-md-6">
            <H5>Treatment Plan</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
        <a class="btn btn-primary btn-sm mb-2" href="AddTreatmentPlan.php?AdmID=<?php echo $_GET['admid'];?>&PatientName=<?php echo $_GET['PTNAME'];?>">Add Treatment</a>
        <a class="btn btn-primary btn-sm mb-2" href="admission.php?AdmID=<?php echo $_GET['admid'];?>">Admission</a>
        
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    <table class="table table-bordered border-secondary bg-light">
        <tr>	
            <th>ID</th>            
            <th>Patient</th>            
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>
            
        </tr>
<?php foreach($Treatments as $trt){  ?>
        <tr>
            <td class="text-center"> <?php echo $trt['treatment_id'];?> </td> 
            <td> <?php echo $trt['patient_first_name'] . " " .$trt['patient_last_name'];?> </td> 
            
            <td> <?php echo $trt['treatment_description'];?> </td> 
            <td class="text-center"> <?php echo $trt['treatment_date'];?> </td> 
            <td class="text-center"> <a href="viewTreatmentPlan.php?tpid=<?php echo $trt['treatment_id'] ?>"><i class="fa fa-eye"></i> </a></td>
        </tr>
<?php } ?>
    </table>
    </div>
    
</div>
</div>
</div>
</body>

</html>