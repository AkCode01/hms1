<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

 // print_r($_POST);
if(!isset($_POST['HID'])){
    header("location:index.php");
}

$hid = $_POST['HID'];

if(isset($_POST['EditBtn'])){
   $submitBtn = "Edit";
}
elseif(isset($_POST['DelBtn']))
{
   $submitBtn = "Dell";
}
$hospital = Get_Hospital_byID($hid);
//print_r($hospital);
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
    <h2 class="text-center text-white black-text-shadow">H O S P I T A L S</h2>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col-md-6">
            <H5>Update Hospital Data</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <a class="btn btn-primary mb-1 btn-sm" href="hospitals.php">View All</a>
        </div>  
    </div>
<div class="row">

<div class="col-12">

<?php if($submitBtn =="Edit"){ ?>

<form action="SaveData.php" method="post">
    <div class="p-2">
        <div class="row g-3 align-items-center">
        <div class="col-md-4">
                <label for="hospitalID" class="form-label">Hospital ID</label>
                <input type="number" value="<?php echo $hospital[0]['hospital_id'] ?>" class="form-control form-control-sm" name="hospitalID" readonly>
            </div> 
           
            <div class="col-md-4">
                <label for="hname" class="form-label">Name</label>
                <input type="text" value="<?php echo $hospital[0]['hospital_name'] ?>"  class="form-control form-control-sm" name="hname" required>
            </div>
            <div class="col-md-4">
                <label for="hcode" class="form-label">Code</label>
                <input type="text" value="<?php echo $hospital[0]['hospital_code'] ?>"  class="form-control form-control-sm" name="hcode" required>
            </div>
            <div class="col-md-4">
                <label for="haddress" class="form-label">Address</label>
                <input type="text" value="<?php echo $hospital[0]['hospital_address'] ?>"  class="form-control form-control-sm" name="haddress">
            </div>
           
                      
            <div class="col-md-4">
                <label for="hcontact" class="form-label">Contact Number</label>
                <input type="tel" value="<?php echo $hospital[0]['hospital_contact_number'] ?>" class="form-control form-control-sm" name="hcontact">
            </div>
            <div class="col-md-4">
                <label for="hemail" class="form-label">Email</label>
                <input type="email" value="<?php echo $hospital[0]['hospital_email'] ?>"  class="form-control form-control-sm" name="hemail">
            </div>
            
            <div class="col-md-4">
                <label for="hwebsite" class="form-label">Website</label>
                <input type="text" value="<?php echo $hospital[0]['hospital_website'] ?>" class="form-control form-control-sm" name="hwebsite">
            </div>
           
            <div class="col-md-4">
                <label for="hstatus" class="form-label">Status</label>
                    <select class="form-control form-select form-select-sm" name="hstatus" required>
                        <option disabled value="">Select Status</option>
                        <?php if($hospital[0]['hospital_status']== 1){ ?>
                            <option selected value="1">Active</option>
                            <option value="0">In-Active</option>
                        <?php }else{?>
                            <option value="1">Active</option>
                            <option selected value="0">In-Active</option>
                        <?php }?>       
                    </select>
                    <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                    <input type="hidden" name="ModifiedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                </div>
        </div>
        <div class="mt-3">
            <input type="submit" name="EditHospital" id="EditPatient" value="Save Changes" class="btn btn-primary btn-sm">
        </div>
    </div>
</form>

<?php } else{ ?>
    <H2 class="mb-3">Please update this record and set the status InActive </H2>
<?php }?>
</div>
</div>
</div>
</body>
</html>