<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

 // print_r($_POST);
if(!isset($_POST['SurgOperationID'])){
    header("location:index.php");
}

$sopid = $_POST['SurgOperationID'];

if(isset($_POST['EditBtn'])){
   $submitBtn = "Edit";
}
elseif(isset($_POST['DelBtn']))
{
   $submitBtn = "Dell";
}
    $operation = Get_Surg_Operation_ByID($sopid);
//    print_r($operation);
    $doctors = get_doctors();
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
        <h2 class="text-center text-white black-text-shadow">SURGERY</h2>
        <h3 class="text-center text-white black-text-shadow">Operation</h3>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col-md-6">
            <H5>Update Operation Data</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <a class="btn btn-primary mb-1 btn-sm" href="surg_operation.php">View All</a>
        </div>  
    </div>
<div class="row">

<div class="col-12">

<?php if($submitBtn =="Edit"){ ?>
    <form action="SaveUpdatedData.php" method="post">
                    <div class="p-2">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-4">
                                <label for="SOpId" class="form-label">Operation ID</label>
                                <input type="text" name="SOpId" value="<?php echo $operation[0]['surg_op_id'] ?>" readonly
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="AdmId" class="form-label">Admission ID</label>
                                <input type="text" name="AdmId" value="<?php echo $operation[0]['admission_id'] ?>" readonly
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="OtConsultant" class="form-label">Ot Consultant</label>
                                <select class="form-control form-select form-select-sm" name="OtConsultant" required>
                                    <option disabled selected value="">Select Ot Consultant</option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                    <option <?php if($doctor['doctor_id']==$operation[0]['surg_op_ot_consultant']){echo "selected";} ?> value="<?php echo $doctor['doctor_id'] ?>">
                                        <?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>

                            <div class="col-md-4">
                                <label for="PrimaryConsultant" class="form-label">Primary Consultant</label>
                                <input type="text" name="PrimaryConsultant" value="<?php echo $operation[0]['surg_op_primary_consultant'] ?>" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-4">
                                <label for="Anaesthetist" class="form-label">Anaesthetist</label>
                                <input type="text" name="Anaesthetist" value="<?php echo $operation[0]['surg_op_anaesthetist'] ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="Operations" class="form-label">Operations</label>
                                <input type="text" name="Operations" value="<?php echo $operation[0]['surg_op_operations'] ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="OperationDate" class="form-label">Operation Date</label>
                                <input type="date" name="OperationDate" value="<?php echo $operation[0]['surg_op_ot_date'] ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="PostOfRemarks" class="form-label">Post Of Remarks</label>
                                <input type="text" name="PostOfRemarks" value="<?php echo $operation[0]['surg_op_post_of_remarks'] ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="SurgicalRemarks" class="form-label">Surgical Remarks</label>
                                <input type="text" name="SurgicalRemarks" value="<?php echo $operation[0]['surg_op_surgical_remarks'] ?>" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                    <label for="Status" class="form-label">Status</label>
                                    <select name="Status" class="form-control form-select form-select-sm" required>
                                        <option disabled value="">Select Status</option>
                                        <?php if ($operation[0]['surg_op_status'] == 1) { ?>
                                            <option selected value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        <?php } else { ?>
                                            <option value="1">Active</option>
                                            <option selected value="0">In-Active</option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser']; ?>">
                                </div>

                        </div>
                        <div class="mt-3">
                            <input type="submit" name="EditOperation" value="Save" class="btn btn-primary btn-sm">
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
