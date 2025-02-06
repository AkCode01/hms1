<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(isset($_GET['admid'])){
    $AdmID = $_GET['admid'];
    $operations = Get_Operations_ByADMID($AdmID);    
}else{
    $AdmID = 0;
    $operations = Get_Operations();
}

// print_r($operations);

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
        <h2 class="text-center text-white black-text-shadow">SURGERY</h2>
        <h3 class="text-center text-white black-text-shadow">Operation</h3>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col-md-6">
            <H5>Operation</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <?php if($AdmID > 0){?>
                <a class="btn btn-primary btn-sm mb-2" href="AddSurgOperation.php?admid=<?php echo $AdmID ?>">Add Operation</a>        
            <?php } ?>
            
        <a class="btn btn-primary btn-sm mb-2" href="admission.php">Admission List</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    							
    <table class="table table-bordered border-secondary bg-light">
        <tr>
            <th>Id</th>
            <th>AdmId</th>
            <th>Ot Date</th>
            <th>Primary Consultant</th>
            <th>Ot Consultant</th>
            <th>Anaesthetist</th>
            <th>Operation</th>
            <th>Post Of Remarks</th>
            <th>Surgical Remarks</th>   
            <th colspan="2">Action</th>
        </tr>
<?php foreach($operations as $operation){ 
    ?>
        <tr class="<?php echo $sts; ?>">
        <td> <?php echo $operation['surg_op_id'];?> </td>
        <td> <?php echo $operation['admission_id'];?> </td>
        <td> <?php echo $operation['surg_op_ot_date'];?> </td>
        <td> <?php echo $operation['surg_op_primary_consultant'];?> </td>
        <td> <?php echo $operation['surg_op_ot_consultant'];?> </td>
        <td> <?php echo $operation['surg_op_anaesthetist'];?> </td>
        <td> <?php echo $operation['surg_op_operations'];?> </td>
        <td> <?php echo $operation['surg_op_post_of_remarks'];?> </td>
        <td> <?php echo $operation['surg_op_surgical_remarks'];?> </td>
        <td class="text-center"> <a href="surg_operation_media.php?SOPID=<?PHP echo $operation['surg_op_id'] ?>">Media</a></td>
        <td class="text-center"> <a href="viewOperation.php?opid=<?php echo $operation['surg_op_id'] ?>"><i class="fa fa-eye"></i> </a></td>
        </tr>
<?php } ?>
    </table>
    </div>
</div>
</div>
</div>
</body>
</html>