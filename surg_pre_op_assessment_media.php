<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(isset($_GET['POASSID'])){
    $POASSID = $_GET['POASSID'];
    $admissions = Get_Pre_Op_Assesment_Media_ByADMID($POASSID);    
}else{
    $POASSID = 0;
    $admissions = Get_Pre_Op_Assesment_Media();
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
</script>
</head>

<body>
<div class="se-pre-con"></div>
<?php include "Header.php"; ?>
<div class="container-fluid bg-light pt-3 pb-3 mt-0 mb-3 drPage">
    <div class="p-5">
        <h2 class="text-center text-white black-text-shadow">SURGERY</h2>
        <h3 class="text-center text-white black-text-shadow">Operation Assesment Media</h3>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col-md-6">
            <H5>Operation Assesment Media</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
<?php if($POASSID>0){ ?>
    <a class="btn btn-primary btn-sm mb-2" href="AddSurgPreOpAssesmentMedia.php?POASSID=<?php echo $POASSID ?>">Add Pre Op Asses Media</a>
<?php }?>

     <a class="btn btn-primary btn-sm mb-2" href="surg_pre_op_assessment.php?POASSID=<?php echo $POASSID ?>">Pre OP List</a>
     <a class="btn btn-primary btn-sm mb-2" href="admission.php">Admission List</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    							
    <table class="table table-bordered border-secondary bg-light">
        <tr>

            <th>Id</th>            
            <th>PreOp Assid</th>
            <th>Media File</th>
            <th>Url</th>
            
            <th>Action</th>
        </tr>
<?php
// 			
foreach($admissions as $adm){ ?>
        <tr class="<?php echo $sts; ?>">
        <td><?php echo $adm['pre_op_ass_media_id'];?></td> 
        <td><?php echo $adm['pre_op_assid'];?></td> 
        <td><?php echo $adm['pre_op_ass_media_filename'];?><br>
        <img src="images/SurgeryMedia/<?php echo $adm['pre_op_ass_media_filename'];?>" width="100px" />
    </td> 
        <td><?php echo $adm['pre_op_ass_media_url'];?></td> 
        <td class="text-center"> <a href="viewSurgPreOpAssesmentMedia.php?POASSMID=<?PHP echo $adm['pre_op_ass_media_id'] ?>"><i class="fa fa-eye"></i> </a></td>        
        </tr>
<?php } ?>
    </table>
    </div>
    
</div>
</div>
</div>
</body>

</html>