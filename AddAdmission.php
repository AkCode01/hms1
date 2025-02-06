<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
} else {
    $pid = 0;
}

$patient = get_patient_byID($pid);
$doctors = get_doctors();
//print_r($patients);
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
            <h2 class="text-center text-white black-text-shadow">A D M I S S I O N S</h2>
            <h3 class="text-center text-white black-text-shadow">Patient Admission</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col-md-6">
                <H5>Add New Record</H5>
            </div>
            <div class="col-md-6 text-start text-md-end">
                <a class="btn btn-primary mb-1 btn-sm mb-2" href="patients.php?psts=Active">Patients</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="SaveData.php" method="post" enctype="multipart/form-data">
                    <div class="p-2">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-4">
                                <label for="PatientId" class="form-label">Patient</label>
                                <input type="text" name="PatientName" value="<?php echo $patient[0]['patient_first_name']." ".$patient[0]['patient_last_name']; ?>" class="form-control form-control-sm"  readonly>
                                <input type="hidden" name="PatientId" value="<?php echo $patient[0]['patient_id'] ?>">
                            </div>

                            <div class="col-md-4">
                                <label for="DoctorId1" class="form-label">Doctor1</label>
                                <select class="form-control form-select form-select-sm" name="DoctorId1" required>
                                    <option disabled selected value="">Select Doctor1</option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                        <option value="<?php echo $doctor['doctor_id'] ?>"><?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="DoctorId2" class="form-label">Doctor2</label>
                                <select class="form-control form-select form-select-sm" name="DoctorId2">
                                    <option selected value=""></option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                        <option value="<?php echo $doctor['doctor_id'] ?>"><?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="DoctorId3" class="form-label">Doctor3</label>
                                <select class="form-control form-select form-select-sm" name="DoctorId3">
                                    <option selected value=""></option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                        <option value="<?php echo $doctor['doctor_id'] ?>"><?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="AdmissionDate" class="form-label">Admission Date</label>
                                <input type="date" class="form-control form-control-sm" name="AdmissionDate" required>
                            </div>
                            <div class="col-md-4">
                                <label for="Ward" class="form-label">Ward</label>
                                <input type="text" class="form-control form-control-sm" name="Ward">
                            </div>
                            <div class="col-md-4">
                                <label for="RoomNumber" class="form-label">Room Number</label>
                                <input type="number" class="form-control form-control-sm" name="RoomNumber" min="0">
                            </div>
                            <div class="col-md-4">
                                <label for="BedNumber" class="form-label">Bed Number</label>
                                <input type="number" class="form-control form-control-sm" name="BedNumber" min="0">
                            </div>
                            <div class="col-md-4">
                                <label for="Reason" class="form-label">Reason</label>
                                <input type="text" class="form-control form-control-sm" name="Reason">
                                <input type="hidden" name="status" value="1">
                                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                                <input type="hidden" name="CreatedDate" value="<?php echo date('Y-m-d H:i:s'); ?>">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input type="submit" name="AddAdmission" value="Save Record" class="btn btn-primary btn-sm">
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