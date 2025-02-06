<?php
session_start();
if (!isset($_SESSION['logeduser'])) {
    header("location:logout.php");
}
include("incl/config.php");
include("incl/functions.php");

if (!isset($_GET['admid'])) {
    header("location:admission.php");
}

$doctors = get_doctors();

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
            <h2 class="text-center text-white black-text-shadow">SURGERY</h2>
            <h3 class="text-center text-white black-text-shadow">Operation</h3>
        </div>
    </div>
    <div class="container">
        <div class="row mb-1">
            <div class="col">
                <h5>Add New Operation</h5>
            </div>
            <div class="col text-end">
                <a class="btn btn-primary btn-sm" href="admission.php">Admission</a>
                <a class="btn btn-primary btn-sm" href="patients.php">Patients</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="SaveNewData.php" method="post">
                    <div class="p-2">
                        <div class="row g-3 align-items-center">

                            <div class="col-md-4">
                                <label for="AdmId" class="form-label">Admission ID</label>
                                <input type="text" name="AdmId" value="<?php echo $_GET['admid'] ?>" readonly
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="OtConsultant" class="form-label">Ot Consultant</label>
                                <select class="form-control form-select form-select-sm" name="OtConsultant" required>
                                    <option disabled selected value="">Select Ot Consultant</option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                    <option value="<?php echo $doctor['doctor_id'] ?>">
                                        <?php echo $doctor['dr_first_name'] . " " . $doctor['dr_last_name'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>

                            <div class="col-md-4">
                                <label for="PrimaryConsultant" class="form-label">Primary Consultant</label>
                                <input type="text" name="PrimaryConsultant" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-4">
                                <label for="Anaesthetist" class="form-label">Anaesthetist</label>
                                <input type="text" name="Anaesthetist" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="Operations" class="form-label">Operations</label>
                                <input type="text" name="Operations" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="OperationDate" class="form-label">Operation Date</label>
                                <input type="date" name="OperationDate" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="PostOfRemarks" class="form-label">Post Of Remarks</label>
                                <input type="text" name="PostOfRemarks" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label for="SurgicalRemarks" class="form-label">Surgical Remarks</label>
                                <input type="text" name="SurgicalRemarks" class="form-control form-control-sm">
                                <input type="hidden" name="Status" value="1">
                                <input type="hidden" name="CreatedBy" value="<?php echo $_SESSION['logeduser'] ?>">
                            </div>


                        </div>
                        <div class="mt-3">
                            <input type="submit" name="AddOperation" value="Save" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>