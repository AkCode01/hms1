<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if(isset($_GET['admsts']))
{
    if($_GET['admsts']=='InActive'){
        $sts = "In-Active";
        $admissions = Get_InActive_Admissions();
    }
    else{
        $sts = "Active";
        $admissions = Get_Admissions();    
    }
}
elseif(isset($_GET['pid'])){
    $sts = "Active";
    $admissions = Get_Admissions_ByPID($_GET['pid']);
}
elseif(isset($_GET['AdmID'])){
    $sts = "Active";
    $admissions = Get_Admissions_By_ID($_GET['AdmID']);
}
else{
    $sts = "Active";
    $admissions = Get_Admissions();
}
 // print_r($admissions);
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
        <h3 class="text-center text-white black-text-shadow">A D M I S S I O N S</h3>
        
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col-md-6">
            <H5>Admited List</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
        <a class="btn btn-primary btn-sm mb-2" href="patients.php">Patients</a>
        <a class="btn btn-primary btn-sm mb-2" href="admission.php">Admissions</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    <table class="table table-bordered border-secondary bg-light">
        <tr>
            <th>ID</th>            
            <th>Patient</th>            
            <th>Doctor 01</th>            
            <th>Doctor 02</th>            
            <th>Doctor 03</th>            
            <th>Date</th>            
            <th>Discharge On</th>            
            <th>Ward</th>            
            <th>Room</th>            
            <th>Bed</th>            
            <th>Reason</th>            
            <th colspan="5">Action</th>
        </tr>
<?php foreach($admissions as $adm){
   
    $PTNAME = $adm['patient_first_name'] . " ".$adm['patient_last_name'];
?>
        <tr class="<?php echo $sts; ?>">
            <td> <?php echo $adm['admission_id'];?> </td> 
            <td> <?php echo $adm['patient_first_name'] . " ".$adm['patient_last_name'] ;?> </td>
            <td title="<?php echo $adm['doctorid_01'];?>"> <?php 
            if($adm['doctorid_01']>0)
            {
                $drbyid = get_doctor_byID($adm['doctorid_01']);
                echo $drbyid[0]['dr_first_name'] . " " .$drbyid[0]['dr_last_name'];
            }
            ?> </td>
            <td title="<?php echo $adm['doctorid_02'];?>"> <?php 
            if($adm['doctorid_02']>0)
            {
                $drbyid = get_doctor_byID($adm['doctorid_02']);
                echo $drbyid[0]['dr_first_name'] . " " .$drbyid[0]['dr_last_name'];
            }
            ?> </td>
            <td title="<?php echo $adm['doctorid_03'];?>"> <?php 
                if($adm['doctorid_03']>0)
                {
                    $drbyid = get_doctor_byID($adm['doctorid_03']);
                    echo $drbyid[0]['dr_first_name'] . " " .$drbyid[0]['dr_last_name'];
                }
            ?> </td>
            <td> <?php echo $adm['admission_date']; ?> </td>
            <td> <?php echo $adm['discharge_date']; ?> </td>
            <td> <?php echo $adm['ward']; ?> </td>
            <td> <?php echo $adm['room_number']; ?> </td>
            <td> <?php echo $adm['bed_number']; ?> </td>
            <td> <?php echo $adm['reason']; ?> </td>
            <td class="text-center"> <a href="treatment_plan.php?admid=<?php echo $adm['admission_id'] ?>&PTNAME=<?php echo $PTNAME;?>">Treatment</a></td>
            <td class="text-center"> <a href="lab_test.php?admid=<?php echo $adm['admission_id'] ?>&PTNAME=<?php echo $PTNAME;?>">Lab</a></td>
            <td class="text-center"> <a href="surg_pre_op_assessment.php?admid=<?php echo $adm['admission_id'] ?>&PTNAME=<?php echo $PTNAME;?>">Pre Op</a></td>            
            <td class="text-center"> <a href="surg_operation.php?admid=<?php echo $adm['admission_id'] ?>&PTNAME=<?php echo $PTNAME;?>">Operation</a></td>
            <td class="text-center"> <a href="viewAdmission.php?admid=<?php echo $adm['admission_id'] ?>"><i class="fa fa-eye"></i> </a></td>
        </tr>
<?php } ?>
    </table>
    </div>
    
</div>
</div>
</div>
</body>

</html>