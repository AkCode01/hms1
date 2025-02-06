<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");


$SubTypes = Get_Lab_Test_sub_Type(); 
// print_r($SubTypes);

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
        <h3 class="text-center text-white black-text-shadow">LAB TEST SUB TYPE</h3>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col-md-6">
            <H5>Lab Test Sub Type</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
        <a class="btn btn-primary btn-sm mb-2" href="AddLabTestSubType.php">Add Sub Type</a>
        <a class="btn btn-primary btn-sm mb-2" href="lab_test_type.php">Lab Test Type</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    							
    <table class="table table-bordered border-secondary bg-light">
    <tr>
            <th>Id</th>            
            <th>Lab Test Type</th>  
            <th>Test Type</th>  
            <th>Action</th>  
        </tr>
<?php foreach($SubTypes as $SubType){  ?>
            <tr class="<?php echo $sts; ?>">
            <td> <?php echo $SubType['lab_test_sub_type_id'];?> </td>            
            <td> <?php echo $SubType['lab_test_type_name'];?> </td>            
            <td> <?php echo $SubType['lab_test_sub_type_name']; ?> </td>
            <td class="text-center"> <a href="viewLabTestSubType.php?LTSTID=<?PHP echo $SubType['lab_test_sub_type_id'] ?>"><i class="fa fa-eye"></i> </a></td>
        </tr>
<?php } ?>
    </table>
    </div>
    
</div>
</div>
</div>
</body>

</html>