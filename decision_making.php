<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
if(isset($_GET['vid']))
{
    $vid = $_GET['vid'];
    $DecisionMakings = Get_Decision_Makings_VID($vid);
}
else{
    $DecisionMakings = Get_Decision_Makings();
}
// print_r($DrAssesments);
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
        <h3 class="text-center text-white black-text-shadow">Decision Making</h3>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col">
            <H5>List of DM</H5>
        </div>
        <div class="col text-end">
   <?php 
    if(isset($_GET['vid'])){?>
        <a class="btn btn-primary btn-sm mb-2" href="add_decision_making.php?vid=<?php echo $_GET['vid'];?>">Add New</a>
    <?php }else{?>
        
    <?php } ?>
    <a class="btn btn-primary btn-sm mb-2" href="visit_log.php">Vist Log</a>
    <a class="btn btn-primary btn-sm mb-2" href="patients.php">Patients</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    <table class="table table-bordered border-secondary bg-light">
<tr>	
<th>Id</th> 
<th>Patient</th> 
<th>Medication Name</th>
<th>Dosage</th>
<th>Instructions</th>	
<th>Action</th> 
        </tr>
<?php foreach($DecisionMakings as $DecisionMaking){ //visit_id ?>
        <tr>
            <td><?php echo $DecisionMaking['medication_id']?></td> 
            <td><?php echo $DecisionMaking['patient_first_name']." ".$DecisionMaking['patient_last_name']?></td> 
            <td><?php echo $DecisionMaking['dm_medication_name']?></td> 
            <td><?php echo $DecisionMaking['dm_dosage']?></td> 
            <td><?php echo $DecisionMaking['dm_instructions']?></td> 
           
            <td class="text-center"> <a href="viewDecisionMaking.php?dmid=<?php echo $DecisionMaking['medication_id'] ?>"><i class="fa fa-eye"></i> </a></td>
        </tr>
<?php } ?>
    </table>
    </div>
    
</div>
</div>
</div>
</body>

</html>