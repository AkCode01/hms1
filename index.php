<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
 $totDr = Total_Dcotors();
 $totPt = Total_Patients();
 $totvl = Total_VisitLog();
 $totHospital = Total_Hospitals();
 $totAdmission = Total_Admissions();
 
 // $totHospital[0]['total_hospitals']

 //$totOpd = Total_OPDs();
 
// print_r($totDr);
// echo $_SESSION['logeduser'];

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
        <h2 class="text-center text-white black-text-shadow">Hospital Management System</h2>
    </div>    
</div>
<div class="container">
<div class="row">
<div class="col-12">
    <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                    <img src="images/Hospital2.png"  alt="Card image">
                    <h5 class="card-title">Hospitals</h5>
                        <a href="hospitals.php" class="btn btn-primary btn-sm"><i class="fas fa-hospital"></i> View All Hospital<?php  // echo $totHospital[0]['total_hospitals']; ?> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                    <img src="images/Doctor2.jpg" alt="Card image">
                    <h5 class="card-title">Doctors</h5>
                        <a href="doctors.php" class="btn btn-primary btn-sm"><i class="fas fa-user-md"></i> View All Doctors <?php  // echo $totDr[0]['total_doctors']; ?> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                <div class="card-body text-center">
                <img src="images/Patient2.png" alt="Card image">    
                <h5 class="card-title">Patients</h5>
                        <a href="patients.php" class="btn btn-primary btn-sm"><i class="fas fa-user-injured"></i> View All Patients</a>
                        <div><span><?php  //echo $totPt[0]['total_patients']; ?></span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                <div class="card-body text-center">
                <img src="images/visitors.png" alt="Card image">
                        <h5 class="card-title">Patient Visits <?php //echo $totvl[0]['total_Visit_Log'];?></h5>
                        <a href="visit_log.php" class="btn btn-primary btn-sm"><i class="fas fa-user-injured"></i> View All Visitors</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                <div class="card-body text-center">
                <img src="images/Admit.png" alt="Card image">
                        <h5 class="card-title">Patient Admission <?php //echo $totAdmission[0]['total_Admission'];?></h5>
                        <a href="admission.php" class="btn btn-primary btn-sm"><i class="fas fa-user-injured"></i>  View All Admission</a>
                    </div>
                </div>
            </div>
        </div>   
</div>
</div>
</div>
</body>
</html>