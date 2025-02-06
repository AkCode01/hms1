<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");
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
            <H5>Add New Record</H5>
        </div>
        <div class="col-md-6 text-start text-md-end">
            <a class="btn btn-primary mb-1 btn-sm mb-2" href="patients.php?psts=Active">View All</a>
        </div>  
    </div>
<div class="row">
<div class="col-12">
<form action="SaveData.php" method="post" enctype="multipart/form-data">
    <div class="p-2">
        <div class="row g-3 align-items-center">
        <div class="col-md-4">
                <label for="hospitalId" class="form-label">Hospital</label>
                <select class="form-control form-select form-select-sm" id="hospitalId" name="hospitalId" required>
                    <option disabled selected value="">Select Hospital</option>
<?php foreach($hospitals as $hospital){ ?>
    <option value="<?php echo $hospital['hospital_id'] ?>"><?php echo $hospital['hospital_name'] ?></option>
<?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" required>
            </div>

            <div class="col-md-4">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name">
            </div>
            <div class="col-md-4">
                <label for="pnic" class="form-label">NIC</label>
                <input type="text" class="form-control form-control-sm" id="pnic" name="pnic">
            </div>

            <div class="col-md-4">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control form-control-sm" id="date_of_birth" name="date_of_birth">
            </div>
            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control form-select form-select-sm" id="gender" name="gender">
                    <option disabled selected value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="tel" class="form-control form-control-sm" id="contact_number" name="contact_number">
            </div>
            <div class="col-md-4">
                <label for="pEmail" class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="pEmail" name="pEmail">
            </div>
            <div class="col-md-4">
                <label for="PermanentAddress" class="form-label">Permanent Address</label>
                <input type="text" class="form-control form-control-sm" id="PermanentAddress" name="PermanentAddress">
            </div>
            <div class="col-md-4">
                <label for="CurrentAddress" class="form-label">Current Address</label>
                <input type="text" class="form-control form-control-sm" id="CurrentAddress" name="CurrentAddress">
            </div>
            <div class="col-md-4">
                <label for="PrivateCorporate" class="form-label">Private / Corporate</label>
                <input type="text" class="form-control form-control-sm" id="PrivateCorporate" name="PrivateCorporate">
            </div>

<div class="col-md-4">
                <label for="marital_status" class="form-label">Marital Status</label>
                <select class="form-control form-select form-select-sm" id="marital_status" name="marital_status">
                    <option disabled selected value="">Select Marital Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" class="form-control form-control-sm" id="nationality" name="nationality">
            </div>
            <div class="col-md-4">
                <label for="allergies" class="form-label">Allergies</label>
                <input type="text" class="form-control form-control-sm" id="allergies" name="allergies">
            </div>
            <div class="col-md-4">
                <label for="code_blue" class="form-label">Code Blue</label>
                <select class="form-control form-select form-select-sm" id="code_blue" name="code_blue">
                    <option disabled selected value="">Select code Blue</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="emergency_contact_person" class="form-label">Emergency Contact Person</label>
                <input type="text" class="form-control form-control-sm" id="emergency_contact_person" name="emergency_contact_person">
            </div>
            <div class="col-md-4">
                <label for="emergency_phone" class="form-label">Emergency Phone</label>
                <input type="tel" class="form-control form-control-sm" id="emergency_phone" name="emergency_phone">
            </div>
            <div class="col-md-4">
                <label for="translator" class="form-label">Translator</label>
                <input type="text" class="form-control form-control-sm" id="translator" name="translator">
            </div>
            <div class="col-md-4">
                <label for="translator_phone" class="form-label">Translator Phone</label>
                <input type="tel" class="form-control form-control-sm" id="translator_phone" name="translator_phone">
            </div>

            
            <div class="col-md-4">
                <label for="doctor_ref" class="form-label">Referring Doctor</label>
                <input type="text" class="form-control form-control-sm" id="doctor_ref" name="doctor_ref">
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
            </div>
        </div>
        <div class="mt-3">
            <input type="submit" name="AddPatient" id="AddPatient" value="Save Record" class="btn btn-primary btn-sm">
        </div>
    </div>
</form>

</div>
</div>
</div>
</div>
</div>
<script>

</script>
</body>

</html>