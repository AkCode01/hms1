<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(isset($_GET['admid'])){
    $AdmID = $_GET['admid'];
    $admissions = Get_Lab_Test_ByADMID($AdmID);    
}else{
    $AdmID = 0;
    $admissions = Get_Lab_Test();
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
        <h2 class="text-center text-white black-text-shadow">A D M I S S I O N S</h2>
        <h3 class="text-center text-white black-text-shadow">LAB TEST</h3>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col-md-6">
            <H5>Lab Test</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
        <a class="btn btn-primary btn-sm mb-2" href="AddLabTest.php?admid=<?php echo $AdmID ?>">Add Lab Test</a>
        <a class="btn btn-primary btn-sm mb-2" href="admission.php">Admission List</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    							
    <table class="table table-bordered border-secondary bg-light">
        <tr>
            <th>Id</th>            
            <th>Patient</th>      
            <th>Test category</th>
            <th>Test Name</th>
            <th>Description</th>
            <th>Date</th>            
            <th colspan="2">Action</th>
        </tr>
<?php foreach($admissions as $adm){  ?>
        <tr class="<?php echo $sts; ?>">
        <td> <?php echo $adm['lab_test_id'];?> </td> 
        <td> <?php echo $adm['patient_first_name']." ". $adm['patient_last_name']; ?> </td>
        <td> <?php echo $adm['lab_test_type_name']; ?> </td>
        <td> <?php echo $adm['lab_test_sub_type_name']; ?> </td>
        <td> <?php echo $adm['lab_test_description']; ?> </td>
        <td> <?php echo $adm['lab_test_date']; ?> </td>
        <td class="text-center"> <a href="viewLabTest.php?ltid=<?PHP echo $adm['lab_test_id'] ?>"><i class="fa fa-eye"></i> </a></td>
        </tr>
<?php } ?>
    </table>
    </div>
    
</div>
</div>
</div>
</body>

</html>