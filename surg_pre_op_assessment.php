<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if(isset($_GET['admid'])){
    $AdmID = $_GET['admid'];
    $admissions = Get_Pre_Op_Assesment_ByADMID($AdmID);    
}else{
    $AdmID = 0;
    $admissions = Get_Pre_Op_Assesment();
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
        <h3 class="text-center text-white black-text-shadow">Pre Operation Assesment</h3>
    </div>    
</div>
<div class="container">
    <div class="row mb-1">
        <div class="col-md-6">
            <H5>Pre Operation Assesment</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
        <a class="btn btn-primary btn-sm mb-2" href="AddSurgPreOpAssesment.php?admid=<?php echo $AdmID ?>">Add Pre Op Assesment</a>
        <a class="btn btn-primary btn-sm mb-2" href="admission.php">Admission List</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
    <div class="table-responsive mb-2">
    							
    <table class="table table-bordered border-secondary bg-light">
        <tr>
            <th>Id</th>            
            
            <th>Anaeshesologist</th>
            <th>Surgeon</th>
            
            <th>Diagnosis</th>
<th>Date</th>
<th>Classification</th>      
            <th colspan="2">Action</th>
        </tr>
<?php foreach($admissions as $adm){ 
    ?>
        <tr class="<?php echo $sts; ?>">
        <td> <?php echo $adm['pre_op_assid'];?> </td> 
        
        <td> <?php
        $doctor = get_doctor_byID($adm['doctor_id_anaeshesologist']);
        echo $doctor[0]['dr_first_name']. " " .$doctor[0]['dr_last_name'];
        ?> 
         
        </td> 
        <td> <?php
        $doctor = get_doctor_byID($adm['doctor_id_surgeon']);
        echo $doctor[0]['dr_first_name']. " " .$doctor[0]['dr_last_name'];
        ?> </td> 
        
        <td> <?php echo $adm['pre_op_diagnosis'];?> </td> 
        <td> <?php echo $adm['pre_op_surgery_date'];?> </td> 
        <td> <?php echo $adm['pre_op_asa_classification'];?> </td> 
        <td class="text-center"> <a href="surg_pre_op_assessment_media.php?POASSID=<?PHP echo $adm['pre_op_assid'] ?>">Media</a></td>
        <td class="text-center"> <a href="viewSurgPreOpAssesment.php?POASSID=<?PHP echo $adm['pre_op_assid'] ?>"><i class="fa fa-eye"></i> </a></td>        
        </tr>
<?php } ?>
    </table>
    </div>
    
</div>
</div>
</div>
</body>

</html>