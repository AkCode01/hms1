<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

// print_r($_POST);
if (!isset($_POST['ADMID'])) {
    header("location:index.php");
}

$admid = $_POST['ADMID'];

if (isset($_POST['EditBtn'])) {
    $submitBtn = "Edit";
} elseif (isset($_POST['DelBtn'])) {
    $submitBtn = "Dell";
}
$Admission = Get_Admissions_By_ID($admid);
$doctors = get_doctors();
$patients = get_Patients();

// print_r($patients);

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
        $(window).on('load', function() {
            $(".se-pre-con").fadeOut("slow");
            <?php if (isset($_GET['err']) == 1) { ?>
                $('#myModal').modal('show');
            <?php } ?>
        });
        $(document).ready(function() {
            $("#ItemstTable tr").click(function() {
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
            <h3 class="text-center text-white black-text-shadow">Admission</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col-md-6">
                <H5>Update Admission</H5>
            </div>
            <div class="col-md-6 text-start text-md-end">
                <a class="btn btn-primary mb-1 btn-sm" href="admission.php">View All</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if ($submitBtn == "Edit") { ?>
                    <form action="SaveUpdatedData.php" method="post">
                        <div class="p-2">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="admid" class="form-label">Admission Id</label>
                                    <input type="text" name="admid" value="<?php echo $Admission[0]['admission_id']; ?>" class="form-control form-control-sm" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="PatientID" class="form-label">Patient</label>
                                    <select name="PatientID" class="form-control form-select form-select-sm" required>
                                        <option value="" selected disabled>Select Patient</option>
                                        <?php foreach ($patients as $patient) { ?>
                                            <option value="<?php echo $patient['patient_id']; ?>" <?php if ($patient['patient_id'] == $Admission[0]['patient_id']) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?php echo $patient['patient_first_name'] . " " . $patient['patient_last_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="DoctorID01" class="form-label">Doctor 01</label>
                                    <select name="DoctorID01" class="form-control form-select form-select-sm" required>
                                        <option value="" selected disabled>Select Doctoor</option>
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="<?php echo $doctor['doctor_id']; ?>" <?php if ($doctor['doctor_id'] == $Admission[0]['doctorid_01']) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="DoctorID02" class="form-label">Doctor 02</label>
                                    <select name="DoctorID02" class="form-control form-select form-select-sm">
                                        <option value="" selected disabled>Select Doctoor</option>
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="<?php echo $doctor['doctor_id']; ?>" <?php if ($doctor['doctor_id'] == $Admission[0]['doctorid_02']) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="DoctorID03" class="form-label">Doctor 03</label>
                                    <select name="DoctorID03" class="form-control form-select form-select-sm">
                                        <option value="" selected disabled>Select Doctoor</option>
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="<?php echo $doctor['doctor_id']; ?>" <?php if ($doctor['doctor_id'] == $Admission[0]['doctorid_03']) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label for="admdate" class="form-label">Admission Date</label>
                                    <input type="datetime-local" name="admdate" value="<?php echo str_replace(' ', 'T', substr($Admission[0]['admission_date'], 0, 16)); ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-4">
                                    <label for="disdate" class="form-label">Discharge Date</label>
                                    <input type="datetime-local" name="disdate" value="<?php echo str_replace(' ', 'T', substr($Admission[0]['discharge_date'], 0, 16)); ?>" class="form-control form-control-sm">
                                </div>

                                <div class="col-md-4">
                                    <label for="ward" class="form-label">Ward No.</label>
                                    <input type="text" name="ward" value="<?php echo $Admission[0]['ward']; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-4">
                                    <label for="room" class="form-label">Room No.</label>
                                    <input type="text" name="room" value="<?php echo $Admission[0]['room_number']; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-4">
                                    <label for="bed" class="form-label">Bed No.</label>
                                    <input type="text" name="bed" value="<?php echo $Admission[0]['bed_number']; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-4">
                                    <label for="reason" class="form-label">Reason</label>
                                    <input type="text" name="reason" value="<?php echo $Admission[0]['reason']; ?>" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-4">
                                    <label for="Status" class="form-label">Status</label>
                                    <select name="Status" class="form-control form-select form-select-sm" required>
                                        <option disabled value="">Select Status</option>
                                        <?php if ($Admission[0]['adm_status'] == 1) { ?>
                                            <option selected value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        <?php } else { ?>
                                            <option value="1">Active</option>
                                            <option selected value="0">In-Active</option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="ModifiedBy" value="<?php echo $_SESSION['logeduser']; ?>">
                                    <input type="hidden" name="ModifiedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                </div>
                            </div>
                            <div class="mt-3">
                                <input type="submit" name="EditAdmission" value="Save Changes" class="btn btn-primary btn-sm">
                            </div>
                        </div>
                    </form>

                <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        Please change the status of this record to InActive Database Admin will delete the record later!
                        <a href="#" onclick='history.back()'>Back</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>