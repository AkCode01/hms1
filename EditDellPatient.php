<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

 // print_r($_POST);
if(!isset($_POST['PtID'])){
    header("location:index.php");
}

$pid = $_POST['PtID'];

if(isset($_POST['EditBtn'])){
   $submitBtn = "Edit";
}
elseif(isset($_POST['DelBtn']))
{
   $submitBtn = "Dell";
}
 $patient = get_patient_byID($pid);
  $hospitals = get_HospitalDetail();
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
        <h2 class="text-center text-white black-text-shadow">P A T I E N T</h2>
    </div>    
</div>
<div class="container">
<div class="row mb-1">
        <div class="col-md-6">
            <H5>Update Patient Data</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <a class="btn btn-primary mb-1 btn-sm" href="patients.php?psts=InActive">In Active</a>
            <a class="btn btn-primary mb-1 btn-sm" href="patients.php?psts=Active">Active</a>
            <a class="btn btn-primary mb-1 btn-sm" href="patients.php">View All</a>
        </div>  
    </div>
<div class="row">

<div class="col-12">

<?php if($submitBtn =="Edit"){ ?>

<form action="SaveData.php" method="post" enctype="multipart/form-data">
    <div class="p-2">
        <div class="row g-3 align-items-center">
        <div class="col-md-4">
                <label for="patient_id" class="form-label">Patient ID</label>
                <input type="number" value="<?php echo $patient[0]['patient_id'] ?>" class="form-control form-control-sm" id="patient_id" name="patient_id" readonly>
            </div> 
            <div class="col-md-4">
                <label for="hospitalId" class="form-label">Hospital</label>
                <select class="form-control form-select form-select-sm" id="hospitalId" name="hospitalId" required>
                    <option disabled value="">Select Hospital</option>
<?php foreach($hospitals as $hospital){ 
    if($hospital['hospital_id']==$patient[0]['hospital_id']){?>
    <option selected value="<?php echo $hospital['hospital_id'] ?>"><?php echo $hospital['hospital_name'] ?></option>
    <?php }else{ ?>
    <option value="<?php echo $hospital['hospital_id'] ?>"><?php echo $hospital['hospital_name'] ?></option>
<?php }} ?>
                </select>
            </div>   
            <div class="col-md-4">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" value="<?php echo $patient[0]['patient_first_name'] ?>"  class="form-control form-control-sm" id="first_name" name="first_name" required>
            </div>
            <div class="col-md-4">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" value="<?php echo $patient[0]['patient_last_name'] ?>"  class="form-control form-control-sm" id="last_name" name="last_name">
            </div>
           
            <div class="col-md-4">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" value="<?php echo $patient[0]['patient_dob'] ?>" class="form-control form-control-sm" id="date_of_birth" name="date_of_birth">
            </div>
       
            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control form-select form-select-sm" id="gender" name="gender">
<?php if($patient[0]['patient_gender']=='Male'){ ?>
                    <option disabled value="">Select</option>
                    <option selected value="Male">Male</option>
                    <option value="Female">Female</option>
<?php }elseif($patient[0]['patient_gender']=='Female'){?>
                    <option disabled value="">Select</option>
                    <option value="Male">Male</option>
                    <option selected value="Female">Female</option>
<?php }else{?>
                    <option disabled selected value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
<?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="tel" value="<?php echo $patient[0]['patient_contact'] ?>" class="form-control" id="contact_number" name="contact_number">
            </div>
            <div class="col-md-4">
                <label for="pEmail" class="form-label">Email</label>
                <input type="email" value="<?php echo $patient[0]['patient_email'] ?>"  class="form-control form-control-sm" id="pEmail" name="pEmail">
            </div>
            
            <div class="col-md-4">
                <label for="PermanentAddress" class="form-label">Permanent Address</label>
                <input type="text" value="<?php echo $patient[0]['patient_address_permanent'] ?>" class="form-control form-control-sm" id="PermanentAddress" name="PermanentAddress">
            </div>
            <div class="col-md-4">
                <label for="CurrentAddress" class="form-label">Current Address</label>
                <input type="text" value="<?php echo $patient[0]['patient_address_current'] ?>" class="form-control form-control-sm" id="CurrentAddress" name="CurrentAddress">
            </div>
            
            <div class="col-md-4">
                <label for="PrivateCorporate" class="form-label">Private / Corporate</label>
                <input type="text" value="<?php echo $patient[0]['patient_private_corporate'] ?>" class="form-control form-control-sm" id="PrivateCorporate" name="PrivateCorporate">
            </div>

<div class="col-md-4">
                <label for="marital_status" class="form-label">Marital Status</label>
                
<select class="form-control form-select form-select-sm" id="marital_status" name="marital_status">
<?php if($patient[0]['patient_marital_status']=='Single'){ ?>
                    <option disabled value="">Select Marital Status</option>
                    <option selected value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
<?php }elseif($patient[0]['patient_marital_status']=='Married'){?>
                    <option disabled value="">Select Marital Status</option>
                    <option value="Single">Single</option>
                    <option selected value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>

<?php }elseif($patient[0]['patient_marital_status']=='Divorced'){?>
                    <option disabled value="">Select Marital Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option selected value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>

<?php }elseif($patient[0]['patient_marital_status']=='Widowed'){?>
                    <option disabled value="">Select Marital Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option selected value="Widowed">Widowed</option>

<?php }else{?>
                    <option disabled value="">Select Marital Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>

<?php } ?>
</select>
            </div>

            <div class="col-md-4">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" value="<?php echo $patient[0]['patient_nationality'] ?>" class="form-control form-control-sm" id="nationality" name="nationality">
            </div>
            <div class="col-md-4">
                <label for="allergies" class="form-label">Allergies</label>
                <input type="text" value="<?php echo $patient[0]['patient_allergies'] ?>" class="form-control form-control-sm" id="allergies" name="allergies">
            </div>
            <div class="col-md-4">
                <label for="emergency_contact_person" class="form-label">Emergency Contact Person</label>
                <input type="text" value="<?php echo $patient[0]['patient_emergency_contact'] ?>" class="form-control form-control-sm" id="emergency_contact_person" name="emergency_contact_person">
            </div>
            <div class="col-md-4">
                <label for="emergency_phone" class="form-label">Emergency Phone</label>
                <input type="tel" value="<?php echo $patient[0]['patient_emergency_phone'] ?>" class="form-control form-control-sm" id="emergency_phone" name="emergency_phone">
            </div>
            <div class="col-md-4">
                <label for="Translator" class="form-label">Translator</label>
                <input type="text" value="<?php echo $patient[0]['patient_translator'] ?>" class="form-control form-control-sm" id="Translator" name="Translator">
            </div>
            <div class="col-md-4">
                <label for="Translator_phone" class="form-label">Translator Phone</label>
                <input type="tel" value="<?php echo $patient[0]['patient_translator_phone'] ?>" class="form-control form-control-sm" id="Translator_phone" name="Translator_phone">
            </div>
            <div class="col-md-4">
                <label for="code_blue" class="form-label">Code Blue</label>
                <select class="form-control form-select form-select-sm" id="code_blue" name="code_blue">
                <?php if($patient[0]['patient_code_blue']=='1'){ ?>
                        <option disabled value="">Select</option>
                        <option selected value="1">Yes</option>
                        <option value="0">No</option>
                <?php }elseif($patient[0]['patient_code_blue']=='0'){?>
                        <option disabled value="">Select</option>
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                <?php }else{?>
                        <option disabled selected value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="doctor_ref" class="form-label">Doctor Ref</label>
                <input type="text" value="<?php echo $patient[0]['patient_doctor_ref'] ?>" class="form-control form-control-sm" id="doctor_ref" name="doctor_ref">
                <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                <input type="hidden" name="ModifiedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
            </div>
            <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                    <select class="form-control form-select form-select-sm" id="status" name="status" required>
                        <option disabled value="">Select Status</option>
                        <?php if($patient[0]['patient_status']== 1){ ?>
                            <option selected value="1">Active</option>
                            <option value="0">In-Active</option>
                        <?php }else{?>
                            <option value="1">Active</option>
                            <option selected value="0">In-Active</option>
                        <?php }?>       
                    </select>
                </div>
        </div>
        <div class="mt-3">
            <input type="submit" name="EditPatient" id="EditPatient" value="Save Changes" class="btn btn-primary btn-sm">
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