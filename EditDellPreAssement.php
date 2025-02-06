<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

 // print_r($_POST);
if(!isset($_POST['PreAssesmentID'])){
    header("location:index.php");
}

$paid = $_POST['PreAssesmentID'];

if(isset($_POST['EditBtn'])){
   $submitBtn = "Edit";
}
elseif(isset($_POST['DelBtn']))
{
   $submitBtn = "Dell";
}
$PreAssesment = get_pre_assesment_byID($paid);
// print_r($PreAssesment);
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
        <div class="col-md-6">
            <H5>Update Pre Assesment</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <a class="btn btn-primary mb-1 btn-sm" href="pre_assesment.php">View All</a>
        </div>  
    </div>
<div class="row">

<div class="col-12">

<?php if($submitBtn =="Edit"){ ?>

<form action="SaveUpdatedData.php" method="post">
    <div class="p-2">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <label for="pasdate" class="form-label">pre_assess_date</label>
                <input type="date" value="<?php echo $PreAssesment[0]['pre_assess_date'] ?>" class="form-control form-control-sm" name="pasdate">
            </div>
            
            <div class="col-md-4">
                <label for="bpsys" class="form-label">pre_assess_bp_sys</label>
                <input type="text" value="<?php echo $PreAssesment[0]['pre_assess_bp_sys'] ?>" class="form-control form-control-sm" name="bpsys">
            </div>
            <div class="col-md-4">
                <label for="bpdia" class="form-label">pre_assess_bp_dia</label>
                <input type="text" value="<?php echo $PreAssesment[0]['pre_assess_bp_dia'] ?>" class="form-control form-control-sm" name="bpdia">
            </div>
            <div class="col-md-4">
                <label for="pulse" class="form-label">pre_assess_pulse</label>
                <input type="text" value="<?php echo $PreAssesment[0]['pre_assess_pulse'] ?>" class="form-control form-control-sm" name="pulse">
            </div>
            <div class="col-md-4">
                <label for="weight" class="form-label">pre_assess_weight_kg</label>
                <input type="text" value="<?php echo $PreAssesment[0]['pre_assess_weight_kg'] ?>" class="form-control form-control-sm" name="weight">
            </div>
            <div class="col-md-4">
                <label for="height" class="form-label">pre_assess_height_ft_inch</label>
                <input type="text" value="<?php echo $PreAssesment[0]['pre_assess_height_ft_inch'] ?>" class="form-control form-control-sm" name="height">
            </div>
            <div class="col-md-4">
                <label for="spo2" class="form-label">pre_assess_spo2</label>
                <input type="text" value="<?php echo $PreAssesment[0]['pre_assess_spo2'] ?>" class="form-control form-control-sm" name="spo2">
            </div>
            <div class="col-md-4">
                <label for="temp" class="form-label">pre_assess_temp_f</label>
                <input type="text" value="<?php echo $PreAssesment[0]['pre_assess_temp_f'] ?>" class="form-control form-control-sm" name="temp">
            </div>
           
            <div class="col-md-4">
                <label for="Status" class="form-label">Status</label>
                    <select class="form-control form-select form-select-sm" name="Status" required>
                        <option disabled value="">Select Status</option>
                        <?php if($PreAssesment[0]['pre_assess_status']== 1){ ?>
                            <option selected value="1">Active</option>
                            <option value="0">In-Active</option>
                        <?php }else{?>
                            <option value="1">Active</option>
                            <option selected value="0">In-Active</option>
                        <?php }?>       
                    </select>
                    
                    <input type="hidden" name="paid" value="<?php echo $PreAssesment[0]['pre_assessment_id'];?>">
                    <input type="hidden" name="vid" value="<?php echo $PreAssesment[0]['visit_id'];?>">
                    <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser'];?>">
                    <input type="hidden" name="ModifiedDate" value="<?php echo date('Y-m-d H:i:s');?>">
                </div>
        </div>
        <div class="mt-3">
            <input type="submit" name="EditPreAssement" id="EditPatient" value="Save Changes" class="btn btn-primary btn-sm">
        </div>
    </div>
</form>

<?php } else{ ?>
    <div class="alert alert-danger" role="alert">
    Please change the status of this record to InActive Database Admin will delete the record later!
    <a href="#" onclick='history.back()'>Back</a>
</div>
<?php }?>
</div>
</div>
</div>
</body>
</html>